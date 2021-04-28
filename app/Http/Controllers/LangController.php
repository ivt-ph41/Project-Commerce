<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App;
class LangController extends Controller
{
    public function changeLanguage($language)
    {
        Session::put('language', $language );
        return redirect()->back();
    }
    public function autoSearch(Request $request){
        $datas = Product::select('name')->where('name','like','%'.$request->search.'%')->get();
        return response()->json($datas);
    }
}
