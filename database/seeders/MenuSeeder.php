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
            ['name' => 'ぽんぽこごはんとぶたのしょうがやきのハーフ弁当', 'price' => 750, 'kitchen_id' => 1, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973921/%E7%AC%91%E3%81%8C%EF%BC%AE%EF%BC%A9%EF%BC%A3%EF%BC%A5%E3%81%BD%E3%82%93%E3%81%BD%E3%81%93%E3%81%94%E3%81%AF%E3%82%93%E3%81%A8%E3%81%B6%E3%81%9F%E3%81%AE%E3%81%97%E3%82%87%E3%81%86%E3%81%8C%E3%82%84%E3%81%8D%E5%BC%81%E5%BD%93_afupgn.png'],
            ['name' => 'ぶたのごましおやき弁当', 'price' => 700, 'kitchen_id' => 1, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973921/%E7%AC%91%E3%81%8C%EF%BC%AE%EF%BC%A9%EF%BC%A3%EF%BC%A5%E3%81%BD%E3%82%93%E3%81%BD%E3%81%93%E3%81%9F%E3%81%AC%E3%81%8D%E3%81%A8%E3%81%94%E3%81%BE%E3%81%97%E3%81%8A%E3%82%84%E3%81%8D%E5%BC%81%E5%BD%93_e2amio.png'],
            ['name' => 'ととちゃんのからあげ弁当', 'price' => 680, 'kitchen_id' => 1, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973921/%E7%AC%91%E3%81%8C%EF%BC%AE%EF%BC%A9%EF%BC%A3%EF%BC%A5_%E3%83%88%E3%83%88%E3%81%A1%E3%82%83%E3%82%93%E3%81%AE%E5%94%90%E6%8F%9A%E3%81%92%E5%BC%81%E5%BD%93_ljyea0.png'],
            ['name' => 'サラダチキン弁当', 'price' => 650, 'kitchen_id' => 1],
            ['name' => 'ぶたのしょうがやき弁当', 'price' => 700, 'kitchen_id' => 1],

            // SMAPPYCAFE
            ['name' => '牛カルビ焼肉飯', 'price' => 780, 'kitchen_id' => 2, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973921/SMAPPY_CAFE_%E7%89%9B%E3%82%AB%E3%83%AB%E3%83%93%E7%84%BC%E8%82%89%E5%AE%9A%E9%A3%9F_p8fnbi.png'],
            ['name' => 'ビフチキ飯', 'price' => 780, 'kitchen_id' => 2, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973921/SMAPPY_CAFE_%E3%83%93%E3%83%95%E3%83%86%E3%82%AD%E4%B8%BC_savq69.png'],
            ['name' => 'ネギ牛カルビ焼肉飯', 'price' => 830, 'kitchen_id' => 2, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973921/SMAPPY_CAFE_%E3%83%8D%E3%82%AE%E7%89%9B%E3%82%AB%E3%83%AB%E3%83%93%E7%84%BC%E8%82%89%E5%AE%9A%E9%A3%9F_fqnhat.png'],
            ['name' => 'ネギビフチキ飯', 'price' => 830, 'kitchen_id' => 2, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973921/SMAPPY_CAFE_%E3%83%8D%E3%82%AE%E7%89%9B%E3%82%AB%E3%83%AB%E3%83%93%E7%84%BC%E8%82%89%E5%AE%9A%E9%A3%9F_fqnhat.png'],

            // CHERIE
            ['name' => 'ハイチ料理グリオ(揚げ豚肉)', 'price' => 850, 'kitchen_id' => 3, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705974729/CHERIE_%E3%82%B0%E3%83%AA%E3%82%AA_itb841.png'],
            ['name' => 'バジルチキン', 'price' => 850, 'kitchen_id' => 3, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705974696/CHERIE_%E3%83%88%E3%83%9E%E3%83%88%E3%81%A8%E6%9F%91%E6%A9%98%E9%A1%9E%E3%81%AE%E8%87%AA%E5%AE%B6%E8%A3%BD%E3%82%BD%E3%83%BC%E3%82%B9%E3%82%92%E3%81%8B%E3%82%89%E3%82%93%E3%81%A0_%E3%82%AB%E3%83%AA%E3%83%96%E9%A2%A8%E5%91%B3%E3%81%AE%E8%B5%A4%E9%AD%9A_2_tvowax.png'],
            ['name' => '赤魚トマトサワーソース', 'price' => 850, 'kitchen_id' => 3, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705974696/CHERIE_%E3%83%90%E3%82%B8%E3%83%AB%E3%81%A8%E6%9F%91%E6%A9%98%E9%A1%9E%E3%81%A7%E5%91%B3%E4%BB%98%E3%81%91%E3%81%97%E3%81%9F%E3%83%8F%E3%82%A4%E3%83%81%E3%81%AE%E5%AE%B6%E5%BA%AD%E6%96%99%E7%90%86_%E3%83%90%E3%82%B8%E3%83%AB%E3%83%81%E3%82%AD%E3%83%B3_2_vhfxvm.png'],

            // BONNIE&FRIED.tokyo
            ['name' => 'チーズバーガー', 'price' => 1000, 'kitchen_id' => 4, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973920/%E3%83%81%E3%83%BC%E3%82%BA%E3%83%90%E3%83%BC%E3%82%AC%E3%83%BC_w5kfhm.png'],
            ['name' => 'バーベキューソースバーガー', 'price' => 1000, 'kitchen_id' => 4, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973921/BBQ%E3%82%BD%E3%83%BC%E3%82%B9%E3%83%90%E3%83%BC%E3%82%AC%E3%83%BC_ua2vlh.png'],
            ['name' => 'テリヤキバーガー', 'price' => 1150, 'kitchen_id' => 4, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705974216/BONNIE_FRIED.TOKYO_ngmq4b.png'],
            ['name' => 'フレンチフリッター', 'price' => 450, 'kitchen_id' => 4, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973920/%E3%83%95%E3%83%AC%E3%83%B3%E3%83%81%E3%83%95%E3%83%AA%E3%83%83%E3%82%BF%E3%83%BC_jjgz0s.png'],
            ['name' => 'もちフリッター', 'price' => 300, 'kitchen_id' => 4, 'image_data' => 'https://res.cloudinary.com/dqaxgeag8/image/upload/v1705973920/%E3%81%8A%E3%82%82%E3%81%A1%E3%83%95%E3%83%AA%E3%83%83%E3%82%BF%E3%83%BC_hm12ht.png'],
        ];

        // メニューをデータベースに挿入
        foreach ($menus as $menu) {
            DB::table('menus')->insert($menu);
        }
    }
}
