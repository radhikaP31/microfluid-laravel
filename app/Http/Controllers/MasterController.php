<?php

namespace App\Http\Controllers;

use App\Models\Common;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index() {
        $common = new Common();
        return view('admin.listview', [
            'title' => 'Common Type',
            'header' => ['id' => 'Id', 'code' => 'Code', 'name' => 'Name', 'phonecode' => 'Phone Code','isd_code' => 'ISD Code', 'is_deleted' => 'Deleted'],
            'data' => $common->getAllDataWithDeleted('web_country', 'name'),
            'action' => ['add' => 'common_type_add', 'edit' => 'common_type_edit', 'delete' => 'common_type_delete'],
        ]);
    }

    // Add Item list view
    public function create($id = 0) {

        if($id) {
            $fieldList = [];
            return view('admin.formview', [
                'title' => 'Add Common Type',
                'fields' => $fieldList,
                'header' => ['id' => 'Id', 'code' => 'Code', 'name' => 'Name', 'phonecode' => 'Phone Code', 'isd_code' => 'ISD Code', 'is_deleted' => 'Deleted'],
                'data' => $common->getDataOfId('web_country', 'name'),
                'action' => ['add' => 'common_type_add', 'edit' => '/common-type/edit/', 'delete' => 'common_type_delete'],
            ]);
        } else {
            $fieldList = [];
            return view('admin.formview', [
                'title' => 'Add Common Type',
                'fields' => $fieldList,
                'header' => ['id' => 'Id', 'code' => 'Code', 'name' => 'Name', 'phonecode' => 'Phone Code', 'isd_code' => 'ISD Code', 'is_deleted' => 'Deleted'],
                'data' => $common->getAllDataWithDeleted('web_country', 'name'),
                'action' => ['add' => 'common_type_add', 'edit' => 'common_type_edit', 'delete' => 'common_type_delete'],
            ]);
        }
    }
}
