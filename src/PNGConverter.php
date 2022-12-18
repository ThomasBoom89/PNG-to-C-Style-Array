<?php

declare(strict_types=1);

namespace Thomas\ImageToPixel;

use Imagick;
use ImagickException;
use ImagickPixel;
use ImagickPixelException;
use ImagickPixelIteratorException;
use function count;

class PNGConverter
{
    public const FILE_EXTENSION = 'png';

    /**
     * @throws ImagickPixelIteratorException
     * @throws ImagickException
     * @throws ImagickPixelException
     */
    public function convert(string $filepath, string $filename): string
    {
        $image = new Imagick($filepath . '/' . $filename . '.' . self::FILE_EXTENSION);

        $imageIterator = $image->getPixelIterator();

        $width  = 0;
        $heigth = count($imageIterator->getCurrentIteratorRow());
        $output = '{';

        foreach ($imageIterator as $column) {
            $width++;
            $output .= '{';
            foreach ($column as $pixel) {
                /** @var $pixel ImagickPixel */
                if ($pixel->getColorAsString() !== 'srgb(255,255,255)') {
                    $output .= 'true';
                } else {
                    $output .= 'false';
                }
                $output .= ',';
            }
            $output .= '},';
        }

        $output .= '};';

        return $filename . "[" . $width . "]" . "[" . $heigth . "] = " . $output;
    }
}
