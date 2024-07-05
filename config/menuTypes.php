<?php
if(config('default.subDivision'))
{
    return [
        'category',
        'officeDetail',
        'subDivision',
        'PedigreeCaste',
        'PedigreeDistribution'

    ];
}
else
{
    return [
        'category',
        'officeDetail',
        'PedigreeCaste',
        'PedigreeDistribution'

    ];
}
