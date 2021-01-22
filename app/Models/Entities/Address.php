<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['name', 'second_name', 'city_id'];

    public function getForm() {
        return \App\Http\Forms\Web\V1\AddressWebForm::inputGroups($this);
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
