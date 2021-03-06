<?php

if( !function_exists( 'glob_recursive' ) )
{
    /**
     * Find pathnames matching a pattern recursively
     *
     * @param $pattern
     * @param int $flags
     * @return array
     */
    function glob_recursive( $pattern, $flags = 0 )
    {
        $files = glob( $pattern, $flags );

        foreach( glob( dirname( $pattern ) . '/*', GLOB_ONLYDIR | GLOB_NOSORT ) as $dir )
        {
            $files = array_merge( $files, glob_recursive( $dir . '/' . basename( $pattern ), $flags ) );
        }

        return $files;
    }
}