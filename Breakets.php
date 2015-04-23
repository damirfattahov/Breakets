<?php

const SUCCESS_MSG = 'ОК';
const ERROR_MSG   = 'Ошибка!';

$expression = '{{[[{{}]]]]}';
$count      = strlen($expression);

if (strlen($expression) % 2 === 0) {
	$i = 0;
	$items = str_split($expression);

	foreach ($items as $key => $val) {
		if ($i !== strlen($expression) / 2) {
			$symbol = $items[$count - $key - 1];

			if (($val === '{' && $symbol === '}') || ($val === '[' && $symbol === ']')) {
				addToLog($key, SUCCESS_MSG);
			} else {
				addToLog($key, ERROR_MSG);
			}

			$i++;
		}
	}
} else {
	throw new Exception('Выражение содержит ошибку. Проверьте строку.');
}

function addToLog($key, $type) {
	echo 'Символ номер: ' . $key . " - $type\n";
}