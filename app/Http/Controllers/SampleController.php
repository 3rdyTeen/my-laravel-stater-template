<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSampleRequest;
use App\Http\Requests\UpdateSampleRequest;
use App\Models\Sample;
use App\Services\AllSamplesService;
use App\Services\CreateSampleService;
use App\Services\DeleteSampleService;
use App\Services\UpdateSampleService;

class SampleController extends Controller
{
    public function index()
    {
        return response('Hello World');
    }

    public function store(StoreSampleRequest $request,  CreateSampleService $service)
    {
        $sample = $service->execute($request->toDto());

        return response()->json($sample, 201);
    }

    public function show(Sample $sample)
    {
        return response()->json($sample);
    }

    public function list(AllSamplesService $service)
    {
        return response()->json($service->execute());
    }

    public function update(UpdateSampleRequest $request, Sample $sample, UpdateSampleService $service)
    {
        $sample = $service->execute($sample, $request->toDto());

        return response()->json($sample);
    }

    public function destroy(Sample $sample, DeleteSampleService $service)
    {
        $service->execute($sample);

        return response()->json(null, 204);
    }
}
