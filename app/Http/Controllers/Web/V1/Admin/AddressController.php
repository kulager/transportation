<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\AddressWebForm;
use App\Http\Requests\Web\V1\AddressWebRequest;
use App\Models\Entities\Address;

class AddressController extends WebBaseController
{
    public function index()
    {
        $addresses = Address::with('city')->orderBy('created_at', 'desc')->paginate(10);
        $address_web_form = AddressWebForm::inputGroups(null);
        return $this->adminPagesView('address.index', compact('addresses', 'address_web_form'));
    }

    public function store(AddressWebRequest $request)
    {
        $address = new Address();

        if ($request->id) {
            $address = Address::find($request->id);
        }

        $address->name = $request->name;
        $address->second_name = $request->second_name;
        $address->city_id = $request->city_id;
        $address->save();

        $this->edited();

        return redirect()->route('address.index');
    }
}
