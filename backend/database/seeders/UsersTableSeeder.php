<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'jiro' => 'jiro',
            'yaenn' => '野猿',
            'sagamioono' => '相模大野',
            'kameido' => '亀戸',
            'Fuzimaru' => '富士丸',
            'nisidai' => '西台',
            'sendai' => '仙台',
            'makonari' => 'makonari',
            'daigo' => 'daigo',
            'suit' => 'suit',
            'trip' => 'trip',
            'hogeNull' => 'hogeNull',
            'hoge' => 'hoge',
            'TNK_Hidy' => 'tnk',
            'study' => 'study',
            'test' => 'test'
        ];

        foreach ($names as $name_en => $name_jp) {

            User::create([
                'name' => $name_jp,
                'email' => $name_en .'@example.com',
                'password' => bcrypt('hogehoge')
            ]);

        }
    }
}
