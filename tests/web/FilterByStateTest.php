<?php


use PHPUnit\Framework\TestCase;

class FilterByStateTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($airports, $state, $expected)
    {
        $this->assertEquals($expected, filterByState($airports, $state));
    }

    public function positiveDataProvider()
    {
        return [
            [
                [
                    [
                         "name" => "Naples Airport",
                         "code" => "APF",
                         "city" => "Naples",
                         "state" => "Florida",
                         "address" => "160 Aviation Dr N, Naples, FL 34104, USA",
                         "timezone" => "America/Detroit",
                ],
                    [
                        "name" => "Honolulu Airport",
                        "code" => "HNL",
                        "city" => "Honolulu",
                        "state" => "Hawaii",
                        "address" => "300 Rodgers Blvd, Honolulu, HI 96819, USA",
                        "timezone" => "Pacific/Honolulu",
                    ],
                    [
                        "name" => "Cincinnati Airport",
                        "code" => "CVG",
                        "city" => "Hebron",
                        "state" => "Ohio",
                        "address" => "3087 Terminal Dr, Hebron, KY 41048, USA",
                        "timezone" => "America/Detroit",
                    ],
                    [
                        "name" => "Redding Municipal Airport",
                        "code" => "RDD",
                        "city" => "Redding",
                        "state" => "California",
                        "address" => "6751 Woodrum Cir # 200, Redding, CA 96002, USA",
                        "timezone" => "America/Los_Angeles",
                    ],
                    [   "name" => "Destin-Fort Walton Beach Airport",
                        "code" => "VPS",
                        "city" => "Eglin AFB",
                        "state" => "Florida",
                        "address" => "1701 State Road 85 North, Eglin AFB, FL 32542, USA",
                        "timezone" => "America/Chicago"
                    ]
                ],
                'Florida',
                [
                    [
                        "name" => "Naples Airport",
                        "code" => "APF",
                        "city" => "Naples",
                        "state" => "Florida",
                        "address" => "160 Aviation Dr N, Naples, FL 34104, USA",
                        "timezone" => "America/Detroit",
                    ],
                    [   "name" => "Destin-Fort Walton Beach Airport",
                        "code" => "VPS",
                        "city" => "Eglin AFB",
                        "state" => "Florida",
                        "address" => "1701 State Road 85 North, Eglin AFB, FL 32542, USA",
                        "timezone" => "America/Chicago"
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
                'Georgia',
                [
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
                ]
            ]
        ];
    }
}