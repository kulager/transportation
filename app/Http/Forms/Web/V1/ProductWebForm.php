<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class ProductWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = FormUtil::input('id', 1, null,
            'number', $value ? true : false,
            $value ? $value->id : '', null, null, true);
        return array_merge(
            $array,
            FormUtil::input('name', 'Томаты свежие', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::input('tn_id', '0702000007', 'ТН ВЭД',
                'number', true, $value ? $value->tn_id : '')
        );
    }
}
