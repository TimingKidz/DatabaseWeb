<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    
    
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
        return view('products', ['jsproductlist' => $jsproductlist, 'jsvendor' => $jsvendor, 'jsscale' => $jsscale]);
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