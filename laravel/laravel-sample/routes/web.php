<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CRUDcontroller;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home'); // This will handle the request to the home route

Route::get('/car/search', [CarController::class, 'search'])->name('car.search');
Route::resource('car', CarController::class);


Route::get('/signup', [SignupController::class, 'signup'])->name('signup');
Route::get('/login', [LoginController::class, 'login'])->name('login');



//challenge
//Route::get('/hello', [HelloController::class, 'hello'])->name('hello');


// routes - this will define the routes for the application
//Route::get($uri, $callback); //use to get the info
//Route::post($uri, $callback); //use to post the info   
//Route::put($uri, $callback); //use to update the info
//Route::patch($uri, $callback); //use to partially update the info
//Route::delete($uri, $callback); //use to delete the info
//Route::options($uri, $callback); //use to get the options for the info
//Route::match(['get', 'post'], '/', function(){
//     This route will respond to both GET and POST requests
//}); //use to match any of the above methods
//Route::any($uri, $callback); //use to match any of the above methods
//Route::redirect('/home', '/', $status); //use to redirect to another URI
//Route::permanentRedirect('/home', '/'); //use to permanently redirect to another URI
//Route::view('/about', 'about'); //use to return a view for the given URI


// Route Required Parameters - this will require a parameter in the route
//Route::get('/product/{id}', function (string $id) { // This route requires a parameter 'id'
//    return 'Product ID: ' . $id; // This will return the product ID
// example: /product/123
//});

//Route::get("{lang}/product/{id}/review/{reviewId}", function (string $lang, string $id, string $reviewId) {
//    return 'Language: ' . $lang . ', Product ID: ' . $id . ', Review ID: ' . $reviewId; // This will return the language, product ID, and review ID
// example: /en/product/123/review/456
//});


// Route Optional Parameters - this will make the parameter optional
//Route::get('/product/{id?}', function (string $id = null) {
//    return 'Product ID: ' . $id; // This will return the product ID or '' if not provided
//}); // example: /product or /product/123


// Route Parameter validation - this will validate the parameters using regular expressions
//Route::get('/product/{id}', function (string $id) {
//    return 'Product ID: ' . $id; // This will return the product ID
//})->where('id', '[0-9]+'); // This will only match if 'id' is a number
// is same here
//})->where('id', '[0-9]+');
//Example: /product/123

//Route::get('/product/{name}', function (string $name) {
//    return 'Product Name: ' . $name; // This will return the product name
//})->where('name', '[a-zA-Z]+'); // This will only match if 'name' is alphabetic
// is same here
//})->whereAlpha('name');
//Example: /product/Widget

//Route::get('/user/{user}', function (string $user) {
//    return 'User: ' . $user; // This will return the user name
//})->where('user', '[a-zA-Z0-9]+'); // This will only match if 'user' is alphanumeric
// is same here
//})->whereAlphaNumeric('user');
//Example: /user/johndoe or /user/123 or /user/jane123

//Route::get("{lang}/product/{id}", function(string $lang, string $id) {
//    return 'Language: ' . $lang . ', Product ID: ' . $id; // This will return the language and product ID
//})->whereAlpha('lang')->whereNumber('id'); // This will only match if 'lang' is alphabetic and 'id' is numeric
// is same here
//})->where(['lang' => '[a-zA-Z]+', 'id' => '[0-9]+']);
// Example: /en/product/123 or /fr/product/456

//Route::get('{lang}/products', function (string $lang) {
//    return 'Language: ' . $lang; // This will return the language
//})->whereIn('lang', ['en','ka', 'ru']); // This will only match if 'lang' is one of the specified values
// is same here
//})->whereIn('lang', ['en', 'ka', 'ru']);
// Example: /en/products or /ka/products or /ru/products

//Route::get('/search/{search}', function (string $search) {
//    return 'Search Query: ' . $search; // This will return the search query
//})->where('search', '.+');// This will match any non-empty search query
// is same here
//})->where('search', '[a-zA-Z0-9\s]+'); // This will only match if 'search' is alphanumeric or contains spaces
// Example: /search/your+query+here or /search/123/%20456


// Named Routes - This will name the route for easy reference
//Route::get('/', function () { // This route will respond to GET requests to the root URL
//    $aboutPageUrl = route('about'); // This will generate the URL for the named route 'about'
//    dd($aboutPageUrl); // This will dump the URL and stop execution
//    return view('welcome'); // This will return the 'welcome' view
//});
//Route::view('/about', 'about')->name('about'); // This will return the 'about' view and name the route 'about'

//Route::get("/", function () {
//    $productUrl = route('product.view', ['lang' => 'en', 'id' => 1]); // This will generate the URL for the named route 'product.view' with language 'en' and product ID 1
//    dd($productUrl); // This will dump the generated URL and stop execution
//    return view("welcome");
//});
//Route::get("/{lang}/product/{id}", function (string $lang, string $id) {
//})->name('product.view'); // This will name the route 'product.view' for the given language and product ID

//Route::get('/user/profile', function () {})->name('profile'); // This route will respond to GET requests to '/user/profile' and name it 'profile'
//Route::get('/current-user', function () { // This route will respond to GET requests to '/current-user'
//    return redirect()->route('profile'); // Redirect to the named route 'profile'
//    // is same here
//    //return to_route('profile');
//});

// Route Groups - This will group all routes under a certain prefix
//Route::prefix('admin')->group(function () {// This will group all routes under the 'admin' prefix
//    Route::get('/users', function () { // This route will respond to GET requests to '/admin/users'
//        return 'hello'; // This will return the admin users view
//    });
//});
// is same here
//Route::name('admin.')->group(function () { // This will group all routes with the 'admin.' name prefix
//    Route::get('/users', function () { // This route will respond to GET requests to '/admin/users'
//        return 'hello'; // This will return the admin users view
//    })->name('users'); // This will name the route 'admin.users'
//});


// Fallback Routes - This route will respond to any unmatched routes
//Route::fallback(function () {
//    return 'Fallback'; // This will return 'Fallback' for any unmatched routes
//});
// Fallback route that redirect to error page


//Route that use Controller
//Route::get('/car', [SampleController::class,'index']); // This will handle the request to the '/car' route

//Route::controller(SampleController::class)->group(function () { // This will group all routes for the SampleController
//    Route::get('/car', 'index'); // This will handle the request to the '/car' route
//    Route::get('/create', 'create'); // this will handle the request to the '/car/create' route
//    // You can add more routes here for other methods in the SampleController
//});

//Route::get('/car/invoke', SampleController::class); // This will invoke the SampleController's __invoke method when the '/car/invoke' route is accessed
// the difference is that this route will call the __invoke method of the SampleController directly
//Route::get('/car', [SampleController::class, 'index']);

//Route that use Resource Controller
//Route::resource('/cars/all', CRUDcontroller::class); // This will create all the resource routes for the CRUDcontroller
//Route::resource('/cars/except/destroy', CRUDcontroller::class)->except(['destroy']); // This will create all the resource routes for the CRUDcontroller except the destroy method
//Route::resource('/cars/only/destroy', CRUDController::class)->only('destroy', 'index'); // This will create only the destroy and index routes for the CRUDController
//Route::apiResource('/cars/api', APIcontroller::class); // This will create all the API resource routes for the APIcontroller

//Route::apiResources([
//    'API' => APIcontroller::class,
//    'CRUD' => CRUDcontroller::class,
//    'Sample' => SampleController::class,
//]); // This will create API resource routes for the APIcontroller, CRUDcontroller, and SampleController