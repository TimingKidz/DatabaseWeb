<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Data;
use Illuminate\Http\Request;
Use Exception;
use Session;

class DataController extends Controller
{
    
    public function getAllProduct(){
        $data = DB::select('select * from products');
        return json_encode($data);
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

    public function orders(Request $request)
    {
        return view('saleorder');
    }

    public function ermReq(Request $request)
    {
        $data = DB::select("select a.employeeNumber,a.lastName,a.firstName,a.email,a.reportsTo,a.jobTitle,o.city,o.country from employees as a join offices as o using(officeCode)");
        // $data = DB::select("select * from employees join offices using(officeCode) where reportsTO ='$code'");
        return json_encode($data);
    }

    public function updateerm(){
        try
        {
            $data = DB::update("update employees set jobTitle = '$request->newjob', reportsTo = '$request->repTo' where employeeNumber = '$request->emid'");
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