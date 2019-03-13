<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Revendication;
use App\Like;
use App\Dislike;
use Illuminate\Support\Facades\Auth;


class RevendicationController extends Controller
{
    public function create(Request $request){
        Revendication::create([
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);
        $revendications = Revendication::withCount('likes')->orderBy('likes_count', 'desc')->get();
        return redirect()->back()->with('revendications',$revendications);
    }


    public function like(Request $request){
        $like = Like::where('user_id',$request->user_id)->where('revendication_id',$request->revendication_id)->first();
        if($like != null){
            $like->delete();
            $response = array(
                'status' => 'removed',
            );
        }else{
            Like::create([
                'user_id'=> $request->user_id,
                'revendication_id' => $request->revendication_id
            ]);
            $response = array(
                'status' => 'added',
            );
        }
        return response()->json($response);
    }

    public function dislike(Request $request){
        $dislike = Dislike::where('user_id',$request->user_id)->where('revendication_id',$request->revendication_id)->first();
        if($dislike != null){
            $dislike->delete();
            $response = array(
                'status' => 'removed',
            );
        }else{
            Dislike::create([
                'user_id'=> $request->user_id,
                'revendication_id' => $request->revendication_id
            ]);
            $response = array(
                'status' => 'added',
            );
        }
        return response()->json($response);
    }
}
