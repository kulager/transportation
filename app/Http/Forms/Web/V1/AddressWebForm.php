<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\City;

class AddressWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        $array = FormUtil::input('id', 1, null,
            'numeric', $value ? true : false,
            $value ? $value->id : '', null, null, true);
        $cities_options = [];
        $cities = City::all();
        foreach ($cities as $city) {
            $cities_options[] = ['title' => $city->name, 'value' => $city->id,
                'selected' => $value ? $value->city_id == $city->id ? 'selected' : '' : ''];
        }
        return array_merge(
            $array,
            FormUtil::input('name', 'Зеленый базар', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::input('second_name', 'Базар зеленый', 'Дополнительное название',
                'text', true, $value ? $value->second_name : ''),
            FormUtil::select('city_id', '', 'Город', true, $cities_options)
        );
    }
}
