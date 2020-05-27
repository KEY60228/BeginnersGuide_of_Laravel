<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            'name' => 'kenta',
            'mail' => 'kenta@com',
            'age' => '25',
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'pori',
            'mail' => 'pori@com',
            'age' => '25',
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'FUJI',
            'mail' => 'FUJI@com',
            'age' => '26',
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'anesan',
            'mail' => 'anesan@com',
            'age' => '28',
        ];
        DB::table('people')->insert($params);
    }
}
