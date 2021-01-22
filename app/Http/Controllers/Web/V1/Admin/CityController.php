<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CityWebForm;
use App\Http\Requests\Web\V1\CityWebRequest;
use App\Models\Entities\City;

class CityController extends WebBaseController
{
    public function index() {
        $cities = City::with('country')->orderBy('created_at', 'desc')->paginate(10);
        $city_web_form = CityWebForm::inputGroups(null);
        return $this->adminPagesView('city.index', compact('cities', 'city_web_form'));
    }

    public function store(CityWebRequest $request) {
        $city = new City();

        if($request->id) {
            $city = City::find($request->id);
        }

        $city->name = $request->name;
        $city->second_name = $request->second_name;
        $city->country_id = $request->country_id;
        $city->save();

        $this->edited();

        return redirect()->route('city.index');
    }
}
