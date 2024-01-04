<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // メニューのデータ
        $menus = [
            // 笑がNICE
            ['name' => 'ぽんぽこごはん(たぬきごはん)とぶたのしょうがやきのハーフ弁当', 'price' => 750, 'kitchen_id' => 1],
            ['name' => 'ぶたのごましおやき弁当', 'price' => 700, 'kitchen_id' => 1],
            ['name' => 'ととちゃんのからあげ弁当', 'price' => 680, 'kitchen_id' => 1],
            ['name' => 'サラダチキン弁当', 'price' => 650, 'kitchen_id' => 1],
            ['name' => 'ぶたのしょうがやき弁当', 'price' => 700, 'kitchen_id' => 1],

            // SMAPPYCAFE
            ['name' => '牛カルビ焼肉飯', 'price' => 780, 'kitchen_id' => 2],
            ['name' => 'ビフチキ飯', 'price' => 780, 'kitchen_id' => 2],
            ['name' => 'ネギ牛カルビ焼肉飯', 'price' => 830, 'kitchen_id' => 2],
            ['name' => 'ネギビフチキ飯', 'price' => 830, 'kitchen_id' => 2],

            // CHERIE
            ['name' => 'ハイチ料理グリオ(揚げ豚肉)', 'price' => 850, 'kitchen_id' => 3],
            ['name' => 'バジルチキン', 'price' => 850, 'kitchen_id' => 3],
            ['name' => '赤魚トマトサワーソース', 'price' => 850, 'kitchen_id' => 3],

            // BONNIE&FRIED.tokyo
            ['name' => 'チーズバーガー', 'price' => 1000, 'kitchen_id' => 4],
            ['name' => 'バーベキューソースバーガー', 'price' => 1000, 'kitchen_id' => 4],
            ['name' => 'テリヤキバーガー', 'price' => 1150, 'kitchen_id' => 4],
            ['name' => 'フレンチフリッター', 'price' => 450, 'kitchen_id' => 4],
            ['name' => 'もちフリッター', 'price' => 300, 'kitchen_id' => 4],
        ];

        // メニューをデータベースに挿入
        foreach ($menus as $menu) {
            DB::table('menus')->insert($menu);
        }
    }
}
