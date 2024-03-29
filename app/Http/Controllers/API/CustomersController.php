<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Patterns\Services\CustomerService;
use App\Patterns\Services\PhoneNumberService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomersController extends Controller
{
    function __construct(CustomerService $service)
    {
        $this->service  = $service;
    }
    function index(Request $request)
    {

        $data = $this->service->index($request);
        return Response::apiResponse('success',  $data);
    }

}
