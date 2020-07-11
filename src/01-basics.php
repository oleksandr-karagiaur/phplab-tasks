<?php
/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater then 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter(int $minute)
{
        if (($minute > 0) && ($minute <= 15)) {
            return 'first';
        } elseif (($minute > 15) && ($minute <= 30)) {
            return 'second';
        } elseif (($minute > 30) && ($minute <= 45)) {
            return 'third';
        } elseif (($minute > 45) && ($minute <= 60) || ($minute === 0)) {
            return 'fourth';
        } else {
            throw new InvalidArgumentException('You must have entered either negative number or one that exceeds 60');
        }
}

/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower then 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $year
 * @return boolean
 * @throws InvalidArgumentException
 */
function isLeapYear(int $year)
{
// Check $year input is not negative and does not start with 0 or less than 1900
    if (!preg_match('/^(?-)[0-9]*/', $year) || ($year < 1900)) {
            throw new InvalidArgumentException('You input negative value or the year is less than 1900');
        } else {
            if (($year % 4 === 0) && ($year % 100 !== 0) || ($year % 400 === 0)) {
                return true;
            } else {
                return false;
            }
        }
    }
/* alter function isLeapYear(int $year)
{
    if ($year < 1900) {
        throw new InvalidArgumentException('The year you input is less than 1900');
    } else {
        if (date('L', mktime(0, 0, 0, 1, 1, $year)) === 1) {
            return true;
        } else {
            return false;
        }
    }
}
*/
/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more then 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  string  $input
 * @return boolean
 * @throws InvalidArgumentException
 */
function isSumEqual(string $input)
{
    if (strlen($input) !== 6) {
        throw new InvalidArgumentException('You entered more or less than 6 digits');
        /* Check that there are only numbers and the total amount of them is 6
        if (!preg_match('/^[0-9]{6}$/', $input)) {
        throw new InvalidArgumentException('There should be 6 digits'); */
            } else {
                $digitsArr = str_split($input);
                if (($digitsArr[0] + $digitsArr[1] + $digitsArr[2]) === ($digitsArr[3] + $digitsArr[4] + $digitsArr[5])) {
                    return true;
                } else {
                    return false;
                }
            }
        }

/* alter If the number of digits is not determined
        (absence of 6 digits condition)
        $digitsArr = str_split($input);
        $digitsNumber = count($digitsArr);
        $firstHalf = 0;
        $secondHalf = 0;
        for ($i = 0; $i < $digitsNumber; $i++) {
            if ($i < $digitsNumber / 2) {
                $firstHalf += $digitsArr[$i];
            } else {
                $secondHalf += $digitsArr[$i];
            }
        }
        return (boolval($firstHalf === $secondHalf) ? true : false);
    }
*/