<?php

namespace Tests\Feature;

use App\Models\Notebook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class NotebookTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_return_correct_data()
    {
        $response = $this->get('/api/v1/notebook');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [],
            'links' => [],
            'meta' => []
        ]);
    }

    public function test_a_notebook_can_be_stored()
    {
        $data = [
            'fio' => 'Ivanov Ivan Ivanovich',
            'company' => 'Company',
            'phone' => '+79999999999',
            'email' => 'example@test.com',
            'birth_date' => '2022-01-01',
            'photo' => 'https://via.placeholder.com/640x480.png/00dd77?text=qui'
        ];

        $response = $this->post('/api/v1/notebook', $data);

        $response->assertJson([
            'success' => true,
            'data' => $data
        ]);
        $this->assertDatabaseHas('notebooks', $data);
    }

    public function test_store_validation_works_correctly()
    {
        $data = [
            'company' => 'Company',
            'phone' => '+79999999999',
            'email' => 'example@test.com',
            'birth_date' => '2022-01-01',
        ];

        $response = $this->withHeaders(['Accept' => 'application/json'])->post('api/v1/notebook', $data);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'errors' => []
        ]);
    }

    public function test_show_method_returns_correct_data()
    {
        $response = $this->withHeaders(['Accept' => 'application/json'])->get('api/v1/notebook/1');

        $response->assertStatus(404);
        $response->assertJson([
            'success' => false
        ]);

        Notebook::factory()->create();

        $response = $this->get('api/v1/notebook/1');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => []
        ]);
    }

    public function test_a_notebook_can_be_updated()
    {
        Notebook::factory()->create();

        $data = [
            'fio' => 'Ivanov Ivan Ivanovich',
            'company' => 'Company',
            'phone' => '+79999999999',
            'email' => 'example@test.com',
            'birth_date' => '2022-01-01',
            'photo' => 'https://via.placeholder.com/640x480.png/00dd77?text=qui'
        ];

        $response = $this->post('api/v1/notebook/1', $data);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => $data
        ]);
        $this->assertDatabaseHas('notebooks', $data);
    }

    public function test_update_validation_works_correctly()
    {
        Notebook::factory()->create();

        $data = [
            'company' => 'Company',
            'phone' => '+79999999999',
            'email' => 'example@test.com',
            'birth_date' => '2022-01-01',
        ];

        $response = $this->withHeaders(['Accept' => 'application/json'])->post('api/v1/notebook/1', $data);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'errors' => []
        ]);
    }

    public function test_update_method_returns_error_when_notebook_is_not_found()
    {
        $response = $this->withHeaders(['Accept' => 'application/json'])->post('api/v1/notebook/9999');

        $response->assertStatus(404);
        $response->assertJson([
            'success' => false
        ]);
    }

    public function test_a_notebook_can_be_deleted()
    {
        $notebook = Notebook::factory()->create();

        $response = $this->delete("api/v1/notebook/{$notebook->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'notebook_id' => $notebook->id
        ]);
        $this->assertModelMissing($notebook);
    }

    public function test_destroy_method_returns_error_when_notebook_is_not_found()
    {
        $response = $this->withHeaders(['Accept' => 'application/json'])->delete('api/v1/notebook/9999');

        $response->assertStatus(404);
        $response->assertJson([
            'success' => false
        ]);
    }
}
