@props(['wireButton' => false])
<div @if(!$wireButton) class="mb-6" @endif>

    <span class="flex">
    <button type="submit"
            class="bg-indigo-500 w-40 text-white uppercase font-semibold text-xs h-10 px-10 hover:bg-indigo-600 rounded-xl"
    >

        @if($wireButton)
            <svg wire:loading class="animate-spin mr-2 h-4 w-4 text-white"
                 xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        @endif

        <span>{{ $slot }}</span>
    </button>
        </span>
</div>
