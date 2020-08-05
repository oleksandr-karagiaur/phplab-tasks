<?php


use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($airports, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($airports));
    }

    public function positiveDataProvider()
    {
        return [
                [
                    [
                        [
                           "name" => "Nashville Metropolitan Airport 1",
                            "code" => "BNA",
                            "city" => "Nashville",
                            "state" => "Tennessee",
                            "address" => "1 Terminal Dr, Nashville, TN 37214, USA",
                            "timezone" => "America/Chicago",
                        ],
                        [
                            "name" => "Providence T.F. Green Airport",
                            "code" => "PVD",
                            "city" => "Providence",
                            "state" => "Rhode Island",
                            "address" => "Warwick, RI 02886, USA",
                            "timezone" => "America/New_York",
                        ],
                        [
                            "name" => "Lanai Airport",
                             "code" => "LNY",
                            "city" => "Lanai City, Lanai",
                            "state" => "Hawaii",
                            "address" => "Lanai Ave, Lanai City, HI 96763, USA",
                             "timezone" => "Pacific/Honolulu",
                        ],
                        [
                            "name" => "Williamson County Regional Airport",
                            "code" => "MWA",
                            "city" => "Marion",
                            "state" => "Illinois",
                            "address" => "10400 Terminal Dr #200, Marion, IL 62959, USA",
                            "timezone" => "America/Chicago",
                        ],
                        [
                            "name" => "North Las Vegas Airport",
                            "code" => "VGT",
                            "city" => "Las Vegas / North Las Vegas",
                            "state" => "Nevada",
                            "address" => "2730 Airport Dr, North Las Vegas, NV 89032, USA",
                            "timezone" => "America/Los_Angeles",
                        ],
                        [
                            "name" => "Aberdeen Regional Airport",
                            "code" => "ABR",
                            "city" => "Aberdeen",
                            "state" => "South Carolina",
                            "address" => "2100 Terminal Dr, Florence, SC 29501, USA",
                            "timezone" => "America/New_York",
                        ]
                    ],
            ['A', 'L', 'N', 'P', 'W']
                ]
        ];
    }
}