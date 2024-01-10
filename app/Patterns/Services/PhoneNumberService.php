<?php

namespace App\Patterns\Services;

use App\Exceptions\GeneralException;
use App\Models\PhoneNumber;
use App\Patterns\Repositories\CountryRepository;
use App\Patterns\Repositories\PhoneNumberRepository;
use Carbon\Carbon;

/**
 * Class UserService
 *
 *
 */
class PhoneNumberService extends BaseService
{

    function __construct(PhoneNumberRepository $repository, CountryRepository $countryRepository)
    {
        $this->repository  = $repository;
        $this->countryRepository  = $countryRepository;
    }
    function index($request)
    {
        return  $this->repository
            ->scopeQuery(function ($query) {
                return $query->when(request()->has('state'), function ($q) {
                    return $q->where('state', request('state'));
                })->when(request()->has('country_id'), function ($q) {
                    return $q->where('country_id', request('country_id'));
                });
            })
            ->with(['country'])->paginate();
    }


    function create($request)
    {

        $country = $this->countryRepository
            ->skipPresenter(true)
            ->findWhere(['code' => $request->code])->first();

        //TODO:Can be use DTO PATTERN
        $data['phone'] = $request->phone;
        $data['code'] = $request->code;
        $data['country_id'] = $country->id;
        $data['state'] = preg_match($country->regular_expression_pattern, $request->phone) === 1 ? PhoneNumber::STATE_OK : PhoneNumber::STATE_NOK;


        return  $this->repository->create($data);
    }
}
