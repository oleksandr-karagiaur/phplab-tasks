<?php
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param  array  $input
 * @return array
 */
function repeatArrayValues(array $input)
{
    $mergedDuplicateArray = array();
    foreach($input as $value) {
        $mergedDuplicateArray = array_merge($mergedDuplicateArray, array_fill(0, $value, $value));
    }
    return $mergedDuplicateArray;
}

/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param  array  $input
 * @return int
 */
function getUniqueValue(array $input)
{
    $sameValuesInArrayCount = array_count_values($input);
    $notDuplicateArray = array();
    foreach ($sameValuesInArrayCount as $key => $value) {
        if ($value === 1) {
            $notDuplicateArray[] = $key;
        }
    }
    if ((empty($notDuplicateArray)) || (empty($input))) {
        return 0;
    }
        return min($notDuplicateArray);
}

/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param  array  $input
 * @return array
 */
function groupByTag(array $input)
{
    array_multisort($input);
    $sortedArray = array();
    foreach ($input as $subarray) {
        foreach($subarray['tags'] as $tagValue) {
            $sortedArray[$tagValue][] = $subarray['name'];
        }
    }
    ksort($sortedArray);
    return $sortedArray;
}