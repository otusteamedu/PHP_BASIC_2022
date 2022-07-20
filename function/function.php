<?php
function writeLog (string $text):void {
    $text = date('Y-m-d H:i:s')."_". $text . PHP_EOL;
    $file = fopen('C:\repositories\PHP_BASIC_2022\log.txt','a');
    fwrite($file,$text);
    fclose($file);
};


?>