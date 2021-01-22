<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Address;

class CompanyWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = FormUtil::input('id', 1, null,
            'number', $value ? true : false,
            $value ? $value->id : '', null, null, true);

        $addresses_options = [];
        $addresses = Address::all();
        $addresses_options[] = ['value' => '', 'selected' => 'selected', 'title' => 'Не выбрано'];
        foreach ($addresses as $address) {
            $addresses_options[] = ['title' => $address->name, 'value' => $address->id,
                'selected' => $value ? $value->address_id == $address->id ? 'selected' : '' : ''];
        }

        return array_merge(
            $array,
            FormUtil::input('name', 'Кулагер', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::input('second_name', 'Кулагер Сервис', 'Дополнительное название',
                'text', false, $value ? $value->second_name : ''),
            FormUtil::select('address_id', '', 'Адрес', false, $addresses_options),
            FormUtil::input('bik', '0702000007', 'БИК',
                'text', false, $value ? $value->bik : ''),
            FormUtil::input('bin', '1234567890123', 'БИН/ИИН',
                'text', false, $value ? $value->bin_iin : ''),
            FormUtil::input('inn', '1234567890123', 'БИН/ИНН',
                'text', false, $value ? $value->bin_inn : '')
        );
    }
}
