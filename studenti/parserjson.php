<?php
require_once 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$yml = file_get_contents('studenti.yaml');
$studenti = Yaml::parse($yamlContent);
$datijson = json_encode($arrayData);

echo $datijson;