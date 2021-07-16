<?php

include_once(__DIR__ . "/file_stream.php");
include_once(__DIR__ . "/c_stream.php");


function extractRequireArrayFromComposerConfigFile(string $composerConfigFilename): array
{
    $composerData = jsonfile_get_contents($composerConfigFilename);
    return extractRequirements($composerData);
}


function fillSatisConfigFileRequirements(string $satisConfigFilename, array $requirements)
{
    backupFile($satisConfigFilename);
    $satisData = jsonfile_get_contents($satisConfigFilename);
    $satisData['require'] = $requirements;

    jsonfile_put_contents($satisConfigFilename, $satisData);
}

function extractRequirements(array $composerData): array
{
    $requireNoDev = $composerData['require'];
    $requireDev = $composerData['require-dev'];
    $require = array_merge($requireNoDev, $requireDev);
    unset($require['php']);

    return $require;
}