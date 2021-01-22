<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'second_name', 'country_id'];

    public function getForm() {
        return \App\Http\Forms\Web\V1\CityWebForm::inputGroups($this);
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id','id');
    }
}
