<?php

namespace App\Actions\Task;

use App\Datas\SampleData;
use App\Models\Sample;

class CreateSampleAction
{
    public function execute(SampleData $data): Sample
    {
        if (Sample::count() >= 10) {
            throw new \DomainException('Task limit reached');
        }

        return Sample::create($data->toArray());
    }
}
