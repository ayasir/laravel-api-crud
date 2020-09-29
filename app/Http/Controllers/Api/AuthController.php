<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class AuthController extends Controller
{
    public function login(Request $request){

        $request->validate([

            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }
        $user = $request->user();

        $token = $user->createToken('Access Token');
        $user->access_token = $token->accessToken;

        return response()->json([
            'user' => $user
        ], 200);
    }

    public function signup(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            "message" => "User registered successfully"
        ], 201);


    }

    public function logout(Request $request){
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'User logged out successfully!'
        ], 200);
    }

    public function index(){
        echo "Hello world!";
    }

    public function test(){
        echo "test world!";
    }

    public function store(Request $request){
        echo "In store";
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
        //crete and save the Product
        /*return 'sazzad';*/
        $product = new Product();
        $product->brand_name = request('brand_name');
        $product->generic_name = request('generic_name');
        $product->category = request('category');
        $product->receive_date = request('receive_date');
        $product->exp_date = request('exp_date');
        $product->orginal_price = request('orginal_price');
        $product->sell_price = request('sell_price');
        $product->quantity = request('quantity');
        $product->quantity_left = request('quantity');
        //Total value finding
        $sell = $product->sell_price;
        $left = $product->quantity_left;
        $product->total= $sell * $left;
        $product->save();
        //sign them in
        $notification = [
            'message' => 'Product is added successfully.!',
            'alert-type' => 'success'
        ];
        return redirect('product')->with($notification);
    }


}
