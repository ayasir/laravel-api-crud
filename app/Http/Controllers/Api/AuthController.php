<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){

        echo "login endpoint";
    }

    public function signup(){

        echo "Sign up endpoint";
    }

    public function index(){
        echo "Index endpoint";
    }
}
