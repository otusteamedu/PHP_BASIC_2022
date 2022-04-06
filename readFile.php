<?php

	$fileName = 'LongTextFile.txt';

	function wordsCountInFile(string $fileName) :string {
		$wordsCount = 0;
		$fd = fopen($fileName, 'r') or die("не удалось открыть файл");
		while(!feof($fd))
		{
    		$str = fgets($fd);
    		if (preg_match_all('/(\w+)/u', $str, $match)){
    			$wordsCount += count($match[1]);
    		}
    		echo $str;
		}
		fclose($fd);

		return $wordsCount;
	}
	
	echo (wordsCountInFile($fileName));

?>