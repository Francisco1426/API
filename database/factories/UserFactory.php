<?php


use App\cliente;
use App\producto;
use App\User;
use Illuminate\Support\Str;
//use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'apellido' => $faker->word,
        'email' => $faker->unique()->safeEmail,
        //bycrypt encripta la pass
        'password' => $password ?: $password = bcrypt('secret'),
//La libreria Str da el numero de caracteres que el usuario pondra para que sea verficado

        'remember_token' => Str::random(10),
        //definimos la verificaicon de cada modelo  factorys usa faker es una libreria para php que facilita el nombre de de datos falsos y generaremos datos falsos o aleatoreos
        'verified' => $verificado = $faker->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
        //generamos el token de verificacion esto se genera si el usuario esta o no verificado.
        'verification_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generarVerificationToken(),
        'admin' => $faker->randomElement([User::USUARIO_ADMINISTRADOR, User::USUARIO_REGULAR]),
        //verifica el tipo de usuario
    ];
});

$factory->define(cliente::class, function (Faker\Generator $faker) {
	static $password;
    return [
        'nombre' => $faker->word,
        'apellidos'=>$faker->word,
        'ubicacion'=>$faker->word,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'telefono'=> $faker-> numberBetween(123, 2734),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(producto::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->paragraph(1),
        'cantidad'=> $faker-> numberBetween(123, 2734),
        'costo'=>$faker-> numberBetween(123, 2734),
        'remember_token' => Str::random(10),

    ];
});