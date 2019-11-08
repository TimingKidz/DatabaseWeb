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
                    $request->session()->put('cartTotal', $total);
                    return $request->session()->get('cartTotal');
                }
            }
        }        
        $product = array($data[0]->productName, $data[0]->productLine, $data[0]->MSRP, "1", $data[0]->MSRP, $data[0]->productCode);
        array_push($cart,$product);
        $json = json_encode($cart);
        $request->session()->put('cart', $json);

        $total += (float)$data[0]->MSRP;
        $request->session()->put('cartTotal', $total);
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
        $request->session()->put('cartTotal', $total);
        return $total;
    }

    public function getAddr($id){
        $data = DB::select("select * from customerAddress where customerNumber = '$id'");
        return json_encode($data);
    }

    public function cartCheckout(Request $request) {
        if(!($request->session()->has('cart'))){
            return 1;
        }
        try{
            $cart = json_decode($request->session()->get('cart'));
            $total = $request->session()->get('cartTotal');
            if($request->vcode == ""){
                DB::insert("insert into orders(orderDate,requiredDate,shippedDate,status,comments,customerNumber,totalprice)
                values (DATETIME('now'), '$request->reqDate', '', 'In Process', '', '$request->cusnum', '$total');");
            }else{
                DB::insert("insert into orders(orderDate,requiredDate,shippedDate,status,comments,customerNumber,voucherNumber,totalprice)
                values (DATETIME('now'), '$request->reqDate', '', 'In Process', '', '$request->cusnum', '$request->vcode', '$total');");
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

    public function customerdetail($id)
    {
        $data = DB::select("select * from customers where customerNumber = '$id'");
        $jscustomerdetail = json_encode($data);
        return view('customerdetail',['jscustomerdetail' => $jscustomerdetail]);
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

    
}