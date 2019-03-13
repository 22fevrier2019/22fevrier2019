<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revendication;
use App\Like;
class MainController extends Controller
{
    public function index(){
        $revendications = Revendication::withCount('likes')->orderBy('likes_count', 'desc')->get();
        return view('main_ar')->with('revendications',$revendications);
    }


    public function indexFr(){
        $revendications = Revendication::withCount('likes')->orderBy('likes_count', 'desc')->get();
        return view('main_fr')->with('revendications',$revendications);
    }

    public function indexNewest(){
        return view('main_ar')->with('revendications',Revendication::orderBy('created_at','desc')->get());
    }

    public function indexFrNewest(){
        return view('main_fr')->with('revendications',Revendication::orderBy('created_at','desc')->get());
    }
}
