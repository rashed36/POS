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

class DefaultController extends Controller
{
    public function getCategory(Request $request){
        $supplier_id = $request->supplier_id;
        $allcategory = Product::with(['category'])->select('category_id')->Where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        return response()->json($allcategory);
    }

    public function getProduct(Request $request){
        $category_id = $request->category_id;
        $allproduct = Product::Where('category_id',$category_id)->get();
        return response()->json($allproduct);
    }

    public function getStock(Request $request){
        $product_id = $request->product_id;
        $stock = Product::Where('id',$product_id)->first()->quantity;
        return response()->json($stock);
    }

    public function getPerchase(Request $request){
        $buying_qty = $request->product_id;
        $parchase = Purchase::Where('product_id',$buying_qty)->first()->unit_price;
        return response()->json($parchase);
    }

    

}
