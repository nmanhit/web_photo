<?php
declare(strict_types=1);

namespace helpers;

class FormatConverter
{
    public static function getCurrentTime(): int
    {
        return strtotime(date(DATE_TIME_FORMAT));
    }

    public static function getRandomString(int $length = 35): string
    {
        return bin2hex(random_bytes($length));
    }
}