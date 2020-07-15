<?php
/**
 * The $input variable contains text in snake case (i.e. hello_world or this_is_home_task)
 * Transform it into camel cased string and return (i.e. helloWorld or thisIsHomeTask)
 * @see http://xahlee.info/comp/camelCase_vs_snake_case.html
 *
 * @param  string  $input
 * @return string
 */
function snakeCaseToCamelCase(string $input)
{
         return str_replace(' ', '', lcfirst(ucwords(str_replace('_', ' ', $input))));
         /*Implementing a logic that inside the string capitalized letters must be only the first ones in each word except the very first
         $underscoreReplace = str_replace('_', ' ', $input);
         return str_replace(' ', '', lcfirst(ucwords(strtolower($underscoreReplace))));*/
}

/* alter
function snakeCaseToCamelCase(string $input)
{
        $stringArray = explode('_', $input);
        $firstWordToLower = lcfirst(array_shift($stringArray));
        $secondWordAndSoOn = '';
        foreach($stringArray as $value) {
        $secondWordAndSoOn .= ucfirst($value);
//Implementing a logic that inside the string capitalized letters must be only the first ones in each word except the very first
//$secondWordAndSoOn .= strtoupper($value[0]) . strtolower(substr($value, 1)); and respectively
//$firstWordToLower = strtolower(array_shift($stringArray));
        }
        return $firstWordToLower . $secondWordAndSoOn;
}
*/
/**
 * The $input variable contains multibyte text like 'ФЫВА олдж'
 * Mirror each word individually and return transformed text (i.e. 'АВЫФ ждло')
 * !!! do not change words order
 *
 * @param  string  $input
 * @return string
 */
function mirrorMultibyteString(string $input)
{
        preg_match_all('/./us', $input, $array);
        $strReverse = join('', array_reverse($array[0]));
        $reverseAgain = array_reverse(explode(' ', $strReverse));
        return trim(implode(' ', $reverseAgain));
}

/**
 * My friend wants a new band name for her band.
 * She likes bands that use the formula: 'The' + a noun with first letter capitalized.
 * However, when a noun STARTS and ENDS with the same letter,
 * she likes to repeat the noun twice and connect them together with the first and last letter,
 * combined into one word like so (WITHOUT a 'The' in front):
 * dolphin -> The Dolphin
 * alaska -> Alaskalaska
 * europe -> Europeurope
 * Implement this logic.
 *
 * @param  string  $noun
 * @return string
 */
function getBrandName(string $noun)
{
    if (!preg_match('/^[a-zA-Z]+$/', $noun)) {
        throw new InvalidArgumentException ('Enter a word, please');
    } else {
//Implementing a logic where 'A' equals 'a'
        $firstSymbol = $noun[0];
        $lastSymbol = $noun[-1];
        if (strcasecmp($firstSymbol, $lastSymbol) === 0) {
           return ucfirst(substr($noun, 0, -1)) . lcfirst($noun);
// alter return ucfirst(substr_replace($noun,'', -1, 1)) . lcfirst($noun);
        } else {
           return 'The ' . ucfirst($noun);
        }
    }
}