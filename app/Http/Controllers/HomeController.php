<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\frais;
use App\Models\project;
use App\Models\recette;
use App\Models\User;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {


        if(auth()->user()->role ==1){
            $client = client::count();
            $recette = recette::sum('amount');
            $frais = frais::sum('amount');
            $associate = User::where('role' , 2)->count();
            $avocat = User::where('role' , 1)->count();
            $projet = project::count();
            $projet_month = project::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->count();
            $recette_month = recette::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->sum('amount');
            $client_month = client::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->count();
            $frais_month = frais::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->sum('amount');
            $associate_month = User::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->count();
            $avocat_month = User::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->count();

            $client_count_jul = client::where('created_at' , 'LIKE' , '2021-07-%')->count();
            $client_count_aug = client::where('created_at' , 'LIKE' , '2021-08-%')->count();
            $client_count_sep = client::where('created_at' , 'LIKE' , '2021-09-%')->count();
            $client_count_oct = client::where('created_at' , 'LIKE' , '2021-10-%')->count();
            $client_count_nov = client::where('created_at' , 'LIKE' , '2021-11-%')->count();
            $client_count_dec = client::where('created_at' , 'LIKE' , '2021-12-%')->count();


            $recette_sum_mai= recette::where('created_at' , 'LIKE' , '2021-05-%')->sum('amount');
            $recette_sum_jun= recette::where('created_at' , 'LIKE' , '2021-06-%')->sum('amount');
            $recette_sum_jul= recette::where('created_at' , 'LIKE' , '2021-07-%')->sum('amount');
            $recette_sum_aug= recette::where('created_at' , 'LIKE' , '2021-08-%')->sum('amount');
            $recette_sum_sep= recette::where('created_at' , 'LIKE' , '2021-09-%')->sum('amount');
            $recette_sum_oct= recette::where('created_at' , 'LIKE' , '2021-10-%')->sum('amount');
            $recette_sum_nov= recette::where('created_at' , 'LIKE' , '2021-11-%')->sum('amount');
            $recette_sum_dec= recette::where('created_at' , 'LIKE' , '2021-12-%')->sum('amount');
            //dd($client_count_oct);
            return view('dashboard' , ["client"=> $client , "recette" => $recette , "frais" => $frais , "associate" => $associate ,
            "avocat" => $avocat , "projet" => $projet , 'project_month' =>$projet_month , 'recette_month'=>$recette_month , 'client_month'=>$client_month , 'frais_month'=>$frais_month , 
            'associate_month'=>$associate_month , 'avocat_month'=>$avocat_month,
            "recette_sum_mai" => $recette_sum_mai, "recette_sum_jun" => $recette_sum_jun , "recette_sum_jul" => $recette_sum_jul ,
            "recette_sum_aug" => $recette_sum_aug , "recette_sum_sep" => $recette_sum_sep , "recette_sum_oct" => $recette_sum_oct , 
            "recette_sum_nov" => $recette_sum_nov , "recette_sum_dec" => $recette_sum_dec , "client_count_jul" =>$client_count_jul , 
            "client_count_aug" =>$client_count_aug , "client_count_sep" =>$client_count_sep , "client_count_oct" =>$client_count_oct , 
            "client_count_nov" =>$client_count_nov , "client_count_dec" =>$client_count_dec 
            ]);

        }else if(auth()->user()->role ==2){
            $client = client::where('agent_id',auth()->user()->id)->count();
            $recette = recette::where('user_id',auth()->user()->id)->sum('amount');
            $frais = frais::where('user_id',auth()->user()->id)->sum('amount');
            $avocat = User::where('role' , 1)->where('agent_id',auth()->user()->id)->count();
            $projet = project::where('created_by',auth()->user()->id)->count();

            $projet_month = project::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->where('created_by',auth()->user()->id)->count();
            $recette_month = recette::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->where('user_id',auth()->user()->id)->sum('amount');;
            $client_month = client::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->where('agent_id',auth()->user()->id)->count();
            $frais_month = frais::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->where('user_id',auth()->user()->id)->sum('amount');;
            $avocat_month = User::where('created_at' , 'LIKE' , Carbon::today()->format('Y-m'))->where('agent_id',auth()->user()->id)->count();

            $client_count_jul = client::where('agent_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-07-%')->count();
            $client_count_aug = client::where('agent_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-08-%')->count();
            $client_count_sep = client::where('agent_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-09-%')->count();
            $client_count_oct = client::where('agent_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-10-%')->count();
            $client_count_nov = client::where('agent_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-11-%')->count();
            $client_count_dec = client::where('agent_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-12-%')->count();


            $recette_sum_mai = recette::where('user_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-05-%')->sum('amount');
            $recette_sum_jun = recette::where('user_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-06-%')->sum('amount');
            $recette_sum_jul = recette::where('user_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-07-%')->sum('amount');
            $recette_sum_aug = recette::where('user_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-08-%')->sum('amount');
            $recette_sum_sep = recette::where('user_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-09-%')->sum('amount');
            $recette_sum_oct = recette::where('user_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-10-%')->sum('amount');
            $recette_sum_nov = recette::where('user_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-11-%')->sum('amount');
            $recette_sum_dec = recette::where('user_id',auth()->user()->id)->where('created_at' , 'LIKE' , '2021-12-%')->sum('amount');
            
            return view('dashboard' , ["client"=> $client , "recette" => $recette , "frais" => $frais , 
            "avocat" => $avocat , "projet" => $projet , 'project_month' =>$projet_month , 'recette_month'=>$recette_month , 'client_month'=>$client_month , 'frais_month'=>$frais_month , 
            'avocat_month'=>$avocat_month , "recette_sum_mai" => $recette_sum_mai, "recette_sum_jun" => $recette_sum_jun , "recette_sum_jul" => $recette_sum_jul ,
            "recette_sum_aug" => $recette_sum_aug , "recette_sum_sep" => $recette_sum_sep , "recette_sum_oct" => $recette_sum_oct , 
            "recette_sum_nov" => $recette_sum_nov , "recette_sum_dec" => $recette_sum_dec , "client_count_jul" =>$client_count_jul , 
            "client_count_aug" =>$client_count_aug , "client_count_sep" =>$client_count_sep , "client_count_oct" =>$client_count_oct , 
            "client_count_nov" =>$client_count_nov , "client_count_dec" =>$client_count_dec ]);
        }
        else if(auth()->user()->role ==3){
        return redirect('agenda');

        }
      

        
    }
}