<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cid = Category::all()->pluck('id');
        foreach ($cid as $c_id) {
            Item::factory()->create(['category_id' => $c_id]);
        }
    }
}
