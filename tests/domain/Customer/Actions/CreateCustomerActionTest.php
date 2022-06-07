<?php

namespace Tests\Domain\Customer\Actions;

use App\Models\User;
use Domain\Customer\Actions\CreateCustomerAction;
use Domain\Customer\DataTransferObjects\CustomerFormData;
use Domain\Customer\Models\Customer;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCustomerActionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test
     *
     * @throws UnknownProperties
     */
    public function it_can_temperature_content_successfully()
    {
        $customerData = new CustomerFormData(
            firstName: 'Dimuthu',
            lastName: 'Jayalath',
            age: 30,
            dob: '1992-03-02',
            email: 'jayalathdimuthu@gmail.com',
        );

        app(CreateCustomerAction::class)($customerData);

        $this->assertCount(1, Customer::all());
    }
}
