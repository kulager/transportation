<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['full_name', 'passport', 'birth_date'];

    public function getForm() {
        return \App\Http\Forms\Web\V1\DriverWebForm::inputGroups($this);
    }
}
