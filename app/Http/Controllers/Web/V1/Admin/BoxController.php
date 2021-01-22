<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\BoxWebForm;
use App\Http\Requests\Web\V1\BoxWebRequest;
use App\Models\Entities\Box;

class BoxController extends WebBaseController
{
    public function index() {
        $boxes = Box::orderBy('created_at', 'desc')->paginate(10);
        $box_web_form = BoxWebForm::inputGroups(null);
        return $this->adminPagesView('box.index', compact('boxes', 'box_web_form'));
    }

    public function store(BoxWebRequest $request) {
        $box = new Box();

        if($request->id) {
            $box = Box::find($request->id);
        }

        $box->name = $request->name;
        $box->save();

        $this->edited();

        return redirect()->route('box.index');
    }
}
