<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function welcome(){
        return view('welcome');
    }

    function product(){
        $all_products = Product::latest()->get();
        return view('products', compact('all_products'));
    }

    function insert(Request $request){
        //return $request;
            Product::insert($request->except('_token') + ['created_at' => Carbon::now()]);
             return back()->withSuccess("Product Added Successfully");
    }

    //soft delete
    function delete($product_id){
        Product::find($product_id)->delete();
        return back()->withDeleting("Product Deleting Successfully");

    }
//all restore
    function restore(){
        Product::onlyTrashed()->restore();
        return back();
    }


      function alldelete(){
        Product::onlyTrashed()->forceDelete();
        return back();
    }

      //finally remove form database
      function permanent(){
        Product::withTrashed()->forceDelete();
        return back();
    }

}
