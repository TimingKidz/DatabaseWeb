<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AddrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findshiped($order){
        
        $data = DB::select("select * from orders join customerAddress where orderNumber = '$order' 
        and (orders.shippingAddr_id = customerAddress.mapNumber)");
        $data2 = DB::select("select * from orders join customerAddress where orderNumber = '$order' 
        and (orders.billingAddr_id = customerAddress.mapNumber)");
        return json_encode(array('ship'=>$data,'bill'=>$data2));
    }
    
}
