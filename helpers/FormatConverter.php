<?php
declare(strict_types=1);

namespace helpers;

class FormatConverter
{
    public static function getCurrentTime(): int
    {
        return strtotime(date(DATE_TIME_FORMAT));
    }
}