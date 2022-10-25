<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_del_proveedor'=> $this -> faker -> name(),
            'nombre_del_distribuidor'=> $this -> faker -> name(),
            'telefono_del_proveedor'=> $this-> faker -> randomElement([2,3,8,9]).$this-> faker ->unique() -> numerify('#######'),
            'telefono_del_distribuidor' => $this-> faker -> randomElement([2,3,8,9]).$this-> faker ->unique() -> numerify('#######'),
            'correo_electronico'=> $this -> faker ->unique()-> email(),
        ];
    }
}
