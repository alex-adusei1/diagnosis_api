<?php

namespace Tests\Feature;

use App\Models\Code;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CodeTest extends TestCase
{
    use DatabaseMigrations;

    private $code;

    public function setup()
    {
        parent::setup();
        Artisan::call('db:seed');
        $this->code = \factory(Code::class)->create();
    }

    public function test_add_code()
    {
        $params = [
            'category_id' => 1,
            'diagnosis_code' => '4',
            'full_code' => 'TestA0004',
            'abbreviated_description' => 'Testing data creation',
            'full_description' => 'Testing data creation',
        ];

        $this->json('POST', '/api/codes', $params)
            ->assertStatus(200)
            ->assertJson([
                'data' => ['full_code' => 'TestA0004'],
            ]);
    }

    public function test_update_code()
    {
        $params = [
            'category_id' => 1,
            'diagnosis_code' => '4',
            'full_code' => 'TestA0004',
            'abbreviated_description' => 'added successfully',
            'full_description' => 'added successfully',
        ];

        $this->json('PUT', '/api/codes/' . $this->code->id, $params)
            ->assertStatus(200)
            ->assertJson([
                'data' => ['full_description' => 'Added successfully'],
            ]);
    }

    public function test_get_paginated_code()
    {
        $limit = 20;
        $params = ['limit' => $limit, 'sort' => 'asc', 'contain' => 'category'];

        $this->insertRecords();
        $response = $this->json('GET', '/api/codes', $params);
        $response->assertStatus(200);
        $this->assertCount($limit, $response->getData(true)['data']);
    }

    public function test_get_by_id_code()
    {
        $count_items = 1;
        $response = $this->json('GET', '/api/codes/' . $this->code->id, ['contain' => 'category']);
        $response->assertStatus(200)
            ->assertJson([
                'data' => ['id' => $this->code->id],
            ]);
    }

    public function test_delete_code()
    {
        $this->json('DELETE', '/api/codes/' . $this->code->id)
            ->assertStatus(200);
    }

    private function insertRecords($numberOfInserts = 45)
    {
        for ($i = 0; $i < $numberOfInserts; $i++) {
            Code::Create([
                'category_id' => 1,
                'diagnosis_code' => '4 -' . $i,
                'full_code' => 'TestA0004 -' . $i,
                'abbreviated_description' => 'Testing data creation -' . $i,
                'full_description' => 'Testing data creation -' . $i,
            ]);
        }
    }
}
