<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 19:30
 */

namespace App\Http\Controllers\Web\V1\Admin;


use App\Http\Controllers\Web\WebBaseController;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PageController extends WebBaseController
{

    public function home()
    {
        return $this->adminView('pages.home');
    }

    public function files($relative_path)
    {
        if (Storage::cloud()->exists($relative_path)) {
            return Storage::cloud()->response($relative_path);
        }
        abort(404);
    }

    public function test()
    {
//        $my_template = new TemplateProcessor(storage_path('app/public/first_doc_template.docx'));
//
//        $my_template->setValue('country', 'test');
//
//        try{
//            $my_template->saveAs(storage_path('first.docx'));
//        }catch (Exception $e){
//            //handle exception
//        }

        $spreadsheet = new Spreadsheet();

// Re?
    }
}
