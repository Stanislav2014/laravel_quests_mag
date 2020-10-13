<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'quest_id' => 1,
            'event_date' => '2020-10-13 9:00',
            'user_name' => 'Муратшин Станислав',
            'user_email' => 's_admin@mail.ru',
            'user_phone' => '+79384609298',
            'status' => 'N', // N новое событие, P оплачено
        ]);

        DB::table('events')->insert([
            'quest_id' => 1,
            'event_date' => '2020-10-10 17:00',
            'user_name' => 'Муратшин Станислав',
            'user_email' => 's_admin@mail.ru',
            'user_phone' => '+79384609298',
            'status' => 'N', // N новое событие, P оплачено
        ]);

        DB::table('events')->insert([
            'quest_id' => 2,
            'event_date' => '2020-10-15 18:00',
            'user_name' => 'Муратшин Станислав',
            'user_email' => 's_admin@mail.ru',
            'user_phone' => '+79384609298',
            'status' => 'N', // N новое событие, P оплачено
        ]);
    }
}
