<?php

declare(strict_types=1);

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

// ファイル名・クラス名の末尾を Test にしてしまうと、php artisan test に拾われてしまい、具象クラスのないInterface自体がテスト対象となってしまうので、末尾を TestBase にした
class MembersRepositoryInterfaceTestBase extends TestCase {
    /**
     * @test
     * @group DataAccess
     * @group Members
     * @group all
     */
    public function all_返り値は配列であること() {
        $this->assertTrue(is_array($this->repo->all()));
    }

    /**
     * @test
     * @group DataAccess
     * @group Members
     * @group all
     */
    public function all_必要なフィールドが取得されている事() {
        $data = $this->repo->all();

        $expected = [
            'id', 'name', 'created_at', 'updated_at'
        ];

        $this->assertSame($expected, array_keys($data[0]));
    }

    /**
     * @test
     * @group DataAccess
     * @group Members
     * @group get
     */
    public function get_返り値は配列であること() {
        $this->assertTrue(is_array($this->repo->get(1)));
    }

    /**
     * @test
     * @group DataAccess
     * @group Members
     * @group get
     */
    public function get_必要なフィールドが取得されている事() {
        $data = $this->repo->get(1);

        $expected = [
            'id', 'name', 'created_at', 'updated_at'
        ];

        $this->assertEquals($expected, array_keys($data));
    }

    /**
     * @test
     * @group DataAccess
     * @group Members
     * @group insert
     */
    public function insert_登録処理が成功する事を検証() {
        $name = 'member_011';

        $this->repo->insert($name);

        $this->assertDatabaseHas('members', [
            'name' => $name
        ]);
    }

    /**
     * @test
     * @expectedException \Exception
     * @group DataAccess
     * @group Members
     * @group insert
     */
    public function insert_空文字が渡ってきた場合には例外を投げる事() {
        // ※例外は飛ばない
        $this->repo->insert('');
    }

    /**
     * @test
     * @group DataAccess
     * @group Members
     * @group update
     */
    public function update_更新処理が成功する事を検証() {
        $id = 1;
        $name = 'MEMBER_1';

        $this->repo->update($id, $name);

        $this->assertDatabaseHas('members', [
            'id' => $id,
            'name' => $name
        ]);
    }

    /**
     * @test
     * @expectedException \Exception
     * @group DataAccess
     * @group Members
     * @group update
     */
    public function update_空文字が渡ってきた場合には例外を投げる事() {
        // ※例外は飛ばない
        $this->repo->update(1, '');
    }

    /**
     * @test
     * @group DataAccess
     * @group Members
     * @group delete
     */
    public function delete_削除処理が成功する事を検証() {
        $id = 1;

        $this->repo->delete($id);

        $this->assertDatabaseMissing('members', [
            'id' => $id
        ]);
    }
}
