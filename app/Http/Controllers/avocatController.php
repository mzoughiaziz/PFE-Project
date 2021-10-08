<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class avocatController extends Controller
{
    public function index() {
        if(auth()->user()->role == 1) {
        $avocats = User::where('role' , 3)->get() ; 
        return view('avocat.index' , ["avocats" => $avocats ]);
        }elseif(auth()->user()->role == 2){
            $avocats = User::where('role' , 3)->where('agent_id',auth()->user()->id)->get() ; 
            return view('avocat.index' , ["avocats" => $avocats ]);
        }else{
            abort(403);
        }
    }

    public function store(request $req)
    {

        if(auth()->user()->role == 2) {
        $avocat = new User ; 
        $avocat->firstname = $req->firstname ;
        $avocat->lastname = $req->lastname ;
        $avocat->cin = $req->cin ;
        $avocat->identifient = $req->identifiant ;
        $avocat->password =  Hash::make($req->password);
        $avocat->phone = $req->phone ;
        $avocat->birthday = $req->birthday ;
        $avocat->role = 3 ;
        $avocat->gender = $req->gender ;
        $avocat->email = $req->email ;
        $avocat->adress = $req->adress ;
        $avocat->agent_id = auth()->user()->id ;
        $avocat->save();
        return back()->withStatus(__('avocat added successfully'));
        }
        else {
            abort(403);
        }

    }


    public function update(Request $req , $id){
        if(auth()->user()->role == 2) {

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
        if(auth()->user()->role == 2) {
        $avocat = User::where('id',$id)
        ->update(
            ['status' => 'inactive']);
        return back();
        }else{
            abort(403);
        }
    }

    public function restore($id){
        if(auth()->user()->role == 2) {
        $avocat = User::where('id',$id)
        ->update(
            ['status' => 'active']);
        return back();
        }else{
            abort(403);
        }
    }
}
