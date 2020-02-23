<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CityTemperatureRequest;
use App\Http\Resources\CityTemperatureResource;
use Bioudi\LaravelMetaWeatherApi\Weather;

class CityTemperatureController extends Controller
{
    public function cityTemperature(CityTemperatureRequest $request)
    {
    	$weather = new Weather();
    	$response = $weather->getByCityName($request->city_name);

    	if (!is_object($response)) 
    		return response([ 'status'=>'error', 'message'=> $response], 404);

    	return new CityTemperatureResource($response);
    }
}
