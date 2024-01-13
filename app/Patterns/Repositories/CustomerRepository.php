<?php

namespace App\Patterns\Repositories;

use App\Http\Resources\Customers\CustomerResource;
use App\Models\Customer;

/**
 * Class UserRepository.
 *
 * @package namespace App\Repositories;
 */
class CustomerRepository extends BaseRepository
{
    function __construct()
    {
        $this->makeModel();
        $this->skipPresenter(false);
        $this->setPresenter(CustomerResource::class);
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }
}
