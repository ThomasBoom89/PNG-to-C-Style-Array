<?php

declare(strict_types=1);

include_once '../vendor/autoload.php';

use Thomas\ImageToPixel\PNGConverter;

const PICTURES_PATH = './images';

$pngConverter = new PNGConverter();

foreach (scandir(PICTURES_PATH) as $itemName) {
    $itemNameSplitted = explode('.', $itemName);
    if ($itemNameSplitted[1] !== PNGConverter::FILE_EXTENSION || is_dir($itemName)) {
        continue;
    }

    echo $pngConverter->convert(PICTURES_PATH, $itemNameSplitted[0]);
    echo PHP_EOL . PHP_EOL;
}
