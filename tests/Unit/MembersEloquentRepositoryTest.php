<?php
declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\MembersEloquentRepository AS MembersRepository;

// use function PHPUnit\Framework\assertEquals;

class MembersEloquentRepositoryTest extends MembersRepositoryInterfaceTestBase
{
    // テストごとに Migration & Reset が実行される
    use RefreshDatabase;

    protected $repo;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed('MembersTableSeeder');

        $this->repo = new MembersRepository();
    }

    // protected function tearDown(): void
    // {
    //     Artisan::call('migrate:refresh');
    //     parent::tearDown();
    // }

    /** @test */
    public function test_all()
    {
        $results = $this->repo->all();
        $this->assertEquals(10, count($results));
        $this->assertCount(10, $results);   // 上と同じ
    }

}
