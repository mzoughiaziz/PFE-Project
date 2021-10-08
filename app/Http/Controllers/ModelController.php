<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function store(request $req)
    {
        if (auth()->user()->role != 3) {
            $content = $req->content;
            $modele = new Modele;
            $modele->name = $req->name;
            $modele->content = $req->content;
            $modele->agent_id = auth()->user()->id;
            $modele->save();
            return back();
        } else {
            abort(403);
        }
    }

    public function index()
    {
        if (auth()->user()->role == 1) {
            $models = modele::paginate(10);
            return view('models.index', ["models" => $models]);
        }
        if (auth()->user()->role == 2) {
            $models = modele::where('agent_id', auth()->user()->id)->paginate(10);
            return view('models.index', ["models" => $models]);
        } else {
            abort(403);
        }
    }

    public function update(Request $req, $id)
    {
            $model = Modele::where('id', $id)
                ->update(
                    [
                        'name' => $req->name,
                        'content' => $req->content                        
                    ]
                );
            return back();

    }
}
