<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function testUserCreation()
    {

        $user = new User();
        $user->first_name = 'Edoardo';
        $user->last_name = 'Savini';

        $user->username = 'edoardo.savini';
        $user->password = Hash::make('Ciaone1998!!!');

        $user->save();

        $this->assertDatabaseHas('users', [
            'username' => 'edoardo.savini'
        ]);
    }

    public function testUserCreationMassive()
    {
        $user = factory(User::class)->make();
        $user->save();

        $this->assertDatabaseHas('users', [
            'username' => $user->username
        ]);

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testToString()
    {

        $user = factory(User::class)->make();
        $user->save();

        $user = User::all();
        $user = $user->first();

        /**
         * @var User $user
         */

        $this->assertTrue((string)$user === $user->first_name . ' ' . $user->last_name);
    }
}
