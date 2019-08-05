<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
class UpdatesTableSeeder extends Seeder
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
            App\Update::create([
                'date'=>$faker->date,
                'updates'=>'Agrovet new Updates',
            ]);
        }
    }
}
