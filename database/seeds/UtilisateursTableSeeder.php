<?php

use Illuminate\Database\Seeder;

class UtilisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i < 20 ; $i++)
        {   
                DB::table('utilisateurs')->insert([
            
                    'firstname' => str_random(10),
                    'lastname' => str_random(10),
                    'recrutment_date' => '2018-07-28',
                    'matricule' => str_random(10),
                    'entity_id' => 1,
                    'user_id' => 0

                ]);
                
                DB::table('utilisateurs')->insert([

                    'firstname' => str_random(10),
                    'lastname' => str_random(10),
                    'recrutment_date' => '2018-07-28',
                    'matricule' => str_random(10),
                    'entity_id' => 2,
                    'user_id' => 1

                ]);
        }

        DB::table('entities')->insert([

            'label' => 'DHJ',
        ]);
        
        DB::table('entities')->insert([

            'label' => 'DST',
        ]);
    }
}
