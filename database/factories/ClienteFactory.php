<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
                'nombre_cliente'=> $this -> faker -> name(),
                'numero_id'=> $this -> faker -> unique()-> isbn13 (),
                'telefono'=> $this-> faker ->   unique() -> phoneNumber(),
                'direccion' => $this-> faker -> address() ,
                'num_carnet'=> $this -> faker ->unique()-> numerify('#########'),
        
            //
        ];
    }
}


