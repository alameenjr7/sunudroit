<?php

if (! function_exists('short_string')) {
    function short_string($str) {
            $rest = substr($str, 0, 10);
            return $rest;
    }
}