<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookSearchComponent  extends Component
{
    use WithPagination;

    public $search = ''; // Campo de búsqueda

    protected $updatesQueryString = ['search'];

    // Se resetea la página cuando el término de búsqueda cambia
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Filtrar los libros según el término de búsqueda
        $books = Book::query()
            ->when($this->search, function ($query) {
                return $query->where('nombre', 'LIKE', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.book-search', [
            'books' => $books,
        ]);
    }
}

