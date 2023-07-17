[![Build](https://github.com/hareland/laravel-immutable-attributes/actions/workflows/pest.yml/badge.svg)](https://github.com/hareland/laravel-immutable-attributes/actions/workflows/pest.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/hareland/laravel-immutable-attributes.svg?style=flat-square)](https://packagist.org/packages/hareland/laravel-immutable-attributes)

# Laravel Immutable Model Attributes

Create immutable attributes on your Laravel models. Simply use the trait.

## Installation

**Requirements**: PHP 8.1+ and Laravel 8+

```bash
composer require hareland/laravel-immutable-attributes
```


## Define Immutable Attributes

Define the attributes to be immutable on your model:

```php
<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Hareland\LaravelImmutableAttributes\Traits\HasImmutableAttributes;
 
class Product extends Model
{
    use HasImmutableAttributes;
    
    /**
     * @var array
     */
    protected $immutable = [
        'label',
        'price',
    ];
```

In this example, `label` and `price` can be set on model creation, however, the attributes will not persist changes of their value to a database on update.

```php
$model = new Product;
 
// Set the attribute 
$model->label = 'abc';
$model->label; // 'abc'
 
// Change it (before-saving)
$model->label = 'abc';
$model->label; // 'abc'
 
// Save it
$model->save();
 
// You can't change its value
$model->label = 'xyz';
$model->label; // 'abc'
 
// You can't update it either
$model->save([
    'label' => 'xyz',
]);
$model->label; // 'abc'
```

[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/hareland)
