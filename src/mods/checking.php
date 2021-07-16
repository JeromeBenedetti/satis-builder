<?php

const ARG_COUNT = 2;

function checkArgs(Array $args): Array
{
    $files = [];
    $count = 0;
    foreach ($args as $argument) {
        if (!$count++) continue;
    
        // $realPathfilename = getcwd() . "$argument";
        $realPathfilename = realpath($argument);
    
        if (file_exists($realPathfilename) && is_file($realPathfilename))
            $files[] = $argument;
        else
            exit("Error ! $argument does not exist or is not a valid file !");
    }
    return $files;
}

function checkArgCount($argNumber)
{
    if ($argNumber > (ARG_COUNT + 1))
        exit("Error ! Too many arguments, only " . ARG_COUNT . " arguments expected");
    elseif ($argNumber < (ARG_COUNT + 1))
        exit("Error ! Too few arguments, " . ARG_COUNT . " arguments expected");
}