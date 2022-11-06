<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleVentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
   

 
    
            $valor =$this -> faker-> numberBetween($min = 1, $max = 50000);
    
            return [
                'id_venta'=> $this -> faker-> numberBetween($min = 1, $max = 200),
                'id_producto'=> $this -> faker-> numberBetween($min = 1, $max = 200),
             
                'cantidad'=> $this -> faker-> numberBetween($min = 1, $max = 1000),
             
              
                'descuento'=>  $this -> faker-> numberBetween($min = 1, $max = 5),
                'precio'=> $this -> faker-> numberBetween($min = $valor, $max = 6000),
            //
        ];
    }
}

