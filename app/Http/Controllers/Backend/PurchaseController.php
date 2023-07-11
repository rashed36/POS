<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Purchase;
use App\Model\Category;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use Auth;
use DB;
use PDF;

class PurchaseController extends Controller
{
    public function view(){
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.view-purchase',compact('allData'));
    }

    public function add(){
        $data['supplier'] = Supplier::all();
        $data['category'] = Category::all();
        $data['unit'] = Unit::all();
        return view('backend.purchase.add-purchase',$data);
    }

    public function store(Request $request){
       
        if($request->category_id == null){
            return redirect()->back()->with('error','Sorry! you do not select any item ');
        }else{
            $count_category = count($request->category_id);
            for ($i=0; $i <$count_category; $i++){
                $data = new Purchase();
                $data->date = date('Y-m-d',strtotime($request->date[$i]));
                $data->purchase_no = $request->purchase_no[$i];
                $data->supplier_id = $request->supplier_id[$i];
                $data->category_id = $request->category_id[$i];
                $data->product_id = $request->product_id[$i];
                $data->buying_qty = $request->buying_qty[$i];
                $data->unit_price = $request->unit_price[$i];
                $data->buying_price = $request->buying_price[$i];
                $data->description = $request->description[$i];
                $data->created_by = Auth::user()->id;
                $data->status = '0';
                $data->save();
            }
        }
        return redirect()->route('purchase.view')->with('success','Data Saved Successfully');
    }

    public function delete($id){
        $data = Purchase::find($id);
        $data -> delete();
        return redirect()->route('purchase.view')->with('success','Data Deleted Successfully');  
    }

    public function pendingList(){
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('backend.purchase.view-pending-list',compact('allData'));
    }

    public function approve($id){
        $purchase = Purchase::find($id);
        $product = Product::where('id',$purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
        $product->quantity = $purchase_qty;
        if($product->save()){
            DB::table('purchases')->where('id',$id)->update(['status' => 1]);
        }
        return redirect()->route('purchase.pending.list')->with('success','Store Updated Successfully');
    }

    public function purchaseReport() {
        return view('backend.purchase.parchese-report');
    }

    public function purchaseReportPdf(Request $request) {
        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $data['allData'] = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $data['end_date'] = date('Y-m-d',strtotime($request->end_date));
        $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }

}
