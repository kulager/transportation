<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['document_id', 'date', 'deadline', 'car_brand',
        'second_car_brand', 'car_number', 'second_car_number', 'company_id',
        'address_id', 'driver_id', 'second_driver_id', 'driver_full_name',
        'driver_passport', 'driver_birth_date', 'contract_person', 'second_driver_full_name'];

    public function products() {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function secondDriver() {
        return $this->belongsTo(Driver::class, 'second_driver_id', 'id');
    }

    public function address() {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
