<?php

namespace Tests\Unit;


use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Route extends TestCase
{
  use RefreshDatabase;
protected function successfulRegistrationRoute()
{
    return $this->get('/administra');
}
protected function registerGetRoute()
{
    return route('register');
}
protected function registerPostRoute()
{
    return route('register');
}
protected function guestMiddlewareRoute()
{
    return route('administra');
}
public function testUserCanViewARegistrationForm()
{
    $response = $this->get($this->registerGetRoute());
    $response->assertSuccessful();
    $response->assertViewIs('auth.register');
}
public function testUserCannotViewARegistrationFormWhenAuthenticated()
{
    $user = factory(User::class)->make();
    $response = $this->actingAs($user)->get($this->registerGetRoute());
    $response->assertRedirect($this->guestMiddlewareRoute());
}
public function testUserCanRegister()
{
    Event::fake();
    $response = $this->post($this->registerPostRoute(), [
        'name' => 'oriol',
        'email' => 'oriolrg@gmail.com',
        'password' => '29051984',
        'password_confirmation' => '29051984',
    ]);
    $response->assertRedirect($this->successfulRegistrationRoute());
    $this->assertCount(1, $users = User::all());
    $this->assertAuthenticatedAs($user = $users->first());
    $this->assertEquals('oriol', $user->name);
    $this->assertEquals('oriolrg@gmail.com', $user->email);
    $this->assertTrue(Hash::check('29051984', $user->password));
    Event::assertDispatched(Registered::class, function ($e) use ($user) {
        return $e->user->id === $user->id;
    });
}
public function testUserCannotRegisterWithoutName()
{
    $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
        'name' => '',
        'email' => 'oriolrg@gmail.com',
        'password' => 'i-love-laravel',
        'password_confirmation' => 'i-love-laravel',
    ]);
    $users = User::all();
    $this->assertCount(0, $users);
    $response->assertRedirect($this->registerGetRoute());
    $response->assertSessionHasErrors('name');
    $this->assertTrue(session()->hasOldInput('email'));
    $this->assertFalse(session()->hasOldInput('password'));
    $this->assertGuest();
}
public function testUserCannotRegisterWithoutEmail()
{
    $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
        'name' => 'oriol',
        'email' => '',
        'password' => '29051984',
        'password_confirmation' => '29051984',
    ]);
    $users = User::all();
    $this->assertCount(0, $users);
    $response->assertRedirect($this->registerGetRoute());
    $response->assertSessionHasErrors('email');
    $this->assertTrue(session()->hasOldInput('name'));
    $this->assertFalse(session()->hasOldInput('password'));
    $this->assertGuest();
}
public function testUserCannotRegisterWithInvalidEmail()
{
    $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
        'name' => 'oriol',
        'email' => 'oriolrg',
        'password' => '29051984',
        'password_confirmation' => '29051984',
    ]);
    $users = User::all();
    $this->assertCount(0, $users);
    $response->assertRedirect($this->registerGetRoute());
    $response->assertSessionHasErrors('email');
    $this->assertTrue(session()->hasOldInput('name'));
    $this->assertTrue(session()->hasOldInput('email'));
    $this->assertFalse(session()->hasOldInput('password'));
    $this->assertGuest();
}
public function testUserCannotRegisterWithoutPassword()
{
    $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
        'name' => 'oriol',
        'email' => 'oriolrg@gmail.com',
        'password' => '',
        'password_confirmation' => '',
    ]);
    $users = User::all();
    $this->assertCount(0, $users);
    $response->assertRedirect($this->registerGetRoute());
    $response->assertSessionHasErrors('password');
    $this->assertTrue(session()->hasOldInput('name'));
    $this->assertTrue(session()->hasOldInput('email'));
    $this->assertFalse(session()->hasOldInput('password'));
    $this->assertGuest();
}
public function testUserCannotRegisterWithoutPasswordConfirmation()
{
    $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
        'name' => 'oriol',
        'email' => 'oriolrg@gmail.com',
        'password' => 'i-love-laravel',
        'password_confirmation' => '',
    ]);
    $users = User::all();
    $this->assertCount(0, $users);
    $response->assertRedirect($this->registerGetRoute());
    $response->assertSessionHasErrors('password');
    $this->assertTrue(session()->hasOldInput('name'));
    $this->assertTrue(session()->hasOldInput('email'));
    $this->assertFalse(session()->hasOldInput('password'));
    $this->assertGuest();
}
public function testUserCannotRegisterWithPasswordsNotMatching()
{
    $response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
        'name' => 'oriol',
        'email' => 'oriolrg@gmail.com',
        'password' => 'i-love-laravel',
        'password_confirmation' => 'i-love-symfony',
    ]);
    $users = User::all();
    $this->assertCount(0, $users);
    $response->assertRedirect($this->registerGetRoute());
    $response->assertSessionHasErrors('password');
    $this->assertTrue(session()->hasOldInput('name'));
    $this->assertTrue(session()->hasOldInput('email'));
    $this->assertFalse(session()->hasOldInput('password'));
    $this->assertGuest();
}

}
