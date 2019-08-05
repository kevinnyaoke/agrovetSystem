<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
         
        for($i=1;$i<51;$i++){
            App\Stock::create([
                'item'=>'Product name',
                'quantity'=>'100',
                'bprice'=>'10000',
                'sprice'=>'15000',
                'date'=>$faker->date,
                'description'=>'High Quality Product',

            ]);
    }
}
}