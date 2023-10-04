<?php

namespace Tests\Unit\Model;

use Tests\Unit\ModelTestCase as TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\Review;
use App\Models\Product;
use App\Models\Bill;
use App\Models\CartDetail;

class UserTest extends TestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(new User(), [], [
            'password',
            'remember_token'
        ], ['is_active'], [], [
            'email_verified_at' => 'datetime',
            'id' => 'int',
        ]);
    }

    public function testFirstNameAccessor()
    {
        $model = new User();
        $model->setRawAttributes([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        $this->assertEquals('John Doe', $model->getAttributeValue('full_name'));
    }

    public function testUsernameMutator()
    {
        $model = new User;
        $username = 'new_username';
        $model->username = $username;

        $this->assertNotEquals($username, $model->getAttribute('username'));
    }

    public function testRoleRelation()
    {
        $model = new User();
        $relation = $model->roles();

        $this->assertBelongsToManyRelation($relation, $model, new Role(), 'user_role.user_id', 'user_role.role_id');
    }
    
    public function testReviewRelation()
    {
        $model = new User();
        $relation = $model->reviews();

        $this->assertHasManyRelation($relation, $model, new Review(), 'user_id', 'id');
    }

    public function testProductRelation()
    {
        $model = new User();
        $product = new Product();
        $relation = $model->products();
        $foreign = 'favourite_list.user_id';
        $related = 'favourite_list.product_id';

        $this->assertBelongsToManyRelation($relation, $model, $product, $foreign, $related);
    }

    public function testBillRelation()
    {
        $model = new User();
        $relation = $model->bills();

        $this->assertHasManyRelation($relation, $model, new Bill(), 'user_id', 'id');
    }

    public function testCartDetailRelation()
    {
        $model = new User();
        $relation = $model->cartDetails();

        $this->assertHasManyRelation($relation, $model, new CartDetail(), 'user_id', 'id');
    }
}
