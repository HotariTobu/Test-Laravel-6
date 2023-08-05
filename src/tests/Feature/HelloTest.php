<?php

namespace Tests\Feature;

use App\Models\Person;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class HelloTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHello()
    {
        $this->assertTrue(true);

        $arr = [];
        $this->assertEmpty($arr);

        $msg = 'Hello';
        $this->assertEquals('Hello', $msg);

        $n = random_int(0, 99);
        $this->assertLessThan(100, $n);
    }

    // migrate database on memory for testing
    use RefreshDatabase;

    public function test_hello()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/test/auth');
        $response->assertStatus(302);

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/test/auth');
        $response->assertStatus(200);

        $response = $this->get('/no-route');
        $response->assertStatus(404);
    }

    public function test_database()
    {
        $values = [
            'name' => 'AAA',
            'email' => 'BBB@CCC.COM',
            'password' => 'ABCABC',
        ];

        $user = User::factory()->create($values);
        User::factory(10)->create();

        // $values['password'] = Hash::make($values['password']);
        unset($values['password']);

        $this->assertDatabaseHas('users', $values);

        $values = [
            'name' => 'XXX',
            'mail' => 'YYY@ZZZ.COM',
            'age' => 123,
        ];

        Person::factory()->create($values);
        Person::factory(10)->create();

        $this->assertDatabaseHas('people', $values);
    }
}
