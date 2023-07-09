<?php

namespace App\Http\Controllers;

use App\Models\Common;

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
            'fieldApplication' => $common->getIndependentDataByTypeCode('FOA'),
            'metaDetails' => $common->getMetaDataOfPage('about_us'),
        ]);
    }
}
