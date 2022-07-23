<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Common;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{

    /**
     * get all about us data
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $common = new Common;
        return view('about.about', [
            'aboutUsInformation' => $common->getAboutUsInformation(),
            'fieldApplication' => $common->getIndependentDataByTypeCode('FOA')
        ]);
    }
}
