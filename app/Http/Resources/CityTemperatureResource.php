<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityTemperatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $icon = $this->consolidated_weather[0]->weather_state_abbr;
        return [
            'tempreture' => [
                'min' => $this->consolidated_weather[0]->min_temp,
                'max' => $this->consolidated_weather[0]->max_temp,
                'the_temp' => $this->consolidated_weather[0]->the_temp,
            ],
            'city_name' => $this->title,
            'weather_condition' => $this->consolidated_weather[0]->weather_state_name,
            'applicable_date' => $this->consolidated_weather[0]->applicable_date,
            'country_name' => $this->parent->title,
            'icon' => "https://www.metaweather.com/static/img/weather/$icon.svg",
        ];
    }
}
