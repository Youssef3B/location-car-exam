<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'fuel_type',
        'Status',
        'mileage',
        'price',
        'priceRental',
        'is_rental',
        'description',
        'image'
    ];

    protected $casts = [
        'is_rental' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function sale()
    {
        return $this->hasOne(Sale::class);
    }
public function owner()
{
    return $this->belongsTo(User::class, 'user_id'); // Adjust foreign key if needed
}
}
