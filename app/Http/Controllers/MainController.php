<?php

namespace App\Http\Controllers;

use App;
use App\Category;
use App\Revendication;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        $revendications = Revendication::withCount('likes')->orderBy('likes_count', 'desc')->get();
        $categories = Category::all();
        $local = App::getLocale();

        return view('main', compact('revendications', 'categories', 'local'));
    }

    public function filter(Request $request)
    {

        $categories = Category::all();
        $local = App::getLocale();
        $revendications = Revendication::ByOrder($request->order)->ByCategory($request->category)->get();

        return view('main', compact('revendications', 'categories', 'local'));

    }
}
