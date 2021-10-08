<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\frais;
use App\Models\User;
use Illuminate\Support\Str;



use Illuminate\Http\Request;

class FraisController extends Controller
{

    public function index()
    {
        if (auth()->user()->role == 2) {
            $frais = frais::where('user_id', auth()->user()->id)->get();
            $users = User::where('agent_id', auth()->user()->id)->get();
            foreach ($frais as $frai) {
                if ($frai->user_id != 'Others') {
                    $frai->user_name = User::where('id', $frai->user_id)->value('firstname');
                } else {
                    $frai->user_name = "Others";
                }
            }
            return view('frais_office.index', ["frais" => $frais, "users" => $users]);

        }elseif(auth()->user()->role == 1) {
            $frais = frais::get();
            $users = User::get();
            foreach ($frais as $frai) {
                if ($frai->user_id != 'Others') {
                    $frai->user_name = User::where('id', $frai->user_id)->value('firstname');
                } else {
                    $frai->user_name = "Others";
                }
            }
            return view('frais_office.index', ["frais" => $frais, "users" => $users]);

        }
         else {
            abort(403);
        }
    }


    public function store(request $req)
    {

        if (auth()->user()->role == 2) {
            $frais = new frais;
            $frais->id = Str::uuid()->toString();
            $frais->name = $req->name;
            $frais->amount = $req->amount;
            $frais->type = $req->type;
            $frais->user_id = auth()->user()->id;
            $frais->descreption = $req->descreption;
            $frais->save();
            return back()->withStatus(__('frais added successfully'));
        } else {
            abort(403);
        }
    }

    public function update(Request $req, $id)
    {
        if (auth()->user()->role == 2) {

        $frais = frais::where('id', $id)
            ->update(
                [
                    'name' => $req->name,
                    'amount' => $req->amount,
                    'user_id' => $req->user_id,
                    'type' => $req->type,
                    'descreption' => $req->descreption
                ]
            );
        return back();
        }else{
            abort(403);
        }
    }
}
