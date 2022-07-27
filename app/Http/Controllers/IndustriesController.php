<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Common;

class IndustriesController extends Controller
{
  /**
   * get all blog data
   *
   * @return \Illuminate\View\View
   */
  public function getIndustry($slug = null)
  {
    $common = new Common;
    if ($slug) {
      return view('industry.singleIndustry', [
        'fieldApplication' => $common->getIndependentDataBylug($slug)->first()
      ]);
    } else {
      return view('industry.allIndustries', [
        'fieldApplication' => $common->getIndependentDataByTypeCode('FOA')
      ]);
    }
  }
}
