<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSampleRequest;
use App\Http\Requests\UpdateSampleRequest;
use App\Models\Sample;
use App\Services\AllSamplesService;
use App\Services\CreateSampleService;
use App\Services\DeleteSampleService;
use App\Services\UpdateSampleService;
use App\Support\Helpers\ApiResponse;

class SampleController extends Controller
{
    public function index()
    {
        return ApiResponse::success('Hello World!!');
    }

    public function store(StoreSampleRequest $request,  CreateSampleService $service)
    {
        $sample = $service->execute($request->toDto());
        return ApiResponse::success('Successfull!!', $sample);
    }

    public function show(Sample $sample)
    {
        return ApiResponse::success('Successfull!!', $sample);
    }

    public function list(AllSamplesService $service)
    {
        return ApiResponse::success('Successfull!!', $service->execute());
    }

    public function update(UpdateSampleRequest $request, Sample $sample, UpdateSampleService $service)
    {
        $sample = $service->execute($sample, $request->toDto());
        return ApiResponse::success('Successfull!!', $sample);
    }

    public function destroy(Sample $sample, DeleteSampleService $service)
    {
        $service->execute($sample);
        return ApiResponse::success('Successfull!!', null, 204);
    }
}
