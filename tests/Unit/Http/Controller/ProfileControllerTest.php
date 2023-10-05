<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\ProfileController;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Tests\TestCase as TestCase;
use Inertia\Response;
use Illuminate\Support\Facades\Hash;
use Mockery;

class ProfileControllerTest extends TestCase
{
    protected $controller;
    protected $userRepository;
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = Mockery::mock(UserRepositoryInterface::class)->makePartial();
        $this->controller = new ProfileController($this->userRepository);
        $this->user = User::factory()->create();
    }

    public function tearDown(): void
    {
        unset($this->controller);
        Mockery::close();
        parent::tearDown();
    }

    public function testEditFunction()
    {
        $request = new Request();

        $this->actingAs($this->user);
        $response = $this->controller->edit($request);

        $this->assertInstanceOf(View::class, $response);
    }

    public function testUpdateFunction()
    {
        $request = new ProfileUpdateRequest();

        $response = $this->actingAs($this->user)->json('POST', '/profile', [$request]);

        $response->assertStatus(405);
    }

    public function testDeleteFunction()
    {
        $request = new Request();

        $response = $this->actingAs($this->user)->json('DELETE', '/profile', [$request]);

        $response->assertStatus(500);
    }
}
