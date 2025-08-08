<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'maker_id',
        'model_id',
        'year',
        'price',
        'vin',
        'mileage',
        'car_type_id',
        'fuel_type_id',
        'user_id',
        'city_id',        
        'address',    
        'phone',    
        'description',
        'published_at'
    ];



    //protected $guarded = [];

    public function features(): HasOne{
        return $this->hasOne(CarFeatures::class, 'car_id'); // define one-to-one relation on car feature, and use car_id to connect 2 tables 
    }

    public function primaryImage(): HasOne{
        return $this->hasOne(CarImage::class,'car_id')// define one-to-one relation on car image , use car id to connect both tables
        ->oldestOfMany('position');//take the lowest position as primary
    }

    public function images(): HasMany{
        return $this->hasMany(CarImage::class, 'car_id'); // define one-to-many relation on car images, use car id to connect tables
    }

    public function carType(): BelongsTo{
        return $this->belongsTo(CarType::class,'car_type_id');
    }

    public function favouredUsers(): BelongsToMany {
        return $this->belongsToMany(User::class,'favorite_cars'); //define many to many relation on user table, uses favourite car to connect both tables and uses car id  to relate to current model which is car and use user id to relate to other table which is user
    }

    public function fuelType(): BelongsTo{
        return $this->belongsTo(FuelType::class); // define one to many on fuel type table
    }

    public function maker(): BelongsTo{
        return $this->belongsTo( Maker::class);
    }
    public function model(): BelongsTo{
        return $this->belongsTo( Model::class);
    }

    public function owner(): BelongsTo{
        return $this->belongsTo( User::class, 'user_id');
    }

    public function city(): BelongsTo{
        return $this->belongsTo( City::class);
    }




}