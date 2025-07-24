<?php

namespace Tests\Unit;
use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    use RefreshDatabase;

    public function test_products_page_is_displayed(): void
    {
        $product = Products::factory()->create();

        $response = $this
            ->actingAs($product)
            ->get('/products');

        $response->assertOk();
    }

    public function test_products_information_can_be_updated(): void
    {
        $product = Products::factory()->create();

        $response = $this
            ->actingAs($product)
            ->patch('/products', [
                'name' => 'iphone 11 black ',
                'detail' => 'iphone 11 in good condition neat uk used',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/products');

        $user->refresh();

        $this->assertSame('iphone 11 black ', $user->name);
        $this->assertSame('iphone 11 in good condition neat uk used', $user->detail);
      
    }

    // public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    // {
    //     $user = User::factory()->create();

    //     $response = $this
    //         ->actingAs($user)
    //         ->patch('/profile', [
    //             'name' => 'Test User',
    //             'email' => $user->email,
    //         ]);

    //     $response
    //         ->assertSessionHasNoErrors()
    //         ->assertRedirect('/profile');

    //     $this->assertNotNull($user->refresh()->email_verified_at);
    // }

    public function test_products_can_be_delete(): void
    {
        $product = Products::factory()->create();

        $response = $this
            ->actingAs($product)
            ->delete('/products');

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

      
        $this->assertNull($product->fresh());
    }

    // public function test_correct_password_must_be_provided_to_delete_account(): void
    // {
    //     $user = User::factory()->create();

    //     $response = $this
    //         ->actingAs($user)
    //         ->from('/profile')
    //         ->delete('/profile', [
    //             'password' => 'wrong-password',
    //         ]);

    //     $response
    //         ->assertSessionHasErrors('password')
    //         ->assertRedirect('/profile');

    //     $this->assertNotNull($user->fresh());
    // }
}
