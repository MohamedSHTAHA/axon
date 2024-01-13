<?php

namespace App\Patterns\Services;

use App\Exceptions\GeneralException;
use App\Models\PhoneNumber;
use App\Patterns\Repositories\CountryRepository;
use App\Patterns\Repositories\CustomerRepository;
use App\Patterns\Repositories\PhoneNumberRepository;
use Carbon\Carbon;

/**
 * Class UserService
 *
 *
 */
class CustomerService extends BaseService
{

    function __construct(CustomerRepository $repository)
    {
        $this->repository  = $repository;
    }
    function index($request)
    {
        return  $this->repository
            ->scopeQuery(function ($query) {
                return $query->when(request()->has('state'), function ($q) {
                    return $q->filterByState(request('state'));
                })->when(request()->has('code'), function ($q) {
                    return $q->filterByCountryCode(request('code'));
                });
            })
            ->paginate();
    }

}
