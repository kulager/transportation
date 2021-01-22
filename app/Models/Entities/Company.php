<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'second_name', 'bik', 'bin_iin',
        'bin_inn', 'address_id'];

    public function getForm() {
        return \App\Http\Forms\Web\V1\CompanyWebForm::inputGroups($this);
    }

    public function address() {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }
}
