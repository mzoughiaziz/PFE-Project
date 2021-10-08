<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\project;
use App\Models\User;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 1) {
            $projects = project::get();
        } else {
            $projects = project::where('created_by', auth()->user()->id)->get();
        }
        foreach ($projects as $project) {
            $project->user_name = User::where('id', $project->user_id)->value('firstname');
            $project->client_name = Client::where('id', $project->client_id)->value('firstname');
        }
        $users = User::where('agent_id', auth()->user()->id)->where('role',3)->get();
        $clients = client::where('agent_id', auth()->user()->id)->get();
        return view('project.index', ["projects" => $projects, "users" => $users, "clients" => $clients]);
    }


    public function store(request $req)
    {

        if (auth()->user()->role == 2) {
            $project = new project;
            $project->id = Str::uuid()->toString();
            $project->name = $req->name;
            $project->descreption = $req->descreption;
            $project->user_id = $req->user_id;
            $project->created_by = auth()->user()->id;
            $project->step = $req->step;
            $project->client_id = $req->client_id;
            $project->save();
            return back()->withStatus(__('Project added successfully'));
        } else {
            abort(403);
        }
    }


    public function update(Request $req, $id)
    {
        if (auth()->user()->role == 2) {

            $project = project::where('id', $id)
                ->update(
                    [
                        'name' => $req->name,
                        'step' => $req->step,
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
