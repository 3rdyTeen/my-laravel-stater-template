<?php

namespace App\Datas;

class SampleData
{
    public function __construct(
        public string $title,
        public ?string $description
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            $request->title,
            $request->description
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
