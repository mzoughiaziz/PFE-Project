<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\project;
use App\Models\recette;
use App\Models\User;
use Illuminate\Support\Str;



use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 1) {
            $recettes = recette::get();
        } else {
            $recettes = recette::where('user_id', auth()->user()->id)->get();
        }

        $clients = client::where('agent_id', auth()->user()->id)->get();
        $users = User::where('agent_id',  auth()->user()->id)->get();

        $projects = project::get();


        foreach ($recettes as $recette) {
            $recette->user_id = User::where('id', $recette->user_id)->value('firstname');
            $recette->project_id = project::where('id', $recette->project_id)->value('name');
        }
        return view('res_office.index', ["recettes" => $recettes, "clients" => $clients, "users" => $users, "projects" => $projects]);
    }


    public function store(request $req)
    {

        if (auth()->user()->role == 2) {

            $recette = new recette;
            $recette->id = Str::uuid()->toString();
            $recette->name = $req->name;
            $recette->client_id = $req->client_id;
            $recette->user_id = auth()->user()->id;
            $recette->amount = $req->amount;
            $recette->descreption = $req->descreption;

            $recette->save();
            return back()->withStatus(__('Recette added successfully'));
        } else {
            abort(403);
        }
    }


    public function update(Request $req, $id)
    {
        if (auth()->user()->role == 2) {

            $recette = recette::where('id', $id)
                ->update(
                    [
                        'name' => $req->name,
                        'amount' => $req->amount,
                        'client_id' => $req->client_id,
                        'user_id' => $req->user_id,
                        'descreption' => $req->descreption
                    ]
                );
            return back();
        } else {
            abort(403);
        }
    }
}
