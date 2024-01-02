<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">
                        Your Output
                    </label>
                    <textarea id="message" rows="4"
                              class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                              placeholder="Output" style="font-family: Consolas, serif"></textarea>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
