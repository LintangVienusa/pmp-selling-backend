<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'item_name' => 'Kran Dapur type A',
                'item_group' => 'ONDA Kran',
                'description' => '',
                'price' => 35000,
                'stock' => 120,
                'photo_url' => '/images/items/kran-dapur-type-a.jpg'
            ],
            [
                'item_name' => 'Kran Dapur type B',
                'item_group' => 'ONDA Kran',
                'description' => '',
                'price' => 40000,
                'stock' => 100,
                'photo_url' => '/images/items/kran-dapur-type-b.jpg'
            ],
            [
                'item_name' => 'Kran Dapur type C',
                'item_group' => 'ONDA Kran',
                'description' => '',
                'price' => 45000,
                'stock' => 80,
                'photo_url' => '/images/items/kran-dapur-type-c.jpg'
            ],
            [
                'item_name' => 'Kran Dapur type D',
                'item_group' => 'ONDA Kran',
                'description' => '',
                'price' => 50000,
                'stock' => 60,
                'photo_url' => '/images/items/kran-dapur-type-d.jpg'
            ]
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
