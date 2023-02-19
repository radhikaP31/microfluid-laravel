<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Common;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * get all user data
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $common = new Common;
        return view('home.home', [
            'whatWeOfferData' => $common->getIndependentDataByTypeCode('WTOFR'),
            'fieldApplication' => $common->getIndependentDataByTypeCode('FOA')
        ]);
    }

}
