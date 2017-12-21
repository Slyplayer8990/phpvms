<?php

use App\Facades\Utils;

class GeoTest extends TestCase
{
    public function setUp() {
    }

    public function testClosestPoint()
    {
        $geoSvc = app('\App\Services\GeoService');
        /**
         * [2017-12-21 00:54:10] dev.INFO: Looking for ATL
         * [2017-12-21 00:54:10] dev.INFO: ATL - 36.58106 x 26.375603
         * [2017-12-21 00:54:10] dev.INFO: Looking for SIE
         * [2017-12-21 00:54:10] dev.INFO: found 3 for SIE
         * [2017-12-21 00:54:10] dev.INFO: name: SIE - 39.0955x-74.800344
         * [2017-12-21 00:54:10] dev.INFO: name: SIE - 41.15169x-3.604667
         * [2017-12-21 00:54:10] dev.INFO: name: SIE - 52.15527x22.200833
         */
        # Start at ATL
        $start_point = [36.58106, 26.375603];

        # These are all SIE
        $potential_points = [
            [39.0955, -74.800344],
            [41.15169, -3.604667],
            [52.15527, 22.200833],
        ];

        $coords = $geoSvc->getClosestCoords($start_point, $potential_points);
        $this->assertEquals([52.15527, 22.200833], $coords);
    }

}
