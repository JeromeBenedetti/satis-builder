<?php


include_once(__DIR__ . "/c_stream.php");

function backupFile(string $filename)
{
    consoleLogNl("Make backup of ");
    consoleLog($filename, INFO);~

    $backupFilename = "$filename~";
    consoleLog(" -> ");
    consoleLog($backupFilename, INFO);

    $backupFilename = "$filename~";
    if (file_exists($backupFilename)) unlink($backupFilename);
    copy($filename, $backupFilename);
}

function jsonfile_get_contents($filename)
{
    consoleLogNl("Reading ");
    consoleLog($filename, INFO);

    $jsonString = file_get_contents($filename);
    $result = json_decode($jsonString, true);
    if (null === $result) {
        consoleLogNl("Error : $filename is not a valid JSON file.", ERROR);
        exit(1);
    }
    return $result;
}

function jsonfile_put_contents(string $filename, $contents)
{
    consoleLogNl("Writing ");
    consoleLog($filename, INFO);

    $jsonStringToWrite = json_encode($contents, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    if (file_put_contents($filename, $jsonStringToWrite)) {
        consoleLogNl("Success : writing $filename is done.", SUCCESS);
    } else {
        consoleLogNl("Error : $filename writing fails.", ERROR);
        exit(1);
    }
}
