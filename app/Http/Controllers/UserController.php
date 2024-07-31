<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(/*Request $request*/):View{

        $users= DB:: table (table: 'users')->get();
        //$books= Book::myideas($request->filtro)->TheBest($request->filtro)->get();//select * from
        return view('admin.users.user',['users'=>$users]);
    }
}
