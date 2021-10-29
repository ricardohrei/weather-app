<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'location' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        $this->validateLocation();

        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'Your account has been created');

        return redirect('/');
    }

    public function validateLocation()
    {
        $location = request('location');
        $apiKey = config('services.openweather.key');

        // to check if it's a valid location
        $locationCoordinates = Http::get(
            "http://api.openweathermap.org/geo/1.0/direct?q={$location}&appid={$apiKey}")->json();

        if (empty($locationCoordinates)) {
            throw ValidationException::withMessages([
                'location' => 'Please provide a valid city name.',
            ]);
        } else {
            return true;
        }
    }
}
