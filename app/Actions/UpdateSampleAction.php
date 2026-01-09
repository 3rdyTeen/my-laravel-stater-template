<?php

namespace App\Actions\Sample;

use App\Datas\SampleData;
use App\Models\Sample;

class UpdateSampleAction
{
    public function execute(Sample $task, SampleData $data): Sample
    {
        $task->update($data->toArray());
        return $task;
    }
}

