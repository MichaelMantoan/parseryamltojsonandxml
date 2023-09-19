<?php
require_once 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

// Leggi il file YAML
$yml = file_get_contents('studenti.yaml');

// Converte il contenuto del file YAML in un array PHP
$studenti = Yaml::parse($yml);

// Converte l'array in una stringa JSON
$datijson = json_encode($studenti);
echo "JSON:\n";
echo $datijson;
echo "\n\n";

// Converte l'array in una stringa XML
function arrayToXml($data, $xmlData = null) {
    if ($xmlData === null) {
        $xmlData = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
    }

    foreach ($data as $key => $value) {
        if (is_numeric($key)) {
            $key = 'item' . $key; // Dealing with <0/>..<n/> issues
        }

        if (is_array($value)) {
            $newNode = $xmlData->addChild($key);
            arrayToXml($value, $newNode);
        } else {
            $xmlData->addChild($key, htmlspecialchars($value));
        }
    }
    return $xmlData->asXML();
}

$datixml = arrayToXml($studenti);
echo "XML:\n";
echo $datixml;