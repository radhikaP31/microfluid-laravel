<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    use HasFactory;

    /*function for get master data by type code
    * @params varchar type $type_code
    * @return array
    */
    public function getIndependentDataByTypeCode($type_code=''){

        $result = DB::table('independent_mst')->where('type_cd',$type_code)->orderBy('sequence')->get();
        return $result;
    }
}
