<?php
declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\MembersEloquentRepository AS Members;

class MembersEloquentRepositoryTest extends MembersRepositoryInterfaceTestBase
{
    use RefreshDatabase;

    protected $Members;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed('MembersTableSeeder');

        $this->Members = new Members();
    }

    protected function tearDown(): void
    {
        Artisan::call('migrate:refresh');
        parent::tearDown();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
}
