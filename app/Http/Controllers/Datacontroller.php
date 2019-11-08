<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Data;
use Illuminate\Http\Request;
use Session;

class DataController extends Controller
{
    
    public function getAllProduct(){
        $data = DB::select('select * from products');
        return json_encode($data);
    }

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
        if($request->session()->has('cart')){
            $cart = json_decode($request->session()->get('cart'));
            $total = $request->session()->get('cartTotal');
            foreach($cart as $key => $item){
                if($item[5] === $id){
                    $total -= (float)$cart[$key][4];
                    if($qty == 0){
                        $cart[$key][3] = (int)$item[3] + 1;                        
                    }else{
                        $cart[$key][3] = $qty;
                    }             
                    $cart[$key][4] = (float)$cart[$key][3] * (float)$item[2];    
                    $json = json_encode($cart);
                    $request->session()->put('cart', $json);

                    $total += (float)$cart[$key][4];
                    $request->session()->put('cartTotal', number_format((float)$total, 2, '.', ''));
                    return $request->session()->get('cartTotal');
                }
            }
        }        
        $product = array($data[0]->productName, $data[0]->productLine, $data[0]->MSRP, "1", $data[0]->MSRP, $data[0]->productCode);
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

    public function getAddr($id){
        $data = DB::select("select * from customerAddress where customerNumber = '$id'");
        return json_encode($data);
    }

    public function getVoucher(Request $request, $id){
        if(!($request->session()->has('cart')) || $id == "null"){
            return 0;
        }
        try{
            $data = DB::select("select * from voucher where voucherNumber = '$id'");
            $ex = DB::select("select sum(julianday(expireDate) - julianday(DATETIME('now'))) as ex from voucher where voucherNumber = '$id'");
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
            echo $e->getMessage();
        }
    }

    public function cartCheckout(Request $request) {
        if(!($request->session()->has('cart'))){
            return 1;
        }
        try{
            $cart = json_decode($request->session()->get('cart'));
            if($request->vdis == "0"){
                $total = $request->session()->get('cartTotal');
            }else{
                $total = $request->session()->get('cartTotal') - $request->vdis;
                DB::update("update voucher
                set remaining = remaining - 1
                where voucherNumber = '$request->vcode'");
            }

            $addr = DB::select("select * from customerAddress where mapNumber = '$request->addrnum'");
            $l1 = $addr[0]->addressLine1;
            $l2 = $addr[0]->addressLine2;
            $city = $addr[0]->city;
            $state = $addr[0]->state;
            $postal = $addr[0]->postalCode;
            $country = $addr[0]->country;

            if($request->vcode == ""){
                DB::insert("insert into orders(orderDate,requiredDate,shippedDate,status,comments,customerNumber,totalprice,addressLine1,addressLine2,city,state,postalCode,country)
                values (DATETIME('now'),'$request->reqDate','','In Process','','$request->cusnum','$total','$l1','$l2','$city','$state','$postal','$country');");
            }else{
                DB::insert("insert into orders(orderDate,requiredDate,shippedDate,status,comments,customerNumber,voucherNumber,totalprice,addressLine1,addressLine2,city,state,postalCode,country)
                values (DATETIME('now'),'$request->reqDate','','In Process','','$request->cusnum','$request->vcode','$total','$l1','$l2','$city','$state','$postal','$country');");
            }
            $orderNumberObj = DB::select("select seq from sqlite_sequence where name = 'orders'");
            $orderNumber = $orderNumberObj[0]->seq;
            
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

            $request->session()->forget('cart');
            $request->session()->forget('cartTotal');
            return 0;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function index()
    { 
        $data = DB::select('select * from products');
        $vendor = DB::select('select distinct productVendor from products');
        $scale = DB::select('select distinct productScale from products');
        $jsproductlist = json_encode($data);
        $jsvendor = json_encode($vendor);
        $jsscale = json_encode($scale);
        return view('index', ['jsproductlist' => $jsproductlist, 'jsvendor' => $jsvendor, 'jsscale' => $jsscale]);
    }

    public function customer()
    {
        $data = DB::select('select * from customers');
        $jscustomerlist = json_encode($data);
        return view('customer',['jscustomerlist' => $jscustomerlist]);
    }
    public function stockin()
    {
        $data = DB::select('select * from stockinHeader');
        $jsstockinHeaderList = json_encode($data);
        return view('stockin',['jsstockinHeaderList' => $jsstockinHeaderList]);
    }

    public function customerdetail($id)
    {
        return view('customerdetail',['id' => $id]);
    }

    public function customerdetail_id($id){
        $data = DB::select("select * from customers join customerAddress using(customerNumber) where customerNumber = '$id'");
        $jscustomerdetail = json_encode($data);
        return $jscustomerdetail;
    }

    
    public function indexem()
    {
        $data = DB::select('select * from products');
        $vendor = DB::select('select distinct productVendor from products');
        $scale = DB::select('select distinct productScale from products');
        $jsproductlist = json_encode($data);
        $jsvendor = json_encode($vendor);
        $jsscale = json_encode($scale);
        return view('products', ['jsvendor' => $jsvendor, 'jsscale' => $jsscale]);
    }

    public function deletepro($code)
    {
        $deleted = DB::select("delete from products where productCode = '$code'");
        return 'success';
    }

    public function cus()
    {
        $data = DB::select("select * from products");
        $jsscale = json_encode($data);
        return $jsscale;
    }

    public function login(Request $request)
    {
        $data = DB::select("select * from employees where email like '$request->email' and employeeNumber = '$request->password'");
        if($data != null){
            $request->session()->put('status','1');
            $request->session()->put('email',$data[0]->email);
            $request->session()->put('name',$data[0]->firstName);
            return redirect('/products');
        }else{
            return redirect('/')->with('alert', 'Invalid username or password !!');
       } 
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    public function addMulAddr(Request $request){
        DB::insert("insert into customerAddress (addressLine1,addressLine2,city,state,postalCode,country,customerNumber) 
        values ('$request->addressLine1','$request->addressLine2','$request->city','$request->state','$request->postalCode','$request->country','$request->customerNumber')");
        
    }

    public function updateMulAddr(Request $request){
        DB::update("update customerAddress set addressLine1 = '$request->addressLine1', 
        addressLine2 = '$request->addressLine2', city = '$request->city', state = '$request->state', 
        postalCode = '$request->postalCode', country = '$request->country' where customerNumber = $request->customerNumber and mapNumber = $request->mapNumber");
    }

    public function deleteMulAddr($map){
        DB::delete("delete from customerAddress where mapNumber = $map");
    }
    
}