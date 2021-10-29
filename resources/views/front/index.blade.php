<x-layout>

    <section class="px-6 py-8 bg-blue-200 min-h-screen">

        @guest
            <h1 class="text-center text-indigo-500 font-bold text-xl">
                Please login/register to know how is the weather at your location!
            </h1>
        @else
            <livewire:weather-info/>
        @endguest

    </section>

</x-layout>
