<?php

use Hareland\LaravelImmutableAttributes\Tests\ExampleImmutableModel;

const TEST_LABEL = 'Test';
const TEST_PRICE = 123.45;
const TEST_OTHER_LABEL = 'other-Test';
const TEST_INVALID_PRICE = 456.78;

it('cannot fill immutable attributes on update', function () {
    $model = new ExampleImmutableModel([
        'label' => TEST_LABEL,
        'price' => TEST_PRICE,
    ]);

    $model->save();
    expect($model->exists)->toBe(true);
    expect($model->label)->toBe(TEST_LABEL);
    expect($model->price)->toBe(TEST_PRICE);

    $model->label = TEST_OTHER_LABEL;
    $model->price = TEST_INVALID_PRICE;
    $model->save();

    //We expect the label to not be immutable, only the price.
    expect($model->label)->toBe(TEST_OTHER_LABEL);
    expect($model->price)->not()->toBe(TEST_INVALID_PRICE);
});