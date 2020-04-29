<?php

namespace App\Http\Controllers;

use App\Country;
use App\Trip;
use Illuminate\Http\Request;
use DB;
use App\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries  = Country::all();
        $users = User::all();
        // $countries = DB::table('users')->distinct()->get(['country']);
        // $countries->map(function($country, $key){
        //     $users = User::where('country' ,$country->country)->get(['id' ,'name']);
            
        //     return $country->users = $users;

        // });
        // dd($countries);
        return view('home' ,['countries' => $countries , 'users' => $users]);
    }
    public function search()
    {
        $countries  = Country::all();
        $users = User::all();
        return view('search',['countries' => $countries , 'users' => $users]);
    }
    public function filter()
    {
        $trips = Trip::where('title','like', '%'.request()->keyword.'%')->get();
        $data  = view('results' , ['trips' => $trips])->render();
        return response()->json(['data' => $data]);
    }
}
