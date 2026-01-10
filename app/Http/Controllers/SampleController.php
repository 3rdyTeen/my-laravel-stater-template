<?php

namespace App\Http\Controllers;

use App\Domain\Sample\Models\Sample;
use App\Domain\Sample\Services\AllSamplesService;
use App\Domain\Sample\Services\CreateSampleService;
use App\Domain\Sample\Services\DeleteSampleService;
use App\Domain\Sample\Services\UpdateSampleService;
use App\Http\Requests\StoreSampleRequest;
use App\Http\Requests\UpdateSampleRequest;
use App\Support\Helpers\ApiResponse;

class SampleController extends Controller
{
    public function index()
    {
        return ApiResponse::success('Hello World!!');
    }

    public function store(StoreSampleRequest $request, CreateSampleService $service)
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

    public function update(UpdateSampleRequest $request, UpdateSampleService $service, string $id)
    {
        $sample = $service->execute($id, $request->toDto());
        return ApiResponse::success('Successfull!!', $sample);
    }

    public function destroy(Sample $sample, DeleteSampleService $service)
    {
        $service->execute($sample);
        return ApiResponse::success('Successfull!!', null, 204);
    }
}
