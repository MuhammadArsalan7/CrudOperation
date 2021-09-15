<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerCont extends Controller
{
    public function CreateCus(){
        return view('BasicCrud.AddUser');
    }
    public function Store(Request $request){
        $re=customer::create($request->all());
        if($re){
            return redirect()->back()->with('message','Message Successfully Inserted');
        }
    }
    public function GetData(){
        $re=customer::all();
        if($re)
        {
            return view('BasicCrud.Index')->with('UserDat',$re);
        }
    }
    public function Edit($id){
        $re=customer::find($id);
        if($re)
        {
            return view('BasicCrud.EditData')->with('dataa',$re);
        }
    }
    public function Update(Request $request,$id){
       $re= customer::where('id',$id)->update(['Name'=>$request->input('Name'),
        'FatherName'=>$request->input('FatherName'),
        'Cnic'=>$request->input('Cnic'),
        'Contact'=>$request->input('Contact'),
        'Email'=>$request->input('Email')
        ]);

        // $re=customer::find($id);
        // $re->Name=$request->input('Name');
        // $re->FatherName=$request->input('FatherName');
        // $re->Cnic=$request->input('Cnic');
        // $re->Contact=$request->input('Contact');
        // $re->Email=$request->input('Email');
        // $re->save();
        return redirect('Index')->with('message','done');
    }
    public function Delete($id){
       $re= customer::find($id)->delete();
        if($re)
        {
            return redirect('Index')->with('message','done');
        }

    }
}
