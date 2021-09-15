<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class AjaxCont extends Controller
{
    public function getdata(){
         $cus=customer::all();
       // $cus=customer::orderBy('id','Desc')->get();
      // $cus=customer::orderBy('created_at','asc')->get();
        return view ('AjaxCrud.Index',compact('cus'));
    }
    public function addCustomer(Request $request){
        $re=customer::create($request->all());
       if($re)
        return response()->json($re);
    }
   public function Updated(Request $request,$id){

    $re=customer::find($id);
    $re->Name=$request->input('Name');
    $re->FatherName=$request->input('FatherName');
    $re->Cnic=$request->input('Cnic');
    $re->Contact=$request->input('Contact');
    $re->Email=$request->input('Email');
    $g=$re->save();
    if($g)
    {
        return response()->json($re);
    }
   }
   public function DeleteRec($id){
    $re=customer::find($id)->delete();
    if($re){
        return response()->json(['Success'=>'Record has been Deleted']);
    }
   }
}
