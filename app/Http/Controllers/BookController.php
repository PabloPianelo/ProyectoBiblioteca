<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(/*Request $request*/):View{

        $books= DB:: table (table: 'books')->get();
        //$books= Book::myideas($request->filtro)->TheBest($request->filtro)->get();//select * from
        return view('admin.books.book',['books'=>$books]);
    }
}
