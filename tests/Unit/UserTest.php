<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * Ensure new user can be created.
     *
     * @return void
     */
    public function testUserCreation()
    {
        $user = [
            'name' => 'Joe Smith',
            'email' => 'blackhole@cosst.co.uk',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post('/register', $user);

        $response->assertRedirect('/home');

        //Remove password and password_confirmation from array
        array_splice($user,2, 2);

        $this->assertDatabaseHas('users', $user);
    }
}
