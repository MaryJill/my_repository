<?php namespace Tests\Repositories;

use App\Models\MyModel;
use App\Repositories\MyModelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MyModelRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MyModelRepository
     */
    protected $myModelRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->myModelRepo = \App::make(MyModelRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_my_model()
    {
        $myModel = MyModel::factory()->make()->toArray();

        $createdMyModel = $this->myModelRepo->create($myModel);

        $createdMyModel = $createdMyModel->toArray();
        $this->assertArrayHasKey('id', $createdMyModel);
        $this->assertNotNull($createdMyModel['id'], 'Created MyModel must have id specified');
        $this->assertNotNull(MyModel::find($createdMyModel['id']), 'MyModel with given id must be in DB');
        $this->assertModelData($myModel, $createdMyModel);
    }

    /**
     * @test read
     */
    public function test_read_my_model()
    {
        $myModel = MyModel::factory()->create();

        $dbMyModel = $this->myModelRepo->find($myModel->id);

        $dbMyModel = $dbMyModel->toArray();
        $this->assertModelData($myModel->toArray(), $dbMyModel);
    }

    /**
     * @test update
     */
    public function test_update_my_model()
    {
        $myModel = MyModel::factory()->create();
        $fakeMyModel = MyModel::factory()->make()->toArray();

        $updatedMyModel = $this->myModelRepo->update($fakeMyModel, $myModel->id);

        $this->assertModelData($fakeMyModel, $updatedMyModel->toArray());
        $dbMyModel = $this->myModelRepo->find($myModel->id);
        $this->assertModelData($fakeMyModel, $dbMyModel->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_my_model()
    {
        $myModel = MyModel::factory()->create();

        $resp = $this->myModelRepo->delete($myModel->id);

        $this->assertTrue($resp);
        $this->assertNull(MyModel::find($myModel->id), 'MyModel should not exist in DB');
    }
}
