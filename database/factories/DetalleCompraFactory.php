<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleCompraFactory extends Factory
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
        $maxima = date("d-m-Y",strtotime($fecha_actual."+ 5 year"));

        $valor =$this -> faker-> numberBetween($min = 1, $max = 50000);

        return [
            'id_compra'=> $this -> faker -> numberBetween($min = 1, $max = 100),
            'id_producto'=> $this -> faker-> numberBetween($min = 1, $max = 200),
            'laboratorio'=> $this -> faker -> numerify('Laboratorio #'),
            'cantidad'=> $this -> faker-> numberBetween($min = 1, $max = 10000),
            'lote'=> $this -> faker-> numberBetween($min = 1, $max = 100),
            'fecha_vencimiento'=> $this -> faker-> date($format='Y-m-d', $max= $maxima, $min= $minima),
            'precio_farmacia'=> $valor,
            'precio_publico'=> $this -> faker-> numberBetween($min = $valor, $max = 60000),
        ];
    }
}