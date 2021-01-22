<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'second_name'];

    public function getForm() {
       return \App\Http\Forms\Web\V1\CountryWebForm::inputGroups($this);
    }
}
