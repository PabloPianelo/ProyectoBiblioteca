<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    private array $rules=[
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];
    public function index():View{

        $roles = ['cliente', 'bibliotecario']; // Lista de roles a filtrar
    $users = User::role($roles)->get();
        //$users= user::myideas($request->filtro)->TheBest($request->filtro)->get();//select * from
        return view('admin.users.user',['users'=>$users]);
    }

    public function create():View {
        return view('admin.users.user_create_or_edit');
    }

    public function store(Request $request):RedirectResponse {
       $validated = $request->validate($this->rules);


     

       $user= User::create([
         
            'name' => $validated['name'],
            'email' =>   $validated['email'],
            'password' => Hash::make($validated['password']),
         
        ]);
        if (Role::where('name', 'bibliotecario')->exists()) {
            $user->assignRole('bibliotecario');
        } else {
            // Manejar el caso donde el rol no existe
            abort(500, 'El rol bibliotecario no existe.');
        }
        session()->flash('message', 'Libro creado correctamente!');

 
         return redirect()->route('admin.users.user');
     
    }

    public function show($id):View {

        $user = user:: findOrFail($id);

        return view('admin.users.user_show', [
            'user' => $user,
        ]);
    }
    public function toggle($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->activo = !$user->activo;  // Cambia el estado de activo/inactivo
        $user->save();
    
        session()->flash('message', $user->activo ? 'Usuario activado correctamente!' : 'Usuario desactivado correctamente!');
    
        return redirect()->route('admin.users.user');
    }
    

    public function delete($id): RedirectResponse
    {
        $user = User::find($id);
    
        
        $user->delete();
    
        session()->flash('message', 'Usuario eliminado correctamente!');
    
        return redirect()->route('admin.users.user');
    }
}
