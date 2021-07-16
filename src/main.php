#!/usr/bin/env php
<?php

/**
 *  Satis-Builder v0.1
 */


include_once(__DIR__ . "/mods/checking.php");
include_once(__DIR__ . "/mods/data_processing.php");
include_once(__DIR__ . "/mods/c_stream.php");


const VERSION = "0.1";


//  ENTRY POINT
exit(main($argc, $argv));
function main(int $argc, array $argv): mixed
{
    consoleLogNl("Satis Builder v" . VERSION);
    consoleLogNl("");
    consoleLogNl("Exec...");
    checkArgCount($argc);
    $files = checkArgs($argv);
    
    $require = extractRequireArrayFromComposerConfigFile($files[0]);
    fillSatisConfigFileRequirements($files[1], $require);

    echo "\n";  // fix screen artefacts
    return 0;
}
