<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quests')->insert([
            'name' => 'Гарри и последний крестраж',
            'img' => base_path() . '/database/seeders/images/1.jpeg',
        ]);
        DB::table('quests')->insert([
            'name' => 'Иллюзия обмана',
            'img' => base_path() . '/database/seeders/images/2.jpeg',
        ]);
        DB::table('quests')->insert([
            'name' => 'Игры Престолов',
            'img' => base_path() . '/database/seeders/images/3.jpeg',
        ]);
        //
    }
}
