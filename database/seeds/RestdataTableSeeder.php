<?php

use Illuminate\Database\Seeder;
use App\Restdata;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            'message' => 'Google Japan',
            'url' => 'https://google.co.jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($params)->save();

        $params = [
            'message' => 'Yahoo Japan',
            'url' => 'https://yahoo.co.jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($params)->save();

        $params = [
            'message' => 'MSN Japan',
            'url' => 'https://msn.com/ja-jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($params)->save();
    }
}
