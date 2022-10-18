<?php

namespace Hareland\LaravelImmutableAttributes\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasImmutableAttributes
{
    public static function bootHasImmutableAttributes(): void
    {
        static::updating(
            fn(Model $model) => $model->resetImmutableAttributes($model),
        );
    }

    private function resetImmutableAttributes(Model $model): void
    {
        foreach ($this->getImmutableAttributes() as $attribute) {
            if (!is_null($model->getOriginal($attribute))
                && $model->getOriginal($attribute) !== $model->{$attribute}) {
                $model->{$attribute} = $model->getOriginal($attribute);
            }
        }
    }

    public function setAttribute($key, $value)
    {
        if ($this->exists && $this->hasImmutableAttribute($key)) {
            return $this;
        }

        return parent::setAttribute($key, $value);
    }

    private function getImmutableAttributes(): array
    {
        return $this->immutable ?? [];
    }

    private function hasImmutableAttribute($key): bool
    {
        return array_search($key, $this->getImmutableAttributes()) !== false;
    }
}