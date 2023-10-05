<?php

namespace Tests\Unit\Model;

use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\User;
use Tests\Unit\ModelTestCase as TestCase;

class BillTest extends TestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Bill(),
            [],
            [],
            ['total', 'status'],
            [],
            ['id' => 'int', 'date' => 'datetime'],
        );
    }

    public function testUserRelation()
    {
        $model = new Bill();
        $relation = $model->user();

        $this->assertBelongsToRelation($relation, new Bill(), new User(), 'user_id', 'id');
    }

    public function testBillProductRelation()
    {
        $model = new Bill();
        $relation = $model->billProducts();

        $this->assertHasManyRelation($relation, new Bill(), new BillProduct(), 'bill_id', 'id');
    }
}
