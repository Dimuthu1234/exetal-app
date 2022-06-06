<?php

namespace Domain\Customer\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;
use Carbon\Carbon;
use Support\Casters\DateCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class CustomerFormData extends DataTransferObject
{
    /**
     * First name of the customer.
     *
     * @var string|null
     */
    public ?string $firstName;

    /**
     * Last name of the customer.
     *
     * @var string|null
     */
    public ?string $lastName;

    /**
     * Age of the customer.
     *
     * @var integer|null
     */
    public ?int $age;

    /**
     * Date of birth of the customer.
     *
     * @var Carbon|null
     */
    #[CastWith(DateCaster::class)]
    public ?Carbon $dob;

    /**
     * Email of the customer.
     *
     * @var string|null
     */
    public ?string $email;
}
