<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CountryWebForm;
use App\Http\Requests\Web\V1\CountryWebRequest;
use App\Models\Entities\Country;

class CountryController extends WebBaseController
{
    public function index() {
        $countries = Country::orderBy('created_at', 'desc')->paginate(10);
        $country_web_form = CountryWebForm::inputGroups(null);
        return $this->adminPagesView('countries.index', compact('countries', 'country_web_form'));
    }

    public function store(CountryWebRequest $request) {
        $country = new Country();

        if($request->id) {
            $country = Country::find($request->id);
        }

        $country->name = $request->name;
        $country->second_name = $request->second_name;
        $country->save();

        $this->edited();

        return redirect()->route('country.index');
    }
}
