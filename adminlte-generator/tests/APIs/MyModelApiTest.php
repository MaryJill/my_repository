<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MyModel;

class MyModelApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_my_model()
    {
        $myModel = MyModel::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/my_models', $myModel
        );

        $this->assertApiResponse($myModel);
    }

    /**
     * @test
     */
    public function test_read_my_model()
    {
        $myModel = MyModel::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/my_models/'.$myModel->id
        );

        $this->assertApiResponse($myModel->toArray());
    }

    /**
     * @test
     */
    public function test_update_my_model()
    {
        $myModel = MyModel::factory()->create();
        $editedMyModel = MyModel::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/my_models/'.$myModel->id,
            $editedMyModel
        );

        $this->assertApiResponse($editedMyModel);
    }

    /**
     * @test
     */
    public function test_delete_my_model()
    {
        $myModel = MyModel::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/my_models/'.$myModel->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/my_models/'.$myModel->id
        );

        $this->response->assertStatus(404);
    }
}
