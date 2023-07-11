<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use Auth;
use PDF;

class stockController extends Controller
{
    public function stockReport(){
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.stock.stock-report',compact('allData'));
    }

    public function printReport(){
        $data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        $pdf = PDF::loadView('backend.pdf.stock-report-pdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }
    public function supplierProductWise(){
        $data['category'] = Category::all();
       $data['supplier'] = Supplier::all();
        return view('backend.stock.supplier-product-wise-report',$data);
    }
    public function supplierProductWisePdf(Request $request){
        $data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        $pdf = PDF::loadView('backend.pdf.supplier-wise-report-pdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
     }
     public function ProductWisePdf(Request $request){
        $data['product'] = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        $pdf = PDF::loadView('backend.pdf.product-wise-report-pdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
     }
}
