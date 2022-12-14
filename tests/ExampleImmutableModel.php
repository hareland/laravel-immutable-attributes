<?php

namespace Hareland\LaravelImmutableAttributes\Tests;


use Hareland\LaravelImmutableAttributes\Traits\HasImmutableAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $label
 * @property float $price
 */
class ExampleImmutableModel extends Model
{
    use HasImmutableAttributes;

    protected $table = 'example_immutable_model';

    protected $fillable = [
        'label',
        'price',
    ];

    protected $immutable = [
        'price',
    ];

    protected $casts = [
        'price' => 'float',
    ];
}