<?php


use PHPUnit\Framework\TestCase;

class FilterByFirstLetterTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($airports, $letter, $expected)
    {
        $this->assertEquals($expected, filterByFirstLetter($airports, $letter));
    }

    public function positiveDataProvider()
    {
        return [
            [
            [
            [
                "name" => "Arcata Airport",
                "code" => "ACV",
                "city" => "Arcata / Eureka",
                "state" => "California",
                "address" => "3561 Boeing Ave, McKinleyville, CA 95519, USA",
                "timezone" => "America/Los_Angeles",
            ],
            [
                "name" => "Mammoth Yosemite Airport",
                "code" => "MMH",
                "city" => "Mammoth Lakes",
                "state" => "California",
                "address" => "1300 Airport Rd, Mammoth Lakes, CA 93546, USA",
                "timezone" => "America/Los_Angeles",
            ],
            [
                "name" => "Monterey Regional Airport",
                "code" => "MRY",
                "city" => "Monterey",
                "state" => "California",
                "address" => "200 Fred Kane Dr, Monterey, CA 93940, USA",
                "timezone" => "America/Los_Angeles",
            ],
            [
                "name" => "Redding Municipal Airport",
                "code" => "RDD",
                "city" => "Redding",
                "state" => "California",
                "address" => "6751 Woodrum Cir # 200, Redding, CA 96002, USA",
                "timezone" => "America/Los_Angeles",
            ]
            ],
            'M',
            [
                [
                    "name" => "Mammoth Yosemite Airport",
                    "code" => "MMH",
                    "city" => "Mammoth Lakes",
                    "state" => "California",
                    "address" => "1300 Airport Rd, Mammoth Lakes, CA 93546, USA",
                    "timezone" => "America/Los_Angeles",
                ],
                [
                    "name" => "Monterey Regional Airport",
                    "code" => "MRY",
                    "city" => "Monterey",
                    "state" => "California",
                    "address" => "200 Fred Kane Dr, Monterey, CA 93940, USA",
                    "timezone" => "America/Los_Angeles",
                ]
            ]
            ],
            [
            [
                [
                "name" => "Tweed New Haven Regional Airport",
                "code" => "HVN",
                "city" => "New Haven",
                "state" => "Connecticut",
                "address" => "155 Burr St, New Haven, CT 06512, USA",
                "timezone" => "America/New_York",
            ],
            [
                "name" => "Daytona Beach International Airport",
                "code" => "DAB",
                "city" => "Daytona Beach",
                "state" => "Florida",
                "address" => "Daytona Beach International Airport, Daytona Beach, FL 32114, USA",
                "timezone" => "America/New_York",
            ],
            [
                "name" => "Punta Gorda Airport",
                "code" => "PGD",
                "city" => "Punta Gorda",
                "state" => "Florida",
                "address" => "28000 Airport Rd, Punta Gorda, FL 33982, USA",
                "timezone" => "America/New_York",
            ],
            [
                "name" => "Southwest Georgia Regional Airport",
                "code" => "ABY",
                "city" => "Albany",
                "state" => "Georgia",
                "address" => "3905 Newton Rd #100, Albany, GA 31701, USA",
                "timezone" => "America/New_York",
            ],
            [
                "name" => "Augusta Regional Airport",
                "code" => "AGS",
                "city" => "Augusta",
                "state" => "Georgia",
                "address" => "1501 Aviation Way, Augusta, GA 30906, USA",
                "timezone" => "America/New_York",
            ],
            [
                "name" => "Brunswick Golden Isles Airport",
                "code" => "BQK",
                "city" => "Brunswick",
                "state" => "Georgia",
                "address" => "Brunswick Golden Isles Airport, 295 Aviation Pkwy, Brunswick, GA 31525, USA",
                "timezone" => "America/New_York",
            ]
            ],
            'a',
            [
                [
                    "name" => "Augusta Regional Airport",
                    "code" => "AGS",
                    "city" => "Augusta",
                    "state" => "Georgia",
                    "address" => "1501 Aviation Way, Augusta, GA 30906, USA",
                    "timezone" => "America/New_York",
                ]
            ]
            ]
        ];
    }
}