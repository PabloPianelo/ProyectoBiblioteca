<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{


    private array $rules=[
        'title'=>'required|string|max:100',
        'description'=>'required|string|max:300'
       ];



    public function index(/*Request $request*/):View{

        $books= DB:: table (table: 'books')->get();
        //$books= Book::myideas($request->filtro)->TheBest($request->filtro)->get();//select * from
        return view('admin.books.book',['books'=>$books]);
    }


    public function create():View {
        return view('admin.books.book_create_or_edit');
    }

    
    public function store(Request $request):RedirectResponse {
        $validated = $request->validate($this->rules);

      
        if ($request->hasFile('imagen')) {
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $validated['imagen'] = $imageName; // Guardar el nombre de la imagen en la base de datos
        }

        if (isset($validated['id'])) {
            $bookExists = DB::table('books')->where('id', $validated['id'])->exists();
        
            if ($bookExists) {
                return redirect()
                    ->route('admin.books.book_create_or_edit')
                    ->with('error', 'El libro con este ID ya existe.');
            }
        }

        Book::create([
            'id' => $validated['id'],
            'nombre' => $validated['nombre'],
            'imagen' => $validated['imagen'] ?? null, // Usar null si no hay imagen
            'editorial' => $validated['editorial'],
            'autor' => $validated['autor'],
            'genero' => $validated['genero'],
            'tipo_libro' => $validated['tipo_libro']
        ]);

       // session()->flash('message','Idea creada correctamente!');
 
         return redirect()->route('admin.books.book');
     
    }
}
