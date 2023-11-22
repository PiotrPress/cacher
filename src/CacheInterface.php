<?php declare( strict_types = 1 );

namespace PiotrPress;

interface CacheInterface {
    public function get( string $key, callable $callback, mixed ...$args ) : mixed;
    public function clear( string $key = null ) : bool;
}