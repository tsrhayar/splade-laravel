<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add new categories') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form :action="route('categories.store')" class="p-4">
                        <x-splade-input name="name" label="Name" placeholder="Enter name ..." />
                        <br>
                        <x-splade-input name="slug" label="Slug" placeholder="Enter slug ..." />
                        <br>
                        <x-splade-submit />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
