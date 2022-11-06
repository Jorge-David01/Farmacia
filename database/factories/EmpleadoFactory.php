<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_completo'=> $this -> faker -> name(),
            'numero_cel'=> $this -> faker -> unique() -> phoneNumber(),
            'numero_tel'=> $this-> faker ->   unique() -> e164PhoneNumber(),
            'DNI' => $this-> faker -> unique()-> isbn13 ()  ,
            'direccion'=> $this -> faker ->address(),
            'correo_electronico'=> $this -> faker ->unique()-> email(),
            //
        ];
    }
}
