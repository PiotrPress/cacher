# Cacher

This library provides a simple file-based caching solution.

## Installation

```shell
$ composer require piotrpress/cacher
```

## Usage

```php
require __DIR__ . '/vendor/autoload.php';

use PiotrPress\Cacher;

$cache = new Cacher( '.cache' );

$value = $cache->get( 'key', function () {
    return 'value';
} );

$cache->clear( 'key' ); // clear cache for key
$cache->clear(); // clear all cache
```

**Note:** You can use `php://memory` as a file to store cache in memory, for instance, while developing or testing.

## Requirements

Supports PHP >= `8.0` version.

## License

[MIT](license.txt)