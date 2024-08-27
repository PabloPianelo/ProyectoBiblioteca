<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'bibliotecario']);
        Role::firstOrCreate(['name' => 'cliente']);
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Role::where('name', 'admin')->delete();
        Role::where('name', 'bibliotecario')->delete();
        Role::where('name', 'cliente')->delete();
    }
};
