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
use Hareland\Immutable\Traits\HasImmutableAttributes;
 
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
