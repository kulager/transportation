<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class CountryWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
            $array = FormUtil::input('id', 1, null,
                'numeric', $value ? true : false,
                $value ? $value->id : '', null, null, true);
        return array_merge(
            $array,
            FormUtil::input('name', 'Казахстанская Республика', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::input('second_name', 'РФ', 'Дополнительное название',
                'text', true, $value ? $value->second_name : '')
        );
    }
}
