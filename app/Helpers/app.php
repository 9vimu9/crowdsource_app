<?php
if (!function_exists('constantValue')) {
    function constantValue($key, $default = null)
    {
        return config("constants." . $key, $default);
    }
}
