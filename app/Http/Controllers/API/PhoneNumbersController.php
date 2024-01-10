<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneNumber\PhoneNumberRequest;
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

        $data = $this->service->index($request);
        return Response::apiResponse('success',  $data);
    }

    function store(PhoneNumberRequest $request)
    {
        $data = $this->service->create($request);
        return Response::apiResponse('success',  $data);
    }
}
