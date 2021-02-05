<?php

header("Content-Type: application/json");
//Array map being used to get data contents being used within .csv file
$csv = array_map("str_getcsv", file("./assets/dataset/crime.csv"));
$json = json_encode($csv);

$i = 0;
//Echo statements being used for converting .csv columns into JSON-LD code format
echo "{" . '"@context"' . " : " . "{" . '"Place"' . " : " . '"http://schema.org/place"' . "}" . ", " . '"Place"' . " : " . "[" . "\n";
foreach ($csv as &$value) {
    echo "{" . "\n";
    echo '"@type"' . " : " . '"Place"' . "," . "\n";
    echo '"i:name"' . " : " . '"' . "$value[0]" . '"' . "," . "\n";
    echo '"i:area"' . " : " . '"' . "$value[1]" . '"' . "," . "\n";
    echo '"i:description"' . " : " . '"' . "$value[2]" . '"' . "\n";
    echo "}";
    if ($i < count($csv) - 1) {
        echo "," . "\n";
        $i++;
    }
}
echo "]" . "}";