<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


$arr = DB::select('select city from customers where customerNumber = "103"');
                
foreach ($arr as $a){
        echo $a;
    }
