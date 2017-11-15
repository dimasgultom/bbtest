<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages/task');
    }

    /*public function list(){
        return view('pages/list');
    }
*/
    public function game(){
        return view('pages/game');
    }
}
