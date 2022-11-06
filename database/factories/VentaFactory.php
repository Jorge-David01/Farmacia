<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'numero_factura'=> $this -> faker -> unique() -> numerify('#####')
            ,
            'id_cliente'=> $this -> faker -> numberBetween($min = 1, $max = 300)
            ,
            'pago'=> $this-> faker -> randomElement($array = array ("Efectivo","Tarjeta")),
   
            //
        ];
    }
}
