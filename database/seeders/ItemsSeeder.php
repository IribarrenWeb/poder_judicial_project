<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                "name" => 'Producto 1',
                "price" => 123.45,
                "tax" => 5
            ],
            [
                "name" => 'Producto 2',
                "price" => 45.65,
                "tax" => 15
            ],
            [
                "name" => 'Producto 3',
                "price" => 39.73,
                "tax" => 12
            ],
            [
                "name" => 'Producto 4',
                "price" => 250.00,
                "tax" => 8
            ],
            [
                "name" => 'Producto 5',
                "price" => 59.35,
                "tax" => 10
            ],
        ];

        foreach ($items as $item) {
            $i = Item::firstOrCreate(["name" => $item['name']],$item);
        }
    }
}
