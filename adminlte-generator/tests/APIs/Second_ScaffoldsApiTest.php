<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Second_Scaffolds;

class Second_ScaffoldsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_second__scaffolds()
    {
        $secondScaffolds = Second_Scaffolds::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/second__scaffolds', $secondScaffolds
        );

        $this->assertApiResponse($secondScaffolds);
    }

    /**
     * @test
     */
    public function test_read_second__scaffolds()
    {
        $secondScaffolds = Second_Scaffolds::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/second__scaffolds/'.$secondScaffolds->id
        );

        $this->assertApiResponse($secondScaffolds->toArray());
    }

    /**
     * @test
     */
    public function test_update_second__scaffolds()
    {
        $secondScaffolds = Second_Scaffolds::factory()->create();
        $editedSecond_Scaffolds = Second_Scaffolds::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/second__scaffolds/'.$secondScaffolds->id,
            $editedSecond_Scaffolds
        );

        $this->assertApiResponse($editedSecond_Scaffolds);
    }

    /**
     * @test
     */
    public function test_delete_second__scaffolds()
    {
        $secondScaffolds = Second_Scaffolds::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/second__scaffolds/'.$secondScaffolds->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/second__scaffolds/'.$secondScaffolds->id
        );

        $this->response->assertStatus(404);
    }
}
