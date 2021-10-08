<?php

namespace App\Http\Controllers;


use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Psr\Http\Message\RequestInterface;

class ClientController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 1) {
            $clients = client::get();
        } elseif (auth()->user()->role == 2) {
            $clients = client::where('agent_id', auth()->user()->id)->get();
        } elseif (auth()->user()->role == 3) {
            $clients = client::where('agent_id', auth()->user()->user_agent)->get();
        }
        return view('clients.index', ["clients" => $clients]);
    }


    public function store(request $req)
    {

        if (auth()->user()->role == 2) {

            $client = new client;
            $client->id = Str::uuid()->toString();
            $client->firstname = $req->firstname;
            $client->lastname = $req->lastname;
            $client->cin = $req->cin;
            $client->passport = $req->passport;
            $client->marital_status = $req->marital_status;
            $client->gender = $req->gender;
            $client->bday = $req->bday;
            $client->email = $req->email;
            $client->job = $req->job;
            $client->adress = $req->adress;
            $client->agent_id = auth()->user()->id;
            $client->save();
            return back()->withStatus(__('Client added successfully'));
        } else {
            abort(403);
        }
    }


    public function update(Request $req, $id)
    {
        if (auth()->user()->role == 2) {
            $client = client::where('id', $id)
                ->update(
                    [
                        'firstname' => $req->firstname, 'lastname' => $req->lastname, 'email' => $req->email, 'cin' => $req->cin, 'phone' => $req->phone, 'job' => $req->job, 'passport' => $req->passport, 'marital_status' => $req->status, 'gender' => $req->gender, 'bday' => $req->bday, 'adress' => $req->adress
                    ]
                );

            return back();
        } else {
            abort(403);
        }
    }
}
