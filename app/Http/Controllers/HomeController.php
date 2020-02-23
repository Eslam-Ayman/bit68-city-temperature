<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CityTemperatureRequest;
use Bioudi\LaravelMetaWeatherApi\Weather;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getTemperature(CityTemperatureRequest $request)
    {
        $weather = new Weather();
        $response = $weather->getByCityName($request->city_name);

        if (!is_object($response))
            return back()->withInput()->with('error', $response);
        
        $icon = $response->consolidated_weather[0]->weather_state_abbr;
        return view('temperature')->with([
            'tempreture' => [
                'min' => $response->consolidated_weather[0]->min_temp,
                'max' => $response->consolidated_weather[0]->max_temp,
                'the_temp' => $response->consolidated_weather[0]->the_temp,
            ],
            'city_name' => $response->title,
            'weather_condition' => $response->consolidated_weather[0]->weather_state_name,
            'applicable_date' => $response->consolidated_weather[0]->applicable_date,
            'country_name' => $response->parent->title,
            'icon' => "https://www.metaweather.com/static/img/weather/png/64/$icon.png",
        ]);
    }
}
