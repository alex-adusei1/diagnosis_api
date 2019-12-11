<?php

use Illuminate\Database\Seeder;

class CodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('codes')->delete();

        \DB::table('codes')->insert(array(
            0 => array(
                'category_id' => 1,
                'diagnosis_code' => '0',
                'full_code' => 'A000',
                'abbreviated_description' => 'Cholera due to Vibrio cholerae 01, biovar cholerae',
                'full_description' => 'Cholera due to Vibrio cholerae 01, biovar cholerae',
            ),
            1 => array(
                'category_id' => 1,
                'diagnosis_code' => '1',
                'full_code' => 'A001',
                'abbreviated_description' => 'Cholera due to Vibrio cholerae 01, biovar eltor',
                'full_description' => 'Cholera due to Vibrio cholerae 01, biovar eltor',
            ),
            2 => array(
                'category_id' => 1,
                'diagnosis_code' => '9',
                'full_code' => 'A009',
                'abbreviated_description' => 'Cholera, unspecified',
                'full_description' => 'Cholera, unspecified',
            ),

            3 => array(
                'category_id' => 2,
                'diagnosis_code' => '0',
                'full_code' => 'A0100',
                'abbreviated_description' => 'Typhoid fever, unspecified',
                'full_description' => 'Typhoid fever, unspecified',
            ),

            4 => array(
                'category_id' => 2,
                'diagnosis_code' => '1',
                'full_code' => 'A0101',
                'abbreviated_description' => 'Typhoid meningitis',
                'full_description' => 'Typhoid meningitis',
            ),

            5 => array(
                'category_id' => 2,
                'diagnosis_code' => '2',
                'full_code' => 'A0102',
                'abbreviated_description' => 'Typhoid fever with heart involvement',
                'full_description' => 'Typhoid fever with heart involvement',
            ),
        ));
    }
}
