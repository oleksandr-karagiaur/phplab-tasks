<?php


use PHPUnit\Framework\TestCase;

class SortByTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $sortKey, $expected)
    {
        usort($input, sortBy($sortKey));
        $this->assertEquals($expected, $input);
    }

    public function positiveDataProvider()
    {
        return [
            [
            [
            [
                    "name" => "Rickenbacker International Airport",
                    "code" => "LCK",
                    "city" => "Columbus",
                    "state" => "Ohio",
                    "address" => "2295 John Cir Dr, Columbus, OH 43217, USA",
                    "timezone" => "America/New_York",
            ],
            [
                    "name" => "Roswell International Air Center",
                     "code" => "ROW",
                     "city" => "Roswell",
                     "state" => "New Mexico",
                     "address" => "1 Jerry Smith Cir, Roswell, NM 88203, USA",
                     "timezone" => "America/Denver",
            ],
                [
                    "name" => "Asheville Regional Airport",
                    "code" => "AVL",
                    "city" => "Asheville",
                    "state" => "North Carolina",
                    "address" => "61 Terminal Dr #1, Fletcher, NC 28732, USA",
                    "timezone" => "America/New_York",
                ],
                [
                    "name" => "Grand Forks International Airport",
                    "code" => "GFK",
                    "city" => "Grand Forks",
                    "state" => "North Dakota",
                    "address" => "2301 Airport Dr, Grand Forks, ND 58203, USA",
                    "timezone" => "America/Chicago",
                ]
                ],
            "code",
            [
                [
                    "name" => "Asheville Regional Airport",
                    "code" => "AVL",
                    "city" => "Asheville",
                    "state" => "North Carolina",
                    "address" => "61 Terminal Dr #1, Fletcher, NC 28732, USA",
                    "timezone" => "America/New_York",
                ],
                [
                    "name" => "Grand Forks International Airport",
                    "code" => "GFK",
                    "city" => "Grand Forks",
                    "state" => "North Dakota",
                    "address" => "2301 Airport Dr, Grand Forks, ND 58203, USA",
                    "timezone" => "America/Chicago",
                ],
                [
                    "name" => "Rickenbacker International Airport",
                    "code" => "LCK",
                    "city" => "Columbus",
                    "state" => "Ohio",
                    "address" => "2295 John Cir Dr, Columbus, OH 43217, USA",
                    "timezone" => "America/New_York",
                ],
                [
                    "name" => "Roswell International Air Center",
                    "code" => "ROW",
                    "city" => "Roswell",
                    "state" => "New Mexico",
                    "address" => "1 Jerry Smith Cir, Roswell, NM 88203, USA",
                    "timezone" => "America/Denver",
                ]
            ]
            ],
            [
            [
                [
                    "name" => "Manhattan Regional Airport",
                    "code" => "MHK",
                    "city" => "Manhattan",
                    "state" => "Iowa",
                    "address" => "10965 Aviation Drive, Dubuque, IA 52003, USA",
                    "timezone" => "America/Chicago",
                ],
                [
                    "name" => "Topeka Regional Airport",
                    "code" => "FOE",
                    "city" => "Topeka",
                    "state" => "Iowa",
                    "address" => "6510 SE Forbes Ave, Topeka, KS 66619, USA",
                    "timezone" => "America/Chicago",
                ],
                [
                    "name" => "Salisbury-Ocean City Wicomico Regional Airport",
                    "code" => "SBY",
                    "city" => "Salisbury",
                    "state" => "Maryland",
                    "address" => "5485 Airport Terminal Rd a, Salisbury, MD 21804, USA",
                    "timezone" => "America/New_York",
                ],
                [
                    "name" => "Alpena County Regional Airport",
                    "code" => "APN",
                    "city" => "Alpena",
                    "state" => "Michigan",
                    "address" => "1617 Airport Rd, Alpena, MI 49707, USA",
                    "timezone" => "America/Detroit",
                ]
                ],
                "city",
                [
                [
                       "name" => "Alpena County Regional Airport",
                       "code" => "APN",
                       "city" => "Alpena",
                       "state" => "Michigan",
                       "address" => "1617 Airport Rd, Alpena, MI 49707, USA",
                       "timezone" => "America/Detroit",
                ],
                [
                        "name" => "Manhattan Regional Airport",
                        "code" => "MHK",
                        "city" => "Manhattan",
                        "state" => "Iowa",
                        "address" => "10965 Aviation Drive, Dubuque, IA 52003, USA",
                        "timezone" => "America/Chicago",
                ],
                [
                        "name" => "Salisbury-Ocean City Wicomico Regional Airport",
                        "code" => "SBY",
                        "city" => "Salisbury",
                        "state" => "Maryland",
                        "address" => "5485 Airport Terminal Rd a, Salisbury, MD 21804, USA",
                        "timezone" => "America/New_York",
                ],
                [
                        "name" => "Topeka Regional Airport",
                        "code" => "FOE",
                        "city" => "Topeka",
                        "state" => "Iowa",
                        "address" => "6510 SE Forbes Ave, Topeka, KS 66619, USA",
                        "timezone" => "America/Chicago",
                ]
                ]
                ]
        ];
    }
}