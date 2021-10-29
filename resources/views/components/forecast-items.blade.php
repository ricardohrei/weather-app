@foreach($forecastWeatherResponse['daily'] as $weather)

    <ul class="flex flex-col divide divide-y w-full">

        <li
            @click="openedIndex == {{ $loop->iteration }} ? openedIndex = -1 : openedIndex = {{$loop->iteration}}"
            class="w-full">
            <div class="select-none cursor-pointer flex flex-1 items-center p-4">
                <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                    <img
                        src="http://openweathermap.org/img/wn/{{ $weather['weather'][0]['icon']}}.png"
                        alt="weather icon">
                </div>
                <div class="flex-1 pl-1 mr-16">
                    <div class="font-medium dark:text-white">
                        {{ round($weather['temp']['day']) }}º
                    </div>
                    <div class="text-gray-600 dark:text-gray-200 text-sm">
                        {{ $weather['weather'][0]['description'] }}
                    </div>
                </div>
                <div class="text-gray-600 dark:text-gray-200 text-xs">
                    {{ \Carbon\Carbon::createFromTimestamp($weather['dt'])->format('D') }}
                </div>
                <button class="w-24 text-right flex justify-end">
                    <svg style="display: none;"
                         x-show.transition.duration.500ms="openedIndex != {{ $loop->iteration }}"
                         xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                    <svg
                        x-show.transition.duration.500ms="openedIndex == {{ $loop->iteration }}"
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>

            <div x-show="openedIndex == {{ $loop->iteration }}" class="w-full border block" style="display: none;">
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Feels Like
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ round($weather['feels_like']['day']) }}º
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Max
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ round($weather['temp']['max']) }}º
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Min
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ round($weather['temp']['min']) }}º
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Humidity
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ round($weather['humidity'])}}%
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Wind Speed
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ round($weather['wind_speed'] * 2.23694) }} mph
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

        </li>

    </ul>

@endforeach
