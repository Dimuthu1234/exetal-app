<?php


namespace Tests\App\Http\Controllers;

use App\Models\User;
use Domain\Customer\Actions\CreateCustomerAction;
use Domain\Customer\DataTransferObjects\CustomerFormData;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function can_store_temperature()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $this->mock(CreateCustomerAction::class)
            ->expects('__invoke')
            ->with(CustomerFormData::class);

        $response = $this->postJson(route('customer.store'), [
            'first_name' => 'Dimuthu',
            'last_name' => 'Jayalath',
            'age' => 30,
            'dob' => '1992-03-02',
            'email' => 'jayalathdimuthu@gmail.com',
        ]);

        $response->assertOk();
    }
}
