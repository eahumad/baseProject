<?php

$basicConfigString = '{ 
  "basicConfig" : {
    "isInstalled": true
  }
}';

$basicConfigFile = fopen('../config/basicConfig.json','w+');
fwrite($basicConfigFile, $basicConfigString);
fclose($basicConfigFile);

$newName = uniqid();

rename('../functions','../'.$newName);

echo json_encode(1);