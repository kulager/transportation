<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Country;

class CityWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = FormUtil::input('id', 1, null,
            'numeric', $value ? true : false,
            $value ? $value->id : '', null, null, true);
        $countries_options = [];
        $countries = Country::all();
        foreach ($countries as $country) {
            $countries_options[] = ['title' => $country->name, 'value' => $country->id,
                'selected' => $value ? $value->country_id == $country->id ? 'selected' : '' : ''];
        }
        return array_merge(
            $array,
            FormUtil::input('name', 'Ухань', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::input('second_name', 'город Ухань', 'Дополнительное название',
                'text', true, $value ? $value->second_name : ''),
            FormUtil::select('country_id', '', 'Страна', true, $countries_options)
        );
    }
}
