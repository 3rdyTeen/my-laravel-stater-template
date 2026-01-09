<?php

namespace App\Http\Controllers;

use App\Actions\Sample\DeleteSampleAction;
use App\Actions\Sample\UpdateSampleAction;
use App\Actions\Task\CreateSampleAction;
use App\Http\Requests\StoreSampleRequest;
use App\Http\Requests\UpdateSampleRequest;
use App\Models\Sample;

class SampleController extends Controller
{
    public function index()
    {
        return response()->json(Sample::latest()->get());
    }

    public function store(StoreSampleRequest $request, CreateSampleAction $action)
    {
        $sample = $action->execute($request->toDto());

        return response()->json($sample, 201);
    }

    public function show(Sample $sample)
    {
        return response()->json($sample);
    }

    public function update(UpdateSampleRequest $request, Sample $sample, UpdateSampleAction $action)
    {
        $sample = $action->execute($sample, $request->toDto());

        return response()->json($sample);
    }

    public function destroy(Sample $sample, DeleteSampleAction $action)
    {
        $action->execute($sample);

        return response()->json(null, 204);
    }
}
