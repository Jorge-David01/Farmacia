<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_proveedor'=> $this -> faker -> numberBetween($min = 1, $max = 100),
             'nombre_producto'=> $this -> faker->unique() -> numerify('Medicamento ###'),


            'principio_activo'=> $this-> faker -> randomElement([
                "Metildigoxina",
                "Fenitoina",
                "Litio",
                "Teofilina",
                "Warfarina",
                "Levotiroxina",
                "Acenocumaro",
                "Carbamazepina",
                "Talidomida",
                "Clozapina",
                "Pergolida",
                "Cabergolina",
                "Vigabatrina",
                "Sertindol",
                "Ibuprofeno",
                "Paracetamol",
                "Metamizol",
                "Amoxicilina",
                "Diclofenaco",
                "Fluoxetina",
                "Diazepam",
                "Lorazepam",
                "Clonazepam",
                "Tramadol",
                "Oxicodona",
                "Adolonta",
                "Zaldiar",
                "OxyContin",
            ]),

            'descripcion'=> $this -> faker ->text(50),

        ];
    }
}