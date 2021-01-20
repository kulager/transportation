<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CountryWebForm;
use App\Models\Entities\Country;
use Illuminate\Http\Request;

class CountryController extends WebBaseController
{
    public function index() {
        $countries = Country::orderBy('created_at', 'desc')->paginate(10);
        $country_web_form = CountryWebForm::inputGroups(null);
        return $this->adminPagesView('countries.index', compact('countries', 'country_web_form'));
    }
}
