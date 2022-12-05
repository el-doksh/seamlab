<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
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
                'name'  => 'Chicken',
                'price' => 90,
            ],
            [
                'name'  => 'Kofta',
                'price' => 70,
            ],
            [
                'name'  => 'Panne',
                'price' => 50,
            ]
        ];

        foreach ($items as $item) {
            MenuItem::updateOrCreate($item);
        }
    }
}
