<?php

namespace Tests\Unit\Model;

use Tests\Unit\ModelTestCase as TestCase;
use App\Models\Product;
use App\Models\ProductInStock;
use App\Models\ProductMedia;
use App\Models\Review;
use App\Models\User;

class ProductTest extends TestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(new Product(), [], [], ['deleted_at'], [], ['id' => 'int']);
    }

    public function testProductInStockRelation()
    {
        $model = new Product();
        $relation = $model->productInStocks();
        
        $this->assertHasManyRelation($relation, $model, new ProductInStock(), 'product_id', 'id');
    }

    public function testProductMediaRelation()
    {
        $model = new Product();
        $relation = $model->productMedias();

        $this->assertHasManyRelation($relation, $model, new ProductMedia(), 'product_id', 'id');
    }

    public function testReviewRelation()
    {
        $model = new Product();
        $relation = $model->reviews();

        $this->assertHasManyRelation($relation, $model, new Review(), 'product_id', 'id');
    }

    public function testUserRelation()
    {
        $model = new Product();
        $user = new User();
        $rel = $model->users();
        $foreign = 'favourite_list.product_id';
        $related = 'favourite_list.user_id';

        $this->assertBelongsToManyRelation($rel, $model, $user, $foreign, $related);
    }
}
