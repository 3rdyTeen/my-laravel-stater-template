<?php

namespace App\DTOs;

class CreateSampleDTO
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
