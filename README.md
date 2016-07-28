# Yext for Laravel 5

[![Latest Stable Version](https://poser.pugx.org/kevinem/yext-laravel/v/stable?format=flat-square)](https://packagist.org/packages/kevinem/yext-laravel)
[![License](https://poser.pugx.org/kevinem/yext-laravel/license?format=flat-square)](https://packagist.org/packages/kevinem/yext-laravel)
[![Build Status](https://travis-ci.org/kevinem/yext-laravel.svg?branch=master)](https://travis-ci.org/kevinem/yext-laravel)

## Installation

To install, use composer:

```
composer require kevinem/yext-laravel
```

## Documentation

https://www.yext.com/support/reseller-api/

## Configuration

After installing the package, register the `KevinEm\YextLaravel\YextLaravelServiceProvider`
in your `config/app.php` configuration file:

```php
'providers' => [
    // Other service providers...

    KevinEm\YextLaravel\YextLaravelServiceProvider::class,
],

```
Also, you can add the `YextLaravel` facade to the `aliases` array in your `config/app.php` configuration file:

```php
'aliases' => [
    // Other facades...
    
    'Yext' => KevinEm\Facades\YextLaravel::class,
],
```

Publish the config using the following command:

```php
$ php artisan vendor:publish
```

## Example Usage

```php
Yext::administrative()->getCustomers();

Yext::administrative()->getCustomer('customer_id');
```

## License 

The MIT License (MIT)
Copyright (c) 2016 Kevin Em

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of
the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
IN THE SOFTWARE.
