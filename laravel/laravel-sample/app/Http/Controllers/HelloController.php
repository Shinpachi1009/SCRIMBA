<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(){
        return view('hello.welcome')
        ->with('name', 'Jamaric')
        ->with('surname','Urriza')
        ;

    }
}
