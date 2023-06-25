<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add new Post') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form :action="route('posts.store')" class="p-4">
                        <x-splade-input class="mb-3" name="title" label="Title" placeholder="Enter title ..." />
                        <x-splade-input class="mb-3" name="slug" label="Slug" placeholder="Enter slug ..." />
                        <x-splade-textarea class="mb-3" name="description" label="Descriprtion" autosize
                            placeholder="Enter descriprtion ..." />
                        <x-splade-select class="mb-3" name="category_id" label="Category" :options="$categories"
                            placeholder="Select a category..." />
                        <x-splade-submit />
                    </x-splade-form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
