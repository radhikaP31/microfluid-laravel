<?php

namespace App\Http\Controllers;

use App\Models\Common;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index() {
        $common = new Common();
        return view('admin.listview', [
            'title' => 'Country List',
            'header' => ['id' => 'Id', 'code' => 'Code', 'name' => 'Name', 'phonecode' => 'Phone Code','isd_code' => 'ISD Code', 'is_deleted' => 'Deleted'],
            'data' => $common->getAllDataWithDeleted('web_country', 'name'),
            'action' => ['add' => 'common_type_add', 'edit' => 'common_type_edit', 'delete' => 'common_type_delete'],
        ]);
    }

    /**
     * Add data in list view
     *
     * @param int $id id
     * @return $view
     */
    public function create($id = 0) {
        $common = new Common;
        if($id) {
            $fieldList = [];
            return view('admin.formview', [
                'title' => 'Edit Country',
                'fields' => $fieldList,
                'header' => ['id' => 'Id', 'code' => 'Code', 'name' => 'Name', 'phonecode' => 'Phone Code', 'isd_code' => 'ISD Code', 'is_deleted' => 'Deleted'],
                'data' => $common->getDataOfId('web_country', $id),
                'action' => ['edit' => '/common-type/edit/' . $id, 'delete' => 'common_type_delete'],
            ]);
        } else {
            $fieldList = [];
            return view('admin.formview', [
                'title' => 'Add Country',
                'fields' => $fieldList,
                'header' => ['id' => 'Id', 'code' => 'Code', 'name' => 'Name', 'phonecode' => 'Phone Code', 'isd_code' => 'ISD Code', 'is_deleted' => 'Deleted'],
                'data' => $common->getAllDataWithDeleted('web_country', 'name'),
                'action' => ['add' => 'common_type_add', 'edit' => 'common_type_edit', 'delete' => 'common_type_delete'],
            ]);
        }
    }

    /**
     * for edit form
     *
     * @param int $id id
     */
    public function edit ($id = 0) {
        $data = $this->get($id);
    }
}
