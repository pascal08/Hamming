<?php

namespace Acme\Hamming;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class Comparator
{

    /**
     * @param $strand1
     * @param $strand2
     * @return int
     */
    public static function distance($strand1, $strand2)
    {
        self::guardAgainstUnequalStrandLengths($strand1, $strand2);

        return count(array_diff_assoc(str_split($strand1), str_split($strand2)));
    }

    /**
     * @param $strand1
     * @param $strand2
     */
    private static function guardAgainstUnequalStrandLengths($strand1, $strand2)
    {
        if (strlen($strand1) !== strlen($strand2))
        {
            throw new InvalidArgumentException('DNA strands must be of equal length.');
        }
    }
}