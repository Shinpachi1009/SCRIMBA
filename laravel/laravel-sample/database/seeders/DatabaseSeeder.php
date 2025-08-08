<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\Region;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        CarType::factory()->sequence(
            ['name' =>'sedan'],
            ['name' =>'Hatchback'],
            ['name' =>'SUV'],
            ['name' =>'Pickup Truck'],
            ['name' =>'Minivan'],
            ['name' =>'Jeep'],
            ['name' =>'Coupe'],
            ['name' =>'Crossover'],
            ['name' =>'Sports Car'],
        )->count(9)->create();

        FuelType::factory()->sequence(
            ['name' =>'Gasoline'],
            ['name' =>'Diesel'],
            ['name' =>'Electric'],
            ['name' =>'Hybrid'],
        )
        ->count(4)
        ->create();
        
        $makers =[
            'Toyota' =>['Camry', 'Corolla', 'Highlander', 'Rav4', 'Prius'],
            'Ford' =>['F-150', 'Escape', 'Explorer', 'Mustang', 'Fusion'],
            'Honda' =>['civic', 'Accord', 'CR-V', 'Pilot', 'Odyssey', 'HR-V'],
            'Chevrolet' =>['Silverado', 'Equinox', 'Malibu', 'Impala'],            
            'Nissan' =>['Altima', 'Sentra', 'Rogue', 'Maxima', 'Murano'],
            'Lexus' =>['RX400', 'RX450', 'RX350', 'ES350', 'LS500', 'IS500'],
        ];
        foreach($makers as $maker => $models){
            Maker::factory()
            ->state(['name' => $maker])
            ->has(
                Model::factory()
                ->count(count($models))
                ->sequence(...array_map(fn($model)=>['name'=> $model], $models))
            )
            ->create();
        }

        User::factory()
        ->count(3)
        ->create();

        User::factory()
        ->count(2)
        ->has(
            Car::factory()
            ->count(50)
            ->has(
                CarImage::factory()
                ->count(5)
                ->sequence(fn(Sequence $sequence) => ['position' => $sequence->index + 1]),
                'images'
            )
            ->hasFeatures(),
            'favouriteCars'
        )
        ->create();
    }
}
