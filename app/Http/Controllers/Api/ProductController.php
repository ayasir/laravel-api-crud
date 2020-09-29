<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){

        $user = Auth::user();
        $num = Product::count();
        $products = Product::all();
        return view('product.index',compact('user','num','products'))->with('title','Products');
    }
    public function update($id){
        $user = Auth::user();
        $product = Product::find($id);
        return view('product.update',compact('user','product'))->with('title','Edit Product');
    }

    public function store(Request $request){


            // $this->validate(request(),[
            //     'brand_name' => 'required',
            //     'generic_name' => 'required',
            //     'category' => 'required',
            //     'receive_date' => 'required',
            //     'exp_date' => 'required',
            //     'orginal_price' => 'required',
            //     'sell_price' => 'required',
            //     'quantity' => 'required'
            // ]);

        echo 'Hi'.$request;
        //crete and save the Product

        try {
            $product = new Product();
        $product->brand_name = request('brand_name');

        $product->generic_name = request('generic_name');
        $product->category = request('category');
        $product->receive_date = request('receive_date');
        $product->exp_date = request('exp_date');
        $product->orginal_price = request('original_price');
        $product->sell_price = request('sell_price');
        $product->quantity = request('quantity');
        $product->quantity_left = request('quantity');
        //Total value finding
        $sell = $product->sell_price;
        $left = $product->quantity_left;
        $product->total= $sell * $left;

        $product->save();
        }
        catch(Exception $e){ echo $e->getMessage();}

        //sign them in
        $notification = [
            'message' => 'Product is added successfully.!',
            'alert-type' => 'success'
        ];
        return redirect('/product')->with($notification);
    }

    public function edit(Request $request,$id){
        //validation
        $this->validate(request(),[
            'brand_name' => 'required',
            'generic_name' => 'required',
            'category' => 'required',
            'receive_date' => 'required',
            'exp_date' => 'required',
            'orginal_price' => 'required',
            'sell_price' => 'required',
            'quantity' => 'required'
        ]);
        $data =array(
            'brand_name' => $request->input('brand_name'),
            'generic_name' => $request->input('generic_name'),
            'category' => $request->input('category'),
            'receive_date' => $request->input('receive_date'),
            'exp_date' => $request->input('exp_date'),
            'orginal_price' => $request->input('orginal_price'),
            'sell_price' => $request->input('sell_price'),
            'quantity' => $request->input('quantity'),
            'quantity_left' => $request->input('quantity'),
        );
        Product::where('id',$id)->update($data);
        $notification = [
            'message' => 'Product is updated successfully.!',
            'alert-type' => 'success'
        ];
        return redirect('/product')->with($notification);
    }

    public function destroy($id){
        Product::where('id',$id)->delete($id);
        $notification = [
            'message' => 'Product Deleted Sucessfully.!',
            'alert-type' => 'info'
        ];
        return redirect('/product')->with($notification);
    }
}
