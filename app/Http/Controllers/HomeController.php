<?php

namespace App\Http\Controllers;

use App\Models\Common;

use function Psy\debug;

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
            'fieldApplication' => $common->getIndependentDataByTypeCode('FOA'),
            'metaDetails' => $common->getMetaDataOfPage('home'),
        ]);
    }
}
