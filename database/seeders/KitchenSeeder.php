<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KitchenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // キッチンの名前
        $kitchens = [
            ['name' => '笑がNICE', 'description' => null],
            ['name' => 'SMAPPYCAFE', 'description' => null],
            ['name' => 'CHERIE', 'description' => null],
            ['name' => 'BONNIE&FRIED.tokyo', 'description' => null],
        ];

        // データベースに挿入
        foreach ($kitchens as $kitchen) {
            DB::table('kitchens')->insert($kitchen);
        }
    }
}
