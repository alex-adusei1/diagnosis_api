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
                'code' => 'A010',
                'title' => 'Typhoid fever',
            ),
        ));
    }
}
