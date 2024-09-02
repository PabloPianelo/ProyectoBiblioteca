<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
class BookController extends Controller
{


    private array $rules=[
             'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'nombre' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'tipo_libro' => 'required|string|max:255',
            'tipo_libro2' => 'nullable|string|max:255',
       ];



    public function index(Request $request):View{
        
        if ($request->is('client/Mybooks')) {
            $userId = auth()->id();
            $books = DB::table('books')
                ->join('book_user', 'books.id', '=', 'book_user.book_id')
                ->where('book_user.user_id', $userId)
                ->select('books.*')
                ->get();
    
            return view('client.books.Mybook', ['books' => $books]);
        } elseif ($request->is('client/books')) {
            $books = DB::table('books')->get();
            return view('client.books.book', ['books' => $books]);
        } else {
            $books = DB::table('books')->get();
            return view('admin.books.book', ['books' => $books]);
        }
    }


    public function create():View {
        return view('admin.books.book_create_or_edit');
    }

    
    public function store(Request $request):RedirectResponse {
        $validated = $request->validate($this->rules);


        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $destinationPath = 'images/book/';
            $filename = time() . '-' . $image->getClientOriginalName();
            
            // Mueve el archivo al directorio deseado
            $uploadSuccess = $image->move(public_path($destinationPath), $filename);
            
            // Verifica si la operación de movimiento fue exitosa
            if ($uploadSuccess) {
                $path = $destinationPath . $filename;
            } else {
                $path = null;
            }
        } else {
            $path = null;
        }

     
        $tipo_libro = $validated['tipo_libro'];
        if (!empty($validated['tipo_libro2'])) {
            $tipo_libro .= "," . $validated['tipo_libro2'];
        }


        Book::create([
         
            'nombre' => $validated['nombre'],
            'imagen' =>    $path, 
            'editorial' => $validated['editorial'],
            'autor' => $validated['autor'],
            'genero' => $validated['genero'],
            'cantidad' => $validated['cantidad'],
            'tipo_libro' => $tipo_libro
        ]);

        session()->flash('message', 'Libro creado correctamente!');

 
         return redirect()->route('admin.books.book');
     
    }

    public function edit($id):View {

        $book = Book:: findOrFail($id);

        return view('admin.books.book_create_or_edit', [
            'book' => $book,
        ]);
    }


    public function update(Request $request,  $id): RedirectResponse
    {
        $validated = $request->validate($this->rules);
        $book = Book::find($id);
        $path = $book->imagen;
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $destinationPath = 'images/book/';
            $filename = time() . '-' . $image->getClientOriginalName();
            $uploadSuccess = $image->move(public_path($destinationPath), $filename);
            if ($uploadSuccess) {
                // Elimina la imagen anterior si existe
                if ($book->imagen && file_exists(public_path($book->imagen))) {
                    unlink(public_path($book->imagen));
                }
                $path = $destinationPath . $filename;
            }
        }

        $tipo_libro = $validated['tipo_libro'];
        if (!empty($validated['tipo_libro2'])) {
            $tipo_libro .= "," . $validated['tipo_libro2'];
        }

        $book->update([
            'nombre' => $validated['nombre'],
            'imagen' => $path,
            'editorial' => $validated['editorial'],
            'autor' => $validated['autor'],
            'genero' => $validated['genero'],
            'cantidad' => $validated['cantidad'],
            'tipo_libro' => $tipo_libro,
        ]);
        session()->flash('message', 'Libro actualizado correctamente!');

        return redirect()->route('admin.books.book');
    }
    public function show(Request $request,$id):View {

        $book = Book:: findOrFail($id);
        if ($request->is('client/*')) {
        return view('client.books.book_show', [
            'book' => $book,
        ]);
    }else{
       
            return view('admin.books.book_show', [
                'book' => $book,
            ]);
    }
    }

    public function reserve(Book $book)
    {
        $user = auth()->user();
        $date = Carbon::now();
        $fechaFin_reserva = $date->addDays(15);
        // Verifica si el libro ya está reservado por el usuario
        if (!$book->users->contains($user->id)) {
            if ($book->cantidad > 0) {
                
                $book->cantidad--;
                $book->save();
            }
            $book->users()->attach($user->id, [
                'fecha_Reserva' => $date,
                'fecha_Fin_reserva' => $fechaFin_reserva
            ]);        }
    
        return redirect()->back()->with('message', 'Libro reservado con éxito');
    }
    
    public function delete($id): RedirectResponse
    {
        $book = Book::find($id);
    
        // Elimina la imagen asociada si existe
        if ($book->imagen && file_exists(public_path($book->imagen))) {
            unlink(public_path($book->imagen));
        }
    
        $book->delete();
    
        session()->flash('message', 'Libro eliminado correctamente!');
    
        return redirect()->route('admin.books.book');
    }
    


}
// public function updateDevolucion(Book $book): RedirectResponse
// {
//     $user = auth()->user();
//     $date = Carbon::now();

//     // Verifica si el libro está reservado por el usuario
//     if ($book->users->contains($user->id)) {
//         // Actualiza la fecha de devolución en la tabla pivote
//         $book->users()->updateExistingPivot($user->id, ['fecha_Devolucion_reserva' => $date]);
//     }

//     return redirect()->back()->with('message', 'Fecha de devolución actualizada a hoy');
// }