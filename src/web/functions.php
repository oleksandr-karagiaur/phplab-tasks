<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param  array  $airports
 * @return string[]
 */

function getUniqueFirstLetters(array $airports) {
    $airportFirstLetters = array();
    foreach ($airports as $value) {
        $airportFirstLetters[] = $value['name'][0];
    }
    sort($airportFirstLetters);
    return array_values(array_unique($airportFirstLetters));
}

function filterByFirstLetter($airports, $letter)
{
    return array_values(array_filter($airports, function ($airport) use ($letter) {
        return strtolower($airport['name'][0]) === strtolower($letter);
    }));
}

function filterByState($airports, $state)
{
    return array_values(array_filter($airports, function ($airport) use ($state) {
        return $airport['state'] === $state;
    }));
}

function sortBy($sortKey)
{
    return function($a, $b) use ($sortKey) {
        return $a[$sortKey] <=> $b[$sortKey];
    };

}

function pagination(&$airports, $currentPage, &$pagesNumber)
{
    $pagesNumber = ceil(count($airports) / 5);
    $offset = ($currentPage > 1) ? ($currentPage * 5) - 5 : 0;
    return $airports = array_slice($airports, $offset, 5);
}