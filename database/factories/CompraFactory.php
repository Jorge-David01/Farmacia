<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fecha_actual = date("Y-m-d");
        $minima = date('d-m-Y',strtotime($fecha_actual."+ 30 days"));
        $maxima = date("d-m-Y",strtotime($fecha_actual."+ 90 days"));

        return [
            'numero_factura'=> $this -> faker->unique() -> numerify('#####'),
            'fecha_pago'=> $this -> faker-> date($format='Y-m-d', $max= $maxima, $min= $minima),
            'id_proveedor'=> $this -> faker-> numberBetween($min = 1, $max = 100),
        ];
    }
}