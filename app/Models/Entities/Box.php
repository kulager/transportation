<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = ['name'];

    public function getForm() {
        return \App\Http\Forms\Web\V1\BoxWebForm::inputGroups($this);
    }
}
