<?php

trait helpers
{
    public function debug($variable)
    {
        fwrite(STDERR, print_r(PHP_EOL, TRUE));
        fwrite(STDERR, print_r($variable, TRUE));
        fwrite(STDERR, print_r(PHP_EOL, TRUE));
    }
}