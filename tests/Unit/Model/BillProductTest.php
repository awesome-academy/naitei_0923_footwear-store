<?php

namespace Tests\Unit\Model;

use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\ProductInStock;
use Tests\Unit\ModelTestCase as TestCase;

class BillProductTest extends TestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(new BillProduct(), [], [], ['price'], [], ['id' => 'int']);
    }

    public function testBillRelation()
    {
        $model = new BillProduct();
        $relation = $model->bill();

        $this->assertBelongsToRelation($relation, new BillProduct(), new Bill(), 'bill_id', 'id');
    }

    public function testProductInStockRelation()
    {
        $model = new BillProduct();
        $relation = $model->productInStock();

        $this->assertBelongsToRelation(
            $relation,
            new BillProduct(),
            new ProductInStock(),
            'product_in_stocks_id',
            'id'
        );
    }
}
