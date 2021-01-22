<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'tn_id'];

    public function getForm() {
        return \App\Http\Forms\Web\V1\ProductWebForm::inputGroups($this);
    }
}
