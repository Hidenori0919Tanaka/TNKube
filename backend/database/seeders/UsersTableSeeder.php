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
            'mita' => '三田',
            'yaenn' => '野猿',
            'sagamioono' => '相模大野',
            'kameido' => '亀戸',
            'ikebukuro' => '池袋',
            'nisidai' => '西台',
            'kawagoe' => '川越',
            'sakuradai' => '桜台',
            'hibarigaoka' => 'ひばりヶ丘',
            'sendai' => '仙台'
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
