<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{

   public function kabupaten($id)
    {
        $cities = DB::table("regencies")
                    ->where("province_id",$id)
                    ->pluck("name","id");
        return json_encode($cities);
    }
}