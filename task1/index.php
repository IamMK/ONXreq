<?php

class Pipeline
{
    function make()
    {
        $functions = func_get_args();
        return function ($arg) use ($functions) {
            $result = $arg;
            foreach ($functions as $func) {
                $result = $func($result);
            }
            return $result;
        };
    }
}

$pipeline = new Pipeline();

print_r($pipeline->make(
    function ($var) {
        return $var * 3;
    },
    function ($var) {
        return $var + 1;
    },
    function ($var) {
        return $var / 2;
    }
)(3));
