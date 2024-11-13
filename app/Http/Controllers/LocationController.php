<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getCurrentLocation(Request $request)
    {
        if ($request->has('latitude') && $request->has('longitude')) {
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
            
            return response()->json([
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);
        }
        
        return response()->json([
            'error' => 'Location data not provided.',
        ], 400);
    }
}
