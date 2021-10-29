<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="register" class="mt-10">
                @csrf

                <x-form.input name="name" />
                <x-form.input name="location" placeholder="Your city name (example: Lisbon)" />
                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" />

                <x-form.button>Register</x-form.button>

            </form>
        </main>
    </section>

</x-layout>
