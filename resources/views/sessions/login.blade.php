<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In</h1>
            <form method="POST" action="login" class="mt-10">
                @csrf

                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" />

                <x-form.button>Log In</x-form.button>
            </form>

            <x-form.error name="credentials" />

        </main>
    </section>

</x-layout>
