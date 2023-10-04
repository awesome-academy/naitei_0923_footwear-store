<?php

namespace Tests\Unit\Model;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Tests\Unit\ModelTestCase as TestCase;

class ReviewTest extends TestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(new Review(), [], [], [], [], ['id' => 'int']);
    }

    public function testUserRelation()
    {
        $model = new Review();
        $relation = $model->user();

        $this->assertBelongsToRelation($relation, new Review(), new User(), 'user_id', 'id');
    }

    public function testProductRelation()
    {
        $model = new Review();
        $relation = $model->product();

        $this->assertBelongsToRelation($relation, new Review(), new Product(), 'product_id', 'id');
    }
}
