<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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

    public function getProduct(Request $request){
        $data = DB::select("select * from products where productLine = '$request->Line'");
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

    public function getproductline()
    {
        $data = DB::select('select * from productlines');
        return json_encode($data);
    }
  

    public function getcustomer()
    {
        $data = DB::select('select c.customerNumber,c.customerName,c.contactFirstName,c.contactLastName,c.phone,a.addressLine1,a.addressLine2,a.city,a.state,a.country,a.postalCode from customers as c join customerAddress as a using(customerNumber) GROUP by c.customerNumber');
        return json_encode($data);
    }
    public function getstockin()
    {
        $data = DB::select('select * from stockinHeader');
        return json_encode($data);
    }
    public function getcommentstockin($code)
    {
        $data = DB::select("select stockNumber,comments from stockinHeader where stockNumber='$code'");
        return json_encode($data);
    }
    public function stockin()
    {
        return view('stockin');
    }

    public function addstockin(Request $request)
    {
        try
        {
            $code = $request->session()->get('code');
            DB::insert("insert into stockinHeader (stockDate,comments) 
            values ( '$request->stockDate', '$request->comments');");
            $data = DB::select("select * from sqlite_sequence where name = 'stockinHeader'");
            $no = $data[0]->seq;
            DB::insert("insert into stockinDetails (stockinNumber,productCode,quantityOrdered) 
            values ('$no','$request->productCode','$request->quantityOrdered');");
        }
        catch(Exception $e)
        {
           echo $e->getMessage();
           
        }
    }

    public function stockindetails($stockNumber){
        $data = DB::select("select * from stockinDetails join stockinHeader on stockinNumber=stockNumber where stockinNumber = '$stockNumber'");
        
        return view('stockindetails', ['jsstockindetails' => json_encode($data)], ['id' => $stockNumber]);
    }
    public function stockHD($stockinNumber){
        $data = DB::select("select * from stockinHeader join stockinDetails on stockinNumber=stockNumber where stockNumber='$stockinNumber'");
        return json_encode($data);
    }

    public function customerdetail($id)
    {
        return view('customerdetail',['id' => $id]);
    }

    public function customerdetail_id($id){
        $data = DB::select("select * from customers join customerAddress using(customerNumber) where customerNumber = '$id' and delete_at is NULL");
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

    public function deletestockHeader($code)
    {
        $deleted = DB::delete("delete from stockinHeader where stockNumber = '$code'");
        return 'success';
    }

    public function deletestockDetail($stockinNumber,$productCode)
    {
        $deleted = DB::delete("delete from stockinDetails where productCode ='$productCode' and stockinNumber='$stockinNumber'");
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
                return json_encode("Success");
            }else{
                throw new Exception("Error");
            }
        }
        catch(Exception $e)
        {
            return json_encode($e->getMessage());
        }
        
    }

    
    public function updateorder(Request $request){
        try
        {
            $data = DB::update("update orders set status = '$request->status', shippedDate = '$request->date' where orderNumber = '$request->orderNumber'");
            return json_encode("Success");
        }
        catch(Exception $e)
        {
            return json_encode($e->getMessage());
        }
    }

    public function saleorderdetail($id){
        $data = DB::select("select * from orderdetails where orderNumber = '$id'");
        
        return view('orderdetail', ['jsorder' => json_encode($data)], ['id' => $id]);
    }

    public function editComment(Request $request){
        DB::update("update orders set comments = '$request->comments' where orderNumber = '$request->orderNumber'");
    }

    public function editCommentstock(Request $request){
        DB::update("update stockinHeader set comments = '$request->comments' where stockNumber = '$request->stockNumber'");
    }

    public function saleorder(){
        $data = DB::select("select * from orders join customers using(customerNumber)");
        return json_encode($data);
    }

    public function saleorder_cust($id){
        $data = DB::select("select * from orders join customers using(customerNumber) where customerNumber = '$id'");
        return json_encode($data);
    }

    public function updatestock(Request $request){
        try
        {
            $data = DB::update("update stockinHeader set stockDate= '$request->date' where stockNumber = '$request->stockNumber'");
            $data = DB::update("update stockinDetails set quantityOrdered='$request->quantityOrdered' where stockinNumber='$request->stockNumber'");
        }
        catch(Exception $e)
        {
           echo $e->getMessage();
        }
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
            return json_encode("Success");
        }
        catch(Exception $e)
        {
            return json_encode($e->getMessage());
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
        DB::update("update customerAddress set delete_at = DATETIME('now') where mapNumber = '$map'");
    }

    public function newPayment(Request $request){
        try
        {
            DB::insert("insert into payments (customerNumber,checkNumber,paymentDate,amount) values ('$request->customerNo','$request->ChequeNumber','$request->Date','$request->Total')");
            return json_encode("Success");
        }
        catch(Exception $e)
        {
            return json_encode($e->getMessage());
        } 
    }

    
    
}