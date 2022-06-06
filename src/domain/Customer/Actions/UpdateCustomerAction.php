<?php

namespace Domain\Customer\Actions;

use App\Http\Resources\CustomerResource;
use Domain\Customer\Models\Customer;
use Exception;
use Illuminate\Support\Facades\DB;
use Domain\Customer\DataTransferObjects\CustomerFormData;

class UpdateCustomerAction
{
    /**
     * Store customer action.
     *
     * @param CustomerFormData $customerFormData
     *
     * @return CustomerResource
     *
     * @throws Exception
     */
    public function __invoke(CustomerFormData $customerFormData, Customer $customer): CustomerResource
    {
        try {
            DB::beginTransaction();

            $customer->update([
                'first_name' => $customerFormData->firstName,
                'last_name' => $customerFormData->lastName,
                'age' => $customerFormData->age,
                'dob' => $customerFormData->dob,
                'email' => $customerFormData->email,
            ]);

            DB::commit();

            return new CustomerResource($customer);
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
