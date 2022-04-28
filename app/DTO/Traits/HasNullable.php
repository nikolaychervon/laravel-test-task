<?php

namespace App\DTO\Traits;

trait HasNullable
{
    /**
     * @return array
     */
    public function exceptNullable(): array
    {
        return array_diff($this->toArray(), [null]);
    }
}
