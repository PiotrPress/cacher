<?php declare( strict_types = 1 );

namespace PiotrPress;

class Cacher {
    public function __construct( protected string $file ) {}

    public function get( string $key, callable $callback ) {
        $data = $this->load();
        if ( isset( $data[ $key ] ) ) return $data[ $key ];

        $data[ $key ] = \call_user_func( $callback );
        $this->save( $data );
        return $data[ $key ];
    }

    public function clear( string $key = null ) : bool {
        if ( ! $key ) return @\unlink( $this->file );

        $data = $this->load();
        unset( $data[ $key ] );
        return $this->save( $data );
    }

    protected function load() : array {
        return \is_file( $this->file ) ? require( $this->file ) : [];
    }

    protected function save( array $data ) : bool {
        return (bool)@\file_put_contents( $this->file, \sprintf( '<?php return %s;', \var_export( $data, true ) ) );
    }
}