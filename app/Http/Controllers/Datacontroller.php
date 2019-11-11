<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Data;
use Illuminate\Http\Request;
Use Exception;
use Session;

class job{
    static $Match = array("Sales Rep"=>"0",
                             "Sales Manager (NA)"=>"1",
                             "Sale Manager (EMEA)"=>"1",
                             "Sales Manager (APAC)"=>"1",
                             "VP Marketing"=>"2",
                             "VP Sales"=>"2",
                             "President"=>"3"
                            );
    static $Title = array(array("Sales Rep","0"),
                      array("Sales Manager (NA)","1"),
                      array("Sale Manager (EMEA)","1"),
                      array("Sales Manager (APAC)","1"),
                      array("VP Marketing","2"),
                      array("VP Sales","2"),
                      array("President","3")
                    );
}
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
        return view('customer');
    }

    public function passGen()
    {
        $data = DB::select('select * from employees');
        foreach ($data as &$value) {
            $value->password = md5($value->employeeNumber);
            DB::update("update employees set password = '$value->password' where employeeNumber = '$value->employeeNumber'");
            print_r($value->employeeNumber);
            print_r("<br>");
        }
        return json_encode($data);
    }

  

    public function getcustomer()
    {
        $data = DB::select('select c.customerNumber,c.customerName,c.contactFirstName,c.contactLastName,c.phone,a.addressLine1,a.addressLine2,a.city,a.state,a.country,a.postalCode from customers as c join customerAddress as a using(customerNumber) GROUP by c.customerNumber');
        return json_encode($data);
    }
    public function stockin()
    {
        $data = DB::select('select * from stockinHeader');
        $jsstockinHeaderList = json_encode($data);
        return view('stockin',['jsstockinHeaderList' => $jsstockinHeaderList]);
    }

    public function customerdetail($id)
    {
        $data = DB::select("select * from customers where customerNumber = '$id'");
        $jscustomerdetail = json_encode($data);
        return view('customerdetail',['jscustomerdetail' => $jscustomerdetail ]);
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
        $deleted = DB::delete("delete from products where productCode = '$code'");
        return 'success';
    }

    public function deletecus($code)
    {
        $deleted = DB::delete("delete from customers where customerNumber = '$code'");
        return 'success';
    }
 
    public function erm(Request $request)
    {
        return view('ERM');
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    public function orders(Request $request)
    {
        return view('saleorder');
    }

    public function ermReq(Request $request)
    {
        $rep = $request->session()->get('rep'); 
        $id = $request->session()->get('code');
        $code = $request->session()->get('status');
        $data = DB::select("select a.employeeNumber,a.lastName,a.firstName,a.email,a.reportsTo,a.jobTitle,o.city,o.country from employees as a join offices as o using(officeCode)");
        $jobEm = array();
        foreach (job::$Title as &$value) {
            if($value[1] < job::$Match[$code]){array_push($jobEm,$value);}
        }
        $jobmm = array();
        $jobnm = array();
        $jobm = array();
        foreach ($data as &$value) {
            if(job::$Match[$value->jobTitle] <= job::$Match[$code] and job::$Match[$value->jobTitle] > 0 ){array_push($jobmm,$value);}
            if("$id" == $value->reportsTo){array_push($jobnm,$value);}
            if("$rep" == $value->employeeNumber){array_push($jobm,$value);}
        }
       
        return json_encode(array("job"=>$jobEm,"data"=>$jobnm,"rep"=>$jobmm,"repTo"=>$jobm));
    }

    public function test()
    {
        $vp = array("1056","VP Sales");
        $data = DB::select("select a.employeeNumber,a.lastName,a.firstName,a.email,a.reportsTo,a.jobTitle,o.city,o.country from employees as a join offices as o using(officeCode)");
        $jobEm = array();
        foreach (job::$Title as &$value) {
            if($value[1] < job::$Match[$vp[1]]){array_push($jobEm,$value);}
        }
        $jobmm = array();
        $jobnm = array();
        foreach ($data as &$value) {
            print_r(job::$Match[$value->jobTitle]);
            print_r("<=");
            print_r(job::$Match[$vp[1]]);
            print_r("<br>");
            if(job::$Match[$value->jobTitle] <= job::$Match[$vp[1]] and job::$Match[$value->jobTitle] > 0 ){array_push($jobmm,$value);}
            if("1056" == $value->reportsTo){array_push($jobnm,$value);}
        }
        return json_encode(array("job"=>$jobEm,"data"=>$jobnm,"rep"=>$jobmm));
    }

    public function updateerm(Request $request){
        try
        {
            if(job::$Match[$request->newjob] <= job::$Match[$request->session()->get('status')]){
                $data = DB::update("update employees set jobTitle = '$request->newjob', reportsTo = '$request->repTo' where employeeNumber = '$request->emid'");
            }else{
                throw new Exception("Error");
            }
        }
        catch(Exception $e)
        {
           echo $e->getMessage();
        }
        
    }

    
    public function updateorder(Request $request){
        try
        {
            $data = DB::update("update orders set status = '$request->status', shippedDate = '$request->date' where orderNumber = '$request->orderNumber'");
        }
        catch(Exception $e)
        {
           echo $e->getMessage();
        }
    }

    public function saleorderdetail($id){
        $data = DB::select("select * from orderdetails where orderNumber = '$id'");
        
        return view('orderdetail', ['jsorder' => json_encode($data)]);
    }

    public function saleorder(){
        $data = DB::select("select * from orders join customers using(customerNumber)");
        return json_encode($data);
    }

    public function addcus(Request $request)
    {
        try
        {
            $code = $request->session()->get('code');
            DB::insert("insert into customers (customerName,contactLastName,contactFirstName,phone,salesRepEmployeeNumber,creditLimit) 
            values ( '$request->customerName', '$request->contactLastName', '$request->contactFirstName', '$request->phone', '$code','$request->creditLimit');");
            $data = DB::select("select * from sqlite_sequence where name = 'customers'");
            $no = $data[0]->seq;
            DB::insert("insert into customerAddress (addressLine1,addressLine2,city,state,postalCode,country,CustomerNumber) 
            values ('$request->line1','$request->line2','$request->city','$request->state','$request->postalCode','$request->country','$no');");
        }
        catch(Exception $e)
        {
           echo $e->getMessage();
        }
    }

    public function login(Request $request)
    {
        $data = DB::select("select * from employees where email like '$request->email' and password = '$request->password'");
        if($data != null){
            $request->session()->put('email',$data[0]->email);
            $request->session()->put('name',$data[0]->firstName);
            $request->session()->put('code',$data[0]->employeeNumber);
            $request->session()->put('status',$data[0]->jobTitle);
            $request->session()->put('rep',$data[0]->reportsTo);
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