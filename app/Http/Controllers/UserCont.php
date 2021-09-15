<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserCont extends Controller
{
    public function Createuser(){
        return view('UserForm');
    }
    public function Store(Request $request){
        $re=UserInfo::create($request->all());
        if($re){
            return redirect()->back()->with('message','Done');
        }
        else{
            return redirect()->back()->with('mess','Not Done');
        }
        return view();
    }
    public function Index(){
        $re=UserInfo::all();
        if($re){
            return view('UserData')->with('keey',$re);
        }
    }
    public function edit($id){
        $edi=UserInfo::find($id);
        return view('EditUser')->with('editUser',$edi);
    }
    public function update(Request $request,$id){
        $edi=UserInfo::find($id);
        $edi->uname=$request->input('uname');
        $edi->fname=$request->input('fname');
        $edi->cnic=$request->input('cnic');
        $edi->contact=$request->input('contact');
        $edi->email=$request->input('email');
        $edi->save();
        return redirect('indexx');
    }
    public function Delete($id){
        UserInfo::find($id)->delete();

        return redirect('indexx');
    }
}
