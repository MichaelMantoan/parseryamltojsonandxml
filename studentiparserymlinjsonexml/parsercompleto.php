<?php
require_once 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use Spatie\ArrayToXml\ArrayToXml;

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
$datixml = ArrayToXml::convert($studenti, 'root');
echo "XML:\n";
echo $datixml;