<div>
    <h1 class="text-center text-indigo-500 font-bold text-xl">Weather for the next days in <b>{{ ucwords($location) }}</b></h1>

    <main class="max-w-lg mx-auto mt-8 bg-gray-100 border rounded-xl">

        <div class="rounded-md px-5 py-5">
            <form wire:submit.prevent="getWeatherByCity" class="flex items-center justify-between">
                <input
                    wire:model.defer="location"
                    class="border border-gray-200 p-2 w-full rounded"
                    type="text"
                    name="location"
                    id="location"
                    value="{{$location}}"
                    required
                    placeholder="A city name (example: Lisbon)"
                >
                <div class="ml-8 flex inline-flex w-full justify-end">
                    <x-form.button wireButton="true"><span>Submit</span></x-form.button>
                </div>

            </form>

            <x-form.error name="location"/>

        </div>

        <div x-data="{ openedIndex: -1  }"
             class="container flex flex-col mx-auto w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
            <div
                @click="openedIndex == 0 ? openedIndex = -1 : openedIndex = 0"
                class="flex items-center justify-between px-4 py-5 sm:px-6 border-b w-full blue ">

                <div>
                    <img
                        class="inline"
                        src="http://openweathermap.org/img/wn/{{ $currentWeatherResponse['weather'][0]['icon']}}@2x.png"
                        alt="weather icon">
                    <span class="text-2xl -ml-4 text-gray-400 font-bold">
                            {{ round($currentWeatherResponse['main']['temp']) }}º
                        </span>
                </div>

                <div class="font-bold flex flex-col">
                        <span class="text-gray-800 text-xl">
                            Today
                        </span>
                    <span class="text-gray-500 text-xs">
                            {{ ucwords($currentWeatherResponse['weather'][0]['description']) }}
                        </span>
                </div>

                <svg style="display: none;"
                     x-show.transition.duration.500ms="openedIndex != 0"
                     xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"/>
                </svg>
                <svg
                    x-show.transition.duration.500ms="openedIndex == 0"
                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </div>

            <div
                x-show="openedIndex == 0"
                class="w-full border " style="display: none;">
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Feels Like
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ round($currentWeatherResponse['main']['feels_like']) }}º
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Max
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ round($currentWeatherResponse['main']['temp_max']) }}º

                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Min
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ round($currentWeatherResponse['main']['temp_min']) }}º
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Humidity
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $currentWeatherResponse['main']['humidity'] }}%
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Wind Speed
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ round($currentWeatherResponse['wind']['speed'] * 2.23694) }} mph
                            </dd>
                        </div>
                    </dl>
                </div>

            </div>

            <x-forecast-items :forecastWeatherResponse="$forecastWeatherResponse"/>

        </div>
    </main>

</div>
