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
            ['name' => '笑がNICE',
            'description' => null,
            'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1704434805/ShougaNice.jpg'],
            ['name' => 'SMAPPYCAFE',
            'description' => null,
            'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1704434818/SmappyCafe.jpg'],
            ['name' => 'CHERIE',
            'description' => null,
            'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1704434565/HaitiCherie.jpg'],
            ['name' => 'BONNIE&FRIED.tokyo',
            'description' => null,
            'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1704434797/BonieFriedTokyo.jpg'],
        ];

        // データベースに挿入
        foreach ($kitchens as $kitchen) {
            DB::table('kitchens')->insert($kitchen);
        }
    }
}
