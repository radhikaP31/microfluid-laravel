<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Common;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * get all user data
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       $common = new Common;
       dd(DB::table('common_type')->first());
        return view('index', [
            'whatWeOfferData' => $common->getIndependentDataByTypeCode('WTOFR') //call repository method
        ]);        
    }

}
