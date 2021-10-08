<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class associateController extends Controller
{
    public function index() {
        if(auth()->user()->role == 1 ) {
        $associates = User::where('role' , 2)->get() ; 
        return view('associate.index' , ["associates" => $associates ]);
        }else{
            abort(403);
        }
    }

    public function store(request $req)
    {

        if(auth()->user()->role == 1 ) {

        $associate = new User ; 
       
        $associate->firstname = $req->firstname ;
        $associate->lastname = $req->lastname ;
        $associate->cin = $req->cin ;
        $associate->identifient = $req->identifiant ;
        $associate->password =  Hash::make($req->password);
        $associate->phone = $req->phone ;
        $associate->birthday = $req->birthday ;
        $associate->role = 2 ;
        $associate->gender = $req->gender ;
        $associate->email = $req->email ;
        $associate->adress = $req->adress ;
        $associate->agent_id = auth()->user()->id ;
        $associate->save();
        return back()->withStatus(__('associate added successfully'));
        }
        else {
            abort(403);
        }

    }


    public function update(Request $req , $id){
        if(auth()->user()->role == 1 ) {

        $client = User::where('id',$id)
        ->update(
            ['firstname' => $req->firstname ,
            'lastname' => $req->lastname ,
            'cin' => $req->cin ,
            'identifient' => $req->identifiant ,
            'birthday' => $req->birthday ,
            'phone' => $req->phone ,
            'role' => 3 ,
            'gender' => $req->gender ,
            'email' => $req->email ,
            'adress' => $req->adress 
            ]);
        return back();
        }else{
            abort(403);
        }
    }


    public function delete($id){
        if(auth()->user()->role == 1 ) {
        $associate = User::where('id',$id)
        ->update(
            ['status' => 'inactive']);
        return back();
        }else{
            abort(403);
        }
    }

    public function restore($id){
        if(auth()->user()->role == 1 ) {
        $associate = User::where('id',$id)
        ->update(
            ['status' => 'active']);
        return back();
        }else{
            abort(403);
        }
    }
}
