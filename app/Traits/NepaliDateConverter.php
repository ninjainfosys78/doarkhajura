<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use RuntimeException;

trait NepaliDateConverter
{
    private array $nepali_length = [
        1975 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        1976 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30],
        1977 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        1978 => [31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30],
        1979 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        1980 => [31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        1981 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        1982 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30],
        1983 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        1984 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        1985 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        1986 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30],
        1987 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        1988 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        1989 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        1990 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31],
        1991 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        1992 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        1993 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        1994 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        1995 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        1996 => [31, 31, 32, 32, 31, 30, 29, 30, 30, 29, 30, 30],
        1997 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        1998 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        1999 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2000 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2001 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2002 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2003 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2004 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2005 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2006 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2007 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2008 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31],
        2009 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2010 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2011 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2012 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30],
        2013 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2014 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2015 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2016 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30],
        2017 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2018 => [31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2019 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2020 => [31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30],
        2021 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2022 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30],
        2023 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2024 => [31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30],
        2025 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2026 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2027 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2028 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2029 => [31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30],
        2030 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2031 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2032 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2033 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2034 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2035 => [30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31],
        2036 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2037 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2038 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2039 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30],
        2040 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2041 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2042 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2043 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30],
        2044 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2045 => [31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2046 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2047 => [31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30],
        2048 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2049 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30],
        2050 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2051 => [31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30],
        2052 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2053 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30],
        2054 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2055 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2056 => [31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30],
        2057 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2058 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2059 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2060 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2061 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2062 => [30, 32, 31, 32, 31, 31, 29, 30, 29, 30, 29, 31],
        2063 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2064 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2065 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2066 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31],
        2067 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2068 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2069 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2070 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30],
        2071 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2072 => [31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2073 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2074 => [31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30],
        2075 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2076 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30],
        2077 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2078 => [31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30],
        2079 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2080 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30],
        2081 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2082 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30],
        2083 => [31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30],
        2084 => [31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30],
        2085 => [31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30],
        2086 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30],
        2087 => [31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30],
        2088 => [30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30],
        2089 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30],
        2090 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30],
        2091 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2092 => [30, 31, 32, 32, 31, 30, 30, 30, 29, 30, 30, 30],
        2093 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30],
        2094 => [31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30],
        2095 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 30, 30, 30],
        //OH GOD!  I am tired.
    ];

    private string $firstDay_en = '1918-04-13';

    private string $start_ne = '1975';

    private string $start_en = '1918';

    private string $end_ne = '2095';

    private string $end_en = '2038';

    public array $month_name = ['बैशाख', 'जेठ', 'असार', 'साउन', 'भदौ', 'असोज', 'कार्तिक', 'मङ्सिर', 'पुस', 'माघ', 'फाल्गुण', 'चैत'];

    public function triMonthlyQuarters(): Collection
    {
        return collect([
            [
                'quarter' => $this->month_name[3] . '-' . $this->month_name[5],
                'quarter_value' => 1,
                'months' => ['4', '5', '6']
            ],
            [
                'quarter' => $this->month_name[6] . '-' . $this->month_name[8],
                'quarter_value' => 2,
                'months' => ['7', '8', '9']
            ],
            [
                'quarter' => $this->month_name[9] . '-' . $this->month_name[11],
                'quarter_value' => 3,
                'months' => ['10', '11', '12']
            ],
            [
                'quarter' => $this->month_name[0] . '-' . $this->month_name[2],
                'quarter_value' => 4,
                'months' => ['1', '2', '3']
            ]
        ]);
    }

    public function quarters(): Collection
    {
        return collect([
            [
                'quarter' => $this->month_name[3] . '-' . $this->month_name[6],
                'quarter_value' => 1,
                'months' => ['4', '5', '6', '7']
            ],
            [
                'quarter' => $this->month_name[7] . '-' . $this->month_name[10],
                'quarter_value' => 2,
                'months' => ['8', '9', '10', '11']
            ],
            [
                'quarter' => $this->month_name[11] . '-' . $this->month_name[2],
                'quarter_value' => 3,
                'months' => ['12', '1', '2', '3']
            ]
        ]);
    }

    private array $day_name = ['आइतबार', 'सोमबार', 'मङ्गलबार', 'बुधबार', 'बिहिबार', 'शुक्रबार', 'शनिवार'];

    private function get_week_ne($year, $month, $day): string
    {
        $jd = gregoriantojd($month, $day, $year);

        return $this->day_name[jddayofweek($jd, 0)];
    }

    private function validate_ne($year, $month, $day)
    {
        if (!array_key_exists($year, $this->nepali_length)) {
            return 'Invalid <b>Year</b> range';
        }
        if ($month > 12 || $month < 1) {
            return 'Invalid <b>Month</b> range';
        }
        if ($day > $this->nepali_length[$year][$month - 1] || $day < 1) {
            return 'Invalid <b>Day</b>';
        }

        return true;
    }

    private function validate_en($year, $month, $day)
    {
        if ($year < $this->start_en || $year > $this->end_en) {
            return 'Invalid Year Range';
        }
        if ($month < 1 || $month > 12) {
            return 'Invalid Month Range';
        }
        if ($day < 1 || ($day > cal_days_in_month(CAL_GREGORIAN, $month, $year))) {
            return 'Invalid day Range';
        }

        return true;
    }

    //Convert AD to Bs
    public function get_nepali_date($year, $month, $day): array
    {
        $validate = $this->validate_en($year, $month, $day);
        if ($validate !== true) {
            exit($validate);
        }

        $date = $year . '-' . $month . '-' . $day;
        $dayname = $this->get_week_ne($year, $month, $day);
        $date_start = date_create($this->firstDay_en);
        $date_today = date_create($date);
        $diff = date_diff($date_start, $date_today, true);
        $days = $diff->format('%a');
        $arr = '0';
        $mm = '';
        for ($i = $this->start_ne; $i < $this->end_ne; $i++) {
            $arr += array_sum($this->nepali_length[$i]);

            if ($arr > $days) {
                $year = $i;

                $count_previous = $arr - array_sum($this->nepali_length[$i]);
                $year_previous = $i - 1;
                for ($j = 0; $j < 12; $j++) {
                    $count_previous += $this->nepali_length[$i][$j];
                    if ($count_previous > $days) {
                        $month = $j + 1; //Even I don't Know Why should I add 1 :p
                        $daysss = $count_previous - $days;
                        $dayss = ($this->nepali_length[$i][$j] - $daysss) + 1;
                        break;
                    } elseif ($count_previous == $days) {
                        $year = $i;
                        $month = $j + 1;
                        $day = 1;
                    }
                }
                break;
            } elseif ($arr == $days) {
                $year = $i + 1;
                $month = 1;
                $day = 1;
            }
        }
        $date = [];
        $date['y'] = $year;
        $date['m'] = $month;
        $date['M'] = $this->month_name[$month - 1];
        $date['d'] = $dayss;
        $date['l'] = $dayname;

        return $date;
    }

    //get today nepali date
    public function get_today_nepali_date(): string
    {
        $dateArray = explode('-', today()->toDateString());
        $nepaliDate = $this->get_nepali_date($dateArray[0], $dateArray[1], $dateArray[2]);

        return $nepaliDate['y'] . '-' . (Str::padLeft($nepaliDate['m'], 2, 0)) . '-' . (Str::padLeft($nepaliDate['d'], 2, 0));
    }

    //Convert Nepali Date to english
    public function get_eng_date($year, $month, $day): array
    {
        $validate = $this->validate_ne($year, $month, $day);
        if ($validate !== true) {
            exit($validate);
        }

        $date_start = date_create($this->firstDay_en);
        $dayCount = '0';
        $months = $month - 1;
        for ($i = $this->start_ne; $i < $year; $i++) {
            $dayCount += array_sum($this->nepali_length[$i]);
        }
        for ($j = 0; $j < $months; $j++) {
            $dayCount += $this->nepali_length[$i][$j];
        }
        $dayCount += $day - 1;

        $nep = date_add($date_start, date_interval_create_from_date_string($dayCount . ' days'));
        $date = [];
        $date['y'] = date_format($nep, 'Y');
        $date['m'] = date_format($nep, 'm');
        $date['M'] = date_format($nep, 'M');
        $date['d'] = date_format($nep, 'd');
        $date['l'] = date_format($nep, 'l');

        return $date;
    }

    /**
     * @throws Exception
     */
    public function getNepaliMonthName($monthInNumber): string
    {
        $monthInNumber = (int) $monthInNumber;

        if ($monthInNumber < 13) {
            return $this->month_name[$monthInNumber];
        }

        throw new RuntimeException('Month Range Invalid');
    }

    /**
     * @throws Exception
     */
    public function getNepaliWeekName($weekInNumber): string
    {
        $weekInNumber = (int) $weekInNumber;

        if ($weekInNumber < 7) {
            return $this->month_name[$weekInNumber - 1];
        }

        throw new RuntimeException('Week Range Invalid');
    }

    public function adToBsDate($date): string
    {
        $dateArray = explode('-', $date);

        $bsDate = $this->get_nepali_date($dateArray[0], $dateArray[1], $dateArray[2]);

        return $bsDate['y'] . '-' . Str::padLeft($bsDate['m'], 2, 0) . '-' . Str::padLeft($bsDate['d'], 2, 0);
    }

    public function bsToAdDate($date): string
    {
        $dateArray = explode('-', $date);

        $adDate = $this->get_eng_date($dateArray[0], $dateArray[1], $dateArray[2]);

        return $adDate['y'] . '-' . Str::padLeft($adDate['m'], 2, 0) . '-' . Str::padLeft($adDate['d'], 2, 0);
    }
}
