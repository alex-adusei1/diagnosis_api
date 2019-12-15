<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array(
            0 => array(
                'code' => 'A00',
                'title' => 'Cholera',
            ),

            1 => array(
                'code' => 'A01',
                'title' => 'Typhoid and paratyphoid fever',
            ),
            2 => array(
                'code' => 'A010',
                'title' => 'Typhoid fever',
            ),
            3 => array(
                'code' => 'A011',
                'title' => 'Paratyphoid fever A',
            ),
            4 => array(
                'code' => 'A012',
                'title' => 'Paratyphoid fever B',
            ),
            5 => array(
                'code' => 'A013',
                'title' => 'Paratyphoid fever C',
            ),
            6 => array(
                'code' => 'A014',
                'title' => 'Paratyphoid fever, unspecified',
            ),
            7 => array(
                'code' => 'A02',
                'title' => 'Other salmonella infection',
            ),
            8 => array(
                'code' => 'A022',
                'title' => 'Localized salmonella infections',
            ),
            9 => array(
                'code' => 'A028',
                'title' => 'Other specified salmonella infections',
            ),
        ));
    }
}
