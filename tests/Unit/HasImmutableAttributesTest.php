<?php

use Hareland\Immutable\Tests\ExampleImmutableModel;

const TEST_LABEL = 'Test';
const TEST_PRICE = 123.45;
const TEST_INVALID_PRICE = 456.78;


test('can fill a new model', function () {
    $model = new ExampleImmutableModel([
        'label' => TEST_LABEL,
        'price' => TEST_PRICE,
    ]);

    $model->save();

    expect($model->exists)->toBe(true);

});

test('cannot fill immutable on update', function () {
    $model = new ExampleImmutableModel([
        'label' => TEST_LABEL,
        'price' => TEST_PRICE,
    ]);

    $model->save();
    expect($model->exists)->toBe(true);
    expect($model->label)->toBe(TEST_LABEL);
    expect($model->price)->toBe(TEST_PRICE);

    $model->price = TEST_INVALID_PRICE;
    $model->save();
    $model = $model->refresh();

    expect($model->price)->not()->toBe(TEST_INVALID_PRICE);
});