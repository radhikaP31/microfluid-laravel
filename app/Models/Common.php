<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    use HasFactory;

    public $table = "independent_mst";

    /* function for get language
    * @params varchar type $variable_name
    * @return string
    */
    function getLanguage($variable_name=''){

        $result = DB::table('web_language')->select('name')->where('variable',$variable_name)->first();
        return $result;
    }

    /*function for get master data by type code
    * @params varchar type $type_code
    * @return array
    */
    public function getIndependentDataByTypeCode($type_code=''){

        $result = DB::table('independent_mst')->where('type_cd',$type_code)->orderBy('sequence')->get();
        return $result;
    }

    /*function for get master data by slug
    * @params varchar type $slug
    * @return array
    */
    public function getIndependentDataBylug($slug=''){

        $result = DB::table('independent_mst')->where('slug',$slug)->get();
        return $result;
    }

    /**Function to get clients from web_clients table
    * @return array  
    **/
    function getOurClients() {

        $result = DB::table('web_clients')->where('is_deleted',0)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get All About us information from web_about_info table
    * @return array  
    **/
    function getAboutUsInformation() {

        $result = DB::table('web_about_info')->where('is_deleted',0)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get products from web_products,web_product_image table
    * @params $product_id type integer
    * @return array  
    **/
    function getProductKeyDetailsByID($product_id=0, $tableName='') {  

        $result = DB::table($tableName)->where('is_deleted',0)->where('product_id',$product_id)->orderBy('sequence')->get();
        return $result; 
    }

    /**Function to get countries from web_country table
     * @return array  
     **/
    function getAllCountry()
    {
        $result = DB::table('web_country')->where('is_deleted', 0)->orderBy('name')->get();
        return $result;
    }

    /**Function to get states from web_state table
     * @params $product_id type integer
     * @return array  
     **/
    function getAllState($country_id = '')
    {
        if($country_id) {
            return DB::table('web_states')->where('country_id', $country_id)->where('is_deleted', 0)->orderBy('name')->get()->toArray();
        } else {
            return DB::table('web_states')->where('is_deleted', 0)->orderBy('name')->get();
        }
    }
}
