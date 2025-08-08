<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


//sample controller
class SampleController extends Controller 
{
    public function __invoke(){
        return "Invoke method called"; // This method will be called when the controller is invoked directly
    }
    public function index(){ // This method will handle the request to the '/car' route
        // You can return a view, JSON response, or any other response here
        // For example, returning a simple string:
        // return 'This is the car index page';
        return 'return index'; // This will return 'return index' when the '/car' route is accessed
        // You can also return a view like this:
        // return view('car.index'); // Assuming you have a view file at resources/views/car/index.blade.php
    }
//        $cars = Car::get(); //select all cars
//        $cars = Car::where('published_at', '!=', null)->get(); // select all cars that is publish
//        $car = Car::where('published_at', '!=', null)->first(); // select first car that is publish
//        $car = Car::first(); // select the first car
//        $car = Car::find(2); // select car with id of 2
//        $car = Car::orderBy('publish_at', 'desc')->get(); // select in descending order bu published
//        dd($car);

//        $car = new Car();
//        $car->maker_id = 1;
//        $car->model_id = 1;
//        $car->year = 1900;
//        $car->price = 123;
//        $car->vin = 123;
//        $car->mileage = 123;
//        $car->car_type_id = 1;
//        $car->fuel_type_id = 1;
//        $car->user_id = 1;
//        $car->city_id=1;        
//        $car->address="test";    
//        $car->phone="12345678914";    
//        $car->description=null;
//        $car->save();  

//        $carData = [
//        'maker_id' => 1,
//        'model_id' => 1,
//        'year' => 1950,
//        'price' => 123,
//        'vin' => 123,
//        'mileage' => 123,
//        'car_type_id' => 1,
//        'fuel_type_id' => 1,
//        'user_id' => 1,
//        'city_id'=>1,        
//        'address'=>"test",    
//        'phone'=>"12345678915",    
//        'description'=> null,
//        'published_at'=>now()
//        ];

//        $car = Car::find(1); // select car with id of 1
//        $car->price=10; //then change the price to 10
//        $car->save();

//        $carData = [
//        'maker_id' => 1,
//        'model_id' => 1,
//        'year' => 1950,
//        'price' => 123,
//        'vin' => 123,
//        'mileage' => 123,
//        'car_type_id' => 1,
//        'fuel_type_id' => 1,
//        'user_id' => 1,
//        'city_id'=>1,        
//       'address'=>"test",    
//        'phone'=>"12345678915",    
//        'description'=> null,
//        'published_at'=>now()
//        ];        
//        Car::updateOrCreate(
//            ["vin"=> "123456", "price" => 123456], // get cars where vin is 12345 and price is 12345
//            $carData // if no data match it will create another data with condiyional value and the value of cardata
//        );
        
        //method 1
//        $car = Car::create($carData);

        //method 2
//        $car2 = new Car();
//        $car2->fill($carData);
//        $car2->save();

        //method 3
//        $car3 = new Car($carData);
//        $car3->save();
//    }


//        Car::where('published_at', null) //select all cars where publish at is null
//        ->where('user_id', 1) // user id is 1
 //       ->update(['published_at'=>now()]); //then update published_at to now time

//        $car = Car::find(7);//find a car with if id of 7
//        $car->delete(); // then delete the crecord or add time on deleted at column if there is and have soft delete
//        Car::destroy([6]); // delete car where is id is 6 or add time on deleted at if there is column and have soft delete

//        Car::where('published_at', null) // select cars where publish at is null and user_id is 1
//        ->where('user_id', 1)
//        ->delete(); // and then delete

//        Car::truncate(); // delete all car not add on deleted at


//        $car = Car::where('price', '>',20000)->get();
        
//        $maker = Maker::where('name', 'Toyota')->get();
//        dd($maker);

//        $fuel = new FuelType();
//        $fuel->name = 'Electric';
//        $fuel->save();
//        // or
//        FuelType::create(['name' => 'Electric']);

//        $cars = Car::find(1); //select car with id of 1
//        dd($cars->features); // then find the relation value of it to car features
//        dd($cars->features, $cars->primaryImage); // then find the relation value of it to car features and the car image


//        dd($car->images);
//        $images = new CarImage(['image_path'=>'something', 'position'=> 2]); //create new image data and assigning position to 2 and path to something
//        $car->images()->save($images);
        // is same like this
//        $car->images()->create(['image_path'=> 'something2', 'position'=> 3]);

//        $car->images()->saveMany([
//            new CarImage(['image_path'=>'something3','position'=> 4]),
//            new CarImage(['image_path'=>'something4','position'=> 5]),
//        ]);
        //is like this
//        $car->images()->createMany([
//            ['image_path'=>'something5','position'=> 6],
//            ['image_path'=>'something6','position'=> 7],
//        ]);


//        $car = Car::find(1);
//        dd($car->carType);
//        $car = Car::find(1);
//        $carType = CarType::where('name', 'Sedan')->first();
//        //$cars = Car::whereBelongsTo($carType)->get();
//        $car->car_type_id = $carType->id;
//        $car->save();


//        $car = Car::find(1);
//        dd($car->favouredUsers);

//        $user = User::find(1);
//        dd($user->favouriteCars);

//        $user = User::find(1);
//        $user->favouriteCars()->sync([1, 2]); //add data in favourite cars with car id of 1 and 2

//        $user = User::find(1);
//       $user->favouriteCars()->detach([1, 2]); // delete data from favourite cars with car id of 1 and 2


    //        $maker = Maker::factory()->create(); //create a data in makers table
//        $maker = Maker::factory()->count(9)->create();//create 10 rows of data in the makers table  
//        dd($maker);

//        User::factory()
//        ->count(3) // this will create a 3 dummmy datas
//        ->sequence( // with alternating name of jami and ian
//            ['name'=> 'jami'],
//            ['name'=> 'ian'],
//        )
//        ->create();

//        User::factory()
//        ->count(3) // this will create 3 datas in users
//        ->sequence(fn(Sequence $sequence)=>['name'=> 'Name' . $sequence->index])// name of Name and number exp "Name 1"
//        ->create();


//        Maker::factory()
//            ->count(5) // this create 5 dats of makers
//            ->hasModels(5) // and then create 5 data of models per maker
//            ->create();

//        Model::factory()
//        ->count(3) // this will create 3 data for models
//        ->forMaker(['name'=>'lex']) // along with a data for makers with name of lex
//        ->create();

    public function create(){ //
         return 'create'; }
}
