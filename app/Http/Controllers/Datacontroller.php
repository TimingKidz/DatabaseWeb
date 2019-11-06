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
    public function stockin()
    {
        $data = DB::select('select * from products');
        $jsproductlist = json_encode($data);
        return view('stockin',['jsproductlist' => $jsproductlist]);
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

    
}