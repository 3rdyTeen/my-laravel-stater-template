<?php

namespace App\Actions\Sample;

use App\Models\Sample;

class DeleteSampleAction
{
    public function execute(Sample $task): void
    {
        $task->delete();
    }
}

