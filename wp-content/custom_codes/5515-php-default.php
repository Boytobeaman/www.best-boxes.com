<?php
add_action( 'rest_api_init', function()
{
    header( "Access-Control-Allow-Origin: *" );
} );

?>