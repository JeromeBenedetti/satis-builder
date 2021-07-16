<?php


const NC  =             "\033[0m";
const BLACK  =          "\033[0;30m";
const DARK_GRAY  =      "\033[1;30m";
const RED  =            "\033[0;31m";
const LIGHT_RED  =      "\033[1;31m";
const GREEN  =          "\033[0;32m";
const LIGHT_GREEN  =    "\033[1;32m";
const BROWN  =          "\033[0;33m";
const ORANGE  =         "\033[0;33m";
const YELLOW  =         "\033[1;33m";
const BLUE  =           "\033[0;34m";
const LIGHT_BLUE  =     "\033[1;34m";
const PURPLE  =         "\033[0;35m";
const LIGHT_PURPLE  =   "\033[1;35m";
const CYAN  =           "\033[0;36m";
const LIGHT_CYAN  =     "\033[1;36m";
const LIGHT_GRAY  =     "\033[0;37m";
const WHITE  =          "\033[1;37m";


const ERROR = RED;
const WARNING = YELLOW;
const INFO = BLUE;
const SUCCESS = GREEN;

function consoleLogNl(string $message, $type = null)
{
    echo("\n> " . ($type ?? '') . "$message" . ($type ? NC : ''));
}

function consoleLog(string $message, $type = null)
{
    echo (($type ?? '') . "$message" . ($type ? NC : ''));
}

