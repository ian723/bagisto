<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorApiController extends Controller
{
    public function calculate(Request $request)
    {
        // Input values from the request
        $acres = $request->input('acres');
        $interval = $request->input('interval');
        $corners = $request->input('corners');
        $barbedWire = $request->input('barbedWire');

        // Placeholder calculation logic, replace with your own
        $totalArea = $acres * 4046.86;
        $sideLength = sqrt($totalArea);
        $perimeter = $sideLength * 4;
        $cornerBrace = $corners;
        $intermediateBrace = $perimeter / $interval - 1;
        $uprightPosts = ceil($cornerBrace / 2);
        $totalPosts = $uprightPosts + $cornerBrace + $intermediateBrace;
        $barbedWireEstimate = $perimeter * $barbedWire;
        $uNails = ceil($cornerBrace * 1.5);
        $straightNails = $cornerBrace * 2;


        $COST_PER_POST = 1500;
        $COST_PER_METER_OF_BARBED_WIRE = 300;
        $COST_PER_KG_OF_U_NAILS = 150;
        $COST_PER_KG_OF_STRAIGHT_NAILS = 150;


        $totalCostPosts = $uprightPosts * $COST_PER_POST;
        $totalCostBarbedWire = $barbedWireEstimate * $COST_PER_METER_OF_BARBED_WIRE;
        $totalCostUNails = $uNails * $COST_PER_KG_OF_U_NAILS;
        $totalCostStraightNails = $straightNails * $COST_PER_KG_OF_STRAIGHT_NAILS;

        $totalCost = $totalCostPosts + $totalCostBarbedWire + $totalCostUNails + $totalCostStraightNails;


        return response()->json([
            'totalArea' => number_format($totalArea, 2),
            'sideLength' => number_format($sideLength, 2),
            'perimeter' => number_format($perimeter, 2),
            'uprightPosts' => $uprightPosts,
            'intermediateBrace' => number_format($intermediateBrace, 2),
            'cornerBrace' => $cornerBrace,
            'totalPosts' => $totalPosts,
            'totalCost' => number_format($totalCost, 2),
            'barbedWireEstimate' => number_format($barbedWireEstimate, 2),
            'uNails' => $uNails,
            'straightNails' => number_format($straightNails, 2),
        ]);
    }
}





