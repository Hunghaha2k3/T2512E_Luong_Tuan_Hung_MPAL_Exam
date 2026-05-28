<?php

namespace Database\Seeders;

use App\Models\ItemSale;
use Illuminate\Database\Seeder;

class ItemSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemSale::truncate();

        $items = [
            [
                'item_code' => 'Coca',
                'item_name' => 'Coca cola',
                'quantity' => 100,
                'expried_date' => '2024-01-01',
                'note' => '',
            ],
            [
                'item_code' => 'Bim',
                'item_name' => 'Bim Bim',
                'quantity' => 100,
                'expried_date' => '2024-01-01',
                'note' => 'Discount',
            ],
            [
                'item_code' => 'Milk',
                'item_name' => 'Milk tea',
                'quantity' => 100,
                'expried_date' => '2024-01-01',
                'note' => '',
            ],
            [
                'item_code' => 'Cake',
                'item_name' => 'Sweet cake',
                'quantity' => 100,
                'expried_date' => '2024-01-01',
                'note' => 'Popular',
            ],
            [
                'item_code' => 'Noodl',
                'item_name' => 'Instant noodle',
                'quantity' => 100,
                'expried_date' => '2024-01-01',
                'note' => '',
            ],
        ];

        foreach ($items as $item) {
            ItemSale::create($item);
        }
    }
}
