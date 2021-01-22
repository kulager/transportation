<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class DriverWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = FormUtil::input('id', 1, null,
            'number', $value ? true : false,
            $value ? $value->id : '', null, null, true);
        return array_merge(
            $array,
            FormUtil::input('full_name', 'Мамедов Е', 'Полное имя',
                'text', true, $value ? $value->full_name : ''),
            FormUtil::input('passport', '0702000007', 'Пасспорт',
                'number', true, $value ? $value->passport : ''),
            FormUtil::input('birth_date', '', 'Дата рождения',
                'date', true, $value ? $value->birth_date : '')
        );
    }
}
