<?php namespace Tests\Repositories;

use App\Models\Second_Scaffolds;
use App\Repositories\Second_ScaffoldsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Second_ScaffoldsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Second_ScaffoldsRepository
     */
    protected $secondScaffoldsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->secondScaffoldsRepo = \App::make(Second_ScaffoldsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_second__scaffolds()
    {
        $secondScaffolds = Second_Scaffolds::factory()->make()->toArray();

        $createdSecond_Scaffolds = $this->secondScaffoldsRepo->create($secondScaffolds);

        $createdSecond_Scaffolds = $createdSecond_Scaffolds->toArray();
        $this->assertArrayHasKey('id', $createdSecond_Scaffolds);
        $this->assertNotNull($createdSecond_Scaffolds['id'], 'Created Second_Scaffolds must have id specified');
        $this->assertNotNull(Second_Scaffolds::find($createdSecond_Scaffolds['id']), 'Second_Scaffolds with given id must be in DB');
        $this->assertModelData($secondScaffolds, $createdSecond_Scaffolds);
    }

    /**
     * @test read
     */
    public function test_read_second__scaffolds()
    {
        $secondScaffolds = Second_Scaffolds::factory()->create();

        $dbSecond_Scaffolds = $this->secondScaffoldsRepo->find($secondScaffolds->id);

        $dbSecond_Scaffolds = $dbSecond_Scaffolds->toArray();
        $this->assertModelData($secondScaffolds->toArray(), $dbSecond_Scaffolds);
    }

    /**
     * @test update
     */
    public function test_update_second__scaffolds()
    {
        $secondScaffolds = Second_Scaffolds::factory()->create();
        $fakeSecond_Scaffolds = Second_Scaffolds::factory()->make()->toArray();

        $updatedSecond_Scaffolds = $this->secondScaffoldsRepo->update($fakeSecond_Scaffolds, $secondScaffolds->id);

        $this->assertModelData($fakeSecond_Scaffolds, $updatedSecond_Scaffolds->toArray());
        $dbSecond_Scaffolds = $this->secondScaffoldsRepo->find($secondScaffolds->id);
        $this->assertModelData($fakeSecond_Scaffolds, $dbSecond_Scaffolds->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_second__scaffolds()
    {
        $secondScaffolds = Second_Scaffolds::factory()->create();

        $resp = $this->secondScaffoldsRepo->delete($secondScaffolds->id);

        $this->assertTrue($resp);
        $this->assertNull(Second_Scaffolds::find($secondScaffolds->id), 'Second_Scaffolds should not exist in DB');
    }
}
