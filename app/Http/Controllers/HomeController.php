<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if(Auth::guest()) {
                return view('/pages.index');
            } else {
                if(Auth::user()->role_id == 1) {
                    return redirect('/pages/admin/');
                } else {
                    return view('/pages.index');
                }
            }
    }
    public function test($category) {
        return view('test')->with('category',$category);
    }
    public function showInp(Request $request) {
        echo 1;
        // dd($data);
    }
}
