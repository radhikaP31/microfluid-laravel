<?php

namespace App\Http\Controllers;

use App\Models\Common;

class IndustriesController extends Controller
{
  /**
   * get all blog data
   * @param string $slug
   *
   * @return \Illuminate\View\View
   */
  public function getIndustry($slug = null)
  {
    $common = new Common;
    if ($slug) {
      $viewName = 'industry.singleIndustry';
      $fieldApplication = $common->getIndependentDataBylug($slug)->first();
    } else {
      $viewName = 'industry.allIndustries';
      $fieldApplication = $common->getIndependentDataByTypeCode('FOA');
    }

    return view($viewName, [
      'fieldApplication' => $fieldApplication,
    ]);
  }
}
