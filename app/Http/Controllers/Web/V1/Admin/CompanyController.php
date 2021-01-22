<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CompanyWebForm;
use App\Http\Requests\Web\V1\CompanyWebRequest;
use App\Models\Entities\Company;
use Illuminate\Http\Request;

class CompanyController extends WebBaseController
{
    public function index() {
        $companies = Company::with('address')->orderBy('created_at', 'desc')->paginate(10);
        $company_web_form = CompanyWebForm::inputGroups(null);
        return $this->adminPagesView('company.index', compact('companies', 'company_web_form'));
    }

    public function store(CompanyWebRequest $request) {
        $company = new Company();

        if($request->id) {
            $company = Company::find($request->id);
        }

        $company->name = $request->name;
        $company->second_name = $request->second_name;
        $company->address_id = $request->address_id;
        $company->bik = $request->bik;
        $company->bin_iin = $request->bin;
        $company->bin_inn = $request->inn;
        $company->save();

        $this->edited();

        return redirect()->route('company.index');
    }
}
