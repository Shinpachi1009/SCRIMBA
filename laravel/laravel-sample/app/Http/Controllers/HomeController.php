<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /*
    public function index(){ // This method will handle the request to the home route
        return view('home/index')
        ->with('firstName', 'jamaric')
        ->with('lastName', 'Urriza')
        ->with('country','ge')
        ->with('job','<b>Developer<b>')
        ->with('hobbies',['Tennis', 'Fishing'])
        ; // This will return 'index' when the home route is accessed

        //if (!View::exists('home.index')){
        //    dd('View home.index does not exist'); // This will dump a message if the view does not exist
        //}
        //return View::first(['index', 'home.index']); // This will return the view located at resources/views/home/index.blade.php
    }
    */
    public function index(){
        $cars = Car::where('published_at', '<', now())
        ->orderBy('published_at','desc')
        ->limit(10)
        ->get();

        return view('home.index', ['cars'=> $cars]);

    }
}
