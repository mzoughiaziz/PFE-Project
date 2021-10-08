<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(request $req)
    {
        $content = $req->content ;
        $document = new Document() ;
        $document->name = $req->name;
        $document->content = $req->content;
        $document->user_id = auth()->user()->id;
        $document->client_id = $req->client_id;
        $document->model_id = $req->model_id;
        $document->save();
        return view('show')->with(compact('content'));
    }

    public function index()
    {
        $documents = Document::where('user_id' , auth()->user()->id)->paginate(10);
        return view('documents.index' , ["documents" => $documents]);
    }
}
