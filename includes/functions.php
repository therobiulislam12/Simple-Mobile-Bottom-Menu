<?php

/**
 * Inspect helper function
 * 
 * @param mixed $value
 * 
 * @return void
 */
function inspect( $value ) {
    echo "<pre>";
    print_r( $value );
    echo "</pre>";
}