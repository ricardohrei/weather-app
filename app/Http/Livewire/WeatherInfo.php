<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WeatherInfo extends Component
{
    public $location;
    private $currentWeatherResponse;

    public function mount()
    {
        $this->location = auth()->user()->location ?? $this->location;
        $this->getWeatherByCity();
    }

    public function getWeatherByCity()
    {
        $apiKey = config('services.openweather.key');
        $unit = "metric";

        $currentWeather = $this->getCurrentData($apiKey, $unit, $this->location);

        $this->resetErrorBag();

        if (in_array('404', $this->currentWeatherResponse)) {

            $location = $this->location = auth()->user()->location;

            $currentWeather = $this->getCurrentData($apiKey, $unit, $location);

            $this->addError('location', 'Please enter a valid location.');
        }

        $lat = $currentWeather['coord']['lat'];
        $lon = $currentWeather['coord']['lon'];

        $this->getForecastData($apiKey, $unit, $lat, $lon);

    }

    public function getCurrentData($apiKey, $unit, $location)
    {
        return $this->currentWeatherResponse = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units={$unit}")->json();
    }

    public function getForecastData($apiKey, $unit, $lat, $lon)
    {
        return $this->forecastWeatherResponse = Http::get(
            "https://api.openweathermap.org/data/2.5/onecall?lat={$lat}&lon={$lon}&appid={$apiKey}&units={$unit}&exclude=minutely,hourly&count=7")->json();

    }

    public function render()
    {
        return view('livewire.weather-info', [
            'currentWeatherResponse' => $this->currentWeatherResponse,
            'forecastWeatherResponse' => $this->forecastWeatherResponse,
        ]);
    }
}

