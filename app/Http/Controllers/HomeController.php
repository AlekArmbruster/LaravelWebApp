<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        return view('home');
    }


    // public function __invoke(){
    //     // $this->databaseInsert();
    //     // $this->databaseInsert();
    //     // $this->databaseUpdate();
    //     // $this->databaseDelete();
        
    //     return view('home');
    // }


    // public function databaseInsert(){
    //     $id = DB::table('users')->insertGetId
    //       ['email' => 'john@example.com', 
    //       'password' => 'pass123', 
    //       'firstName' => 'John', 
    //       'lastName' => 'Doe', 
    //       'company' => 'Vivify', 
    //       'contry' => 'United States']
    //     );

    // }

    // public function databaseUpdate() {
    //     DB::table('users')
    //         ->where('id', 1)
    //         ->update(['firstName' => 'Jack']);
    // }

    // public function databaseDelete() {
    //     DB::table('users')->truncate();
    // }


}