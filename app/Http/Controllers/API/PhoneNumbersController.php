<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneNumber\PhoneNumberRequest;
use App\Models\Customer;
use App\Patterns\Services\PhoneNumberService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhoneNumbersController extends Controller
{
    function __construct(PhoneNumberService $service)
    {
        $this->service  = $service;
    }
    function index(Request $request)
    {


        $conditions = collect(Customer::COUNTRIES)->pluck('regex')->map(function ($regexPattern) {
            return "REGEXP(phone, '{$regexPattern}')";
        })->implode(' OR ');
        dd(
            $conditions,
            'test',
            collect(Customer::COUNTRIES)->where('code', '+212')->first(),
            preg_match("/\(212\)\ ?[5-9]\d{8}$/", '(212) 654642448') === 1,
            preg_match('/\(+212\)/', '(212) 698055554317') === 1
        );

        $data = $this->service->index($request);
        return Response::apiResponse('success',  $data);
    }

    function store(PhoneNumberRequest $request)
    {
        $data = $this->service->create($request);
        return Response::apiResponse('success',  $data);
    }
}
