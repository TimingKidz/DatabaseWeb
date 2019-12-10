<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Exception;

class CartController extends Controller
{
    public function getCart(Request $request) {
        if($request->session()->has('cart')){
            return $request->session()->get('cart');
        }       
    }

    public function getCartTotal(Request $request) {
        if($request->session()->has('cartTotal')){
            return $request->session()->get('cartTotal');
        }       
    }

    public function getAddToCart(Request $request, $id, $qty) {
        $data = DB::select("select * from products where productCode = '$id'");
        $cart = [];
        $total = 0;
        if($data[0]->quantityInStock == 0){
            return -1;
        }
        if($request->session()->has('cart')){
            $cart = json_decode($request->session()->get('cart'));
            $total = $request->session()->get('cartTotal');
            foreach($cart as $key => $item){
                if($item[5] === $id){
                    $total -= (float)$cart[$key][4];
                    if($qty == 0){
                        if((int)$cart[$key][3] == (int)$cart[$key][6]){
                            return -2;
                        }
                        $cart[$key][3] = (int)$item[3] + 1;                        
                    }else if($qty > (int)$cart[$key][6]){
                        $cart[$key][3] = (int)$cart[$key][6];
                    }else{
                        $cart[$key][3] = $qty;
                    }             
                    $cart[$key][4] = number_format((float)$cart[$key][3] * (float)$item[2], 2, '.', '');                     
                    $json = json_encode($cart);
                    $request->session()->put('cart', $json);

                    $total += (float)$cart[$key][4];
                    $request->session()->put('cartTotal', number_format((float)$total, 2, '.', ''));
                    return $request->session()->get('cartTotal');
                }
            }
        }        
        $product = array($data[0]->productName, $data[0]->productLine, $data[0]->MSRP, "1", $data[0]->MSRP, $data[0]->productCode, $data[0]->quantityInStock);
        array_push($cart,$product);
        $json = json_encode($cart);
        $request->session()->put('cart', $json);

        $total += (float)$data[0]->MSRP;
        $request->session()->put('cartTotal', number_format((float)$total, 2, '.', ''));
        return $total;
    }

    public function deleteFromCart(Request $request, $id){
        $cart = json_decode($request->session()->get('cart'));
        $total = $request->session()->get('cartTotal');
        foreach($cart as $key => $item){
            if($item[5] === $id){
                $total -= (float)$cart[$key][4];
                array_splice($cart, $key, 1);
                break;
            }
        }        
        $json = json_encode($cart);
        $request->session()->put('cart', $json);
        $request->session()->put('cartTotal', number_format((float)$total, 2, '.', ''));
        return $total;
    }

    public function clearall(Request $request){
        $request->session()->forget('cart');
        $request->session()->forget('cartTotal');
        return 0;
    }

    public function getAddr($id){
        $data = DB::select("select * from customerAddress where customerNumber = '$id' and delete_at is null");
        return json_encode($data);
    }

    public function getVoucher(Request $request, $id){
        if(!($request->session()->has('cart')) || $id == "null"){
            return 0;
        }
        try{
            $data = DB::select("select * from voucher where voucherNumber = '$id'");
            $ex = DB::select("select sum(julianday(expireDate) - julianday(date('now','localtime'))) as ex from voucher where voucherNumber = '$id'");
            $expired = (int)$ex[0]->ex;
            $rem = $data[0]->remaining;
            if($rem <= 0){
                return 1;
            }else if ($expired < 0){
                return 2;
            }else{
                return json_encode($data);
            }
        }catch (Exception $e){
            return 3;
        }
    }

    public function cartCheckout(Request $request) {
        if(!($request->session()->has('cart'))){
            return 1;
        }
        try{
            $cart = json_decode($request->session()->get('cart'));

            //...Voucher empty ?
            if($request->vdis == "0"){
                $total = $request->session()->get('cartTotal');
            }else{
                $total = $request->session()->get('cartTotal') - $request->vdis;
                DB::update("update voucher
                set remaining = remaining - 1
                where voucherNumber = '$request->vcode'");
            }

            //...Total Point earn
            $point = (int)($total / 100) * 3;

            //...Insert into Order table
            if($request->vcode == ""){
                DB::insert("insert into orders(orderDate,requiredDate,shippedDate,status,comments,customerNumber,totalprice,pointEarn,shippingAddr_id,billingAddr_id)
                values (date('now','localtime'),'$request->reqDate','','In Process','','$request->cusnum','$total','$point','$request->shipaddrnum','$request->billaddrnum');");
            }else{
                DB::insert("insert into orders(orderDate,requiredDate,shippedDate,status,comments,customerNumber,voucherNumber,totalprice,pointEarn,shippingAddr_id,billingAddr_id)
                values (date('now','localtime'),'$request->reqDate','','In Process','','$request->cusnum','$request->vcode','$total','$point','$request->shipaddrnum','$request->billaddrnum');");
            }

            //...Get auto gen ID
            $orderNumberObj = DB::select("select seq from sqlite_sequence where name = 'orders'");
            $orderNumber = $orderNumberObj[0]->seq;
            
            //...Loop add to OrderDetails
            foreach($cart as $key => $item){
                $line = $key+1;
                $proCode = $cart[$key][5];
                $qty = (int)$cart[$key][3];
                $price = $cart[$key][2];                
                DB::insert("insert into orderdetails(orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)
                values ('$orderNumber', '$proCode', '$qty', '$price', '$line')");
                DB::update("update products
                set quantityInStock = quantityInStock - $qty
                where productCode = '$proCode'");
            } 
            
            //...Update memberPoint
            DB::update("update customers
            set memberPoint = memberPoint + $point
            where customerNumber = '$request->cusnum'");

            //...Reset session
            $request->session()->forget('cart');
            $request->session()->forget('cartTotal');
            return $point;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}
