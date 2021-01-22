<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\DriverWebForm;
use App\Http\Requests\Web\V1\DriverWebRequest;
use App\Models\Entities\Driver;
use Illuminate\Http\Request;

class DriverController extends WebBaseController
{
    public function index() {
        $drivers = Driver::orderBy('created_at', 'desc')->paginate(10);
        $driver_web_form = DriverWebForm::inputGroups(null);
        return $this->adminPagesView('driver.index', compact('drivers', 'driver_web_form'));
    }

    public function store(DriverWebRequest $request) {
        $driver = new Driver();

        if($request->id) {
            $driver = Driver::find($request->id);
        }

        $driver->full_name = $request->full_name;
        $driver->passport = $request->passport;
        $driver->birth_date = $request->birth_date;
        $driver->save();

        $this->edited();

        return redirect()->route('driver.index');
    }
}
