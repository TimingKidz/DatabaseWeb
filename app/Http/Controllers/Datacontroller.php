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

    

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required'
    //     ]);

    //     $data = Data::create($request->all());

    //     return response()->json([
    //         'message' => 'Data Successfully Stored!',
    //         'data' => $data
    //     ]);
    // }

    // public function show(Request $request)
    // {
    //     $data = Data::where('id' , '=' , $request->id)->first();
    //     return response()->json([
    //         'message' => 'Fetching Data!',
    //         'data' => $data
    //     ]);
    // }

    // public function update(Request $request, Data $data)
    // {
    //     $request->validate([
    //         'title'       => 'nullable',
    //         'description' => 'nullable'
    //     ]);

    //     $data->update($request->all());

    //     return response()->json([	
    //         'message' => 'Great success! Task updated',
    //     ]);
    // }

    // public function destroy(Data $data)
    // {
    //     $data->delete();

    //     return response()->json([
    //         'message' => 'Data Successfully deleted!'
    //     ]);
    // }
}