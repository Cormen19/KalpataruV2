<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        \App\Models\Curso::factory()->create([
            'nombre'=>'DAW1',

        ]);
        \App\Models\Curso::factory()->create([
            'nombre'=>'DAW2',

        ]);
        \App\Models\Clase::factory()->create([
            'curso_id'=>'1',

        ]);
        \App\Models\MensajeEstado::factory()->create([
            'nombre'=>'Activo',

        ]);
        \App\Models\Role::factory()->create([
            'name'=>'usuario',
            'display_name'=>'us',
        ]);
        \App\Models\Role::factory()->create([
            'name'=>'admin',
            'display_name'=>'ad',
        ]);
        \App\Models\UsuarioEstado::factory()->create([
            'nombre'=>'Activo',

        ]);
        \App\Models\User::factory()->create([
            'role_id'=>'2',
            'name'=>'Ekaitz',
            'email'=>'ekacormen@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('zzzzzzzz'),
            'curso_id'=>'1',
            'remember_token' => Str::random(10),

        ]);
        \App\Models\User::factory()->create([
            'role_id'=>'1',
            'name'=>'Cormen',
            'email'=>'cormen@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('zzzzzzzz'),
            'curso_id'=>'1',
            'remember_token' => Str::random(10),

        ]);
        \App\Models\Mensaje::factory()->create([
            'titulo'=>'Mensaje1',
            'texto'=>'Este es el primer mensaje',

            'usuario_id'=>'1',
            'clase_id'=>'1',
            'estado_id'=>'1',

        ]);

    }
}
