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
        $jsproductlist = json_encode($data);
      
        
        return view('index',['jsproductlist' => $jsproductlist]);
    }

    public function indexem()
    {
        $data = DB::select('select * from products');
        $jsproductlist = json_encode($data);
        return view('indexem',['jsproductlist' => $jsproductlist]);
    }

    public function deletepro($type,$code)
    {
        $deleted = DB::select("delete from $type where productCode = '$code'");
        return redirect('/employees');
    }

    public function login(Request $request)
    {
        $data = DB::select("select * from employees where email like '$request->email' and employeeNumber = '$request->password'");
        if($data != null){
            $request->session()->put('status','1');
            $request->session()->put('email',$data[0]->email);
            $request->session()->put('name',$data[0]->firstName);
            return redirect('/employees');
            //return $data;
        }else{
            
            return redirect('/')->with('alert', 'Invalid username or password !!');
       }
       
        
    }

    public function logout(Request $request)
    {
        // session_start();
        // $data = DB::select("select * from employees where email like '$request->email' and employeeNumber = '$request->password'");
        // if($data != null){
        //     $data = DB::select('select * from products');
        //     $jsproductlist = json_encode($data);
        $request->session()->flush();
            //var_dump($request->session()->get('status'));
    //    }else{
        return redirect('/');
    //    }

        
    }

    
}