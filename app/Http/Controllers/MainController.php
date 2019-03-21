<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revendication;
use App\Like;
use App\Category;
class MainController extends Controller
{


    public function index(){
        $revendications = Revendication::withCount('likes')->orderBy('likes_count', 'desc')->get();
        return view('main_ar')
                            ->with('revendications',$revendications)
                            ->with('categories',Category::all());
    }


    public function indexFr(){
        $revendications = Revendication::withCount('likes')->orderBy('likes_count', 'desc')->get();
        return view('main_fr')
                            ->with('revendications',$revendications)
                            ->with('categories',Category::all());
    }

    public function filter(Request $request){
        $revendications = null;
        if($request->order == 'newest'){
            if($request->category == 0){
                $revendications = Revendication::orderBy('created_at','desc')->get();
            }
            else{
                $revendications = Revendication::where('category_id',$request->category)->orderBy('created_at','desc')->get();
                if(count($revendications) <= 0){
                    return redirect('/');
                }
            }
            if($request->language == 'ar'){
                return view('main_ar')
                ->with('revendications',$revendications)
                ->with('categories',Category::all());
            }elseif($request->language == 'fr'){
                return view('main_fr')
                ->with('revendications',$revendications)
                ->with('categories',Category::all());
            }else{
                return redirect('/');
            }
        }
        elseif($request->order == 'popular'){
            if($request->category == 0){
                $revendications = Revendication::withCount('likes')->orderBy('likes_count', 'desc')->get();
            }else{
                $revendications = Revendication::where('category_id',$request->category)->withCount('likes')->orderBy('likes_count', 'desc')->get();
                if(count($revendications) <= 0){
                    return redirect('/');
                }
            }
            if($request->language == 'ar'){
                return view('main_ar')
                ->with('revendications',$revendications)
                ->with('categories',Category::all());
            }elseif($request->language == 'fr'){
                return view('main_fr')
                ->with('revendications',$revendications)
                ->with('categories',Category::all());
            }else{
                return redirect('/');
            }
        }else
        {
            if($request->language == 'ar'){
                return redirect('/ar');
            }elseif($request->language == 'fr'){
                return redirect('/fr');
            }else{
                return redirect('/');
            }
        }
    }
}
