<?php

namespace App\Http\Controllers;

use App\Models\Common;

class IndustriesController extends Controller
{
  /**
   * get all industry data
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
      'metaDetails' => $common->getMetaDataOfPage('industry'),
    ]);
  }

  /**
   * get all download data
   *
   * @return \Illuminate\View\View
   */
  public function getDownload()
  {
    $common = new Common;

    return view('download.download', [
      'downloadData' => $common->getDownloadData(),
      'metaDetails' => $common->getMetaDataOfPage('contact_us'),
    ]);
  }
}
