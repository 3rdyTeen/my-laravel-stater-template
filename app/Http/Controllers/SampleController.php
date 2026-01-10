<?php

namespace App\Http\Controllers;

use App\Domain\Sample\Model\Sample;
use App\Domain\Sample\Services\AllSamplesService;
use App\Domain\Sample\Services\CreateSampleService;
use App\Domain\Sample\Services\DeleteSampleService;
use App\Domain\Sample\Services\UpdateSampleService;
use App\Http\Requests\StoreSampleRequest;
use App\Http\Requests\UpdateSampleRequest;

class SampleController extends Controller
{
    public function index()
    {
        return response('Hello World');
    }

    public function store(StoreSampleRequest $request, CreateSampleService $service)
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

    public function update(UpdateSampleRequest $request, UpdateSampleService $service, string $id)
    {
        $sample = $service->execute($id, $request->toDto());

        return response()->json($sample);
    }

    public function destroy(Sample $sample, DeleteSampleService $action)
    {
        $action->execute($sample);

        return response()->json(null, 204);
    }
}
