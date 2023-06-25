<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>
            <Link href="{{ route('categories.create') }}"
                class="bg-indigo-400 hover:bg-indigo-600 text-white rounded-md px-4 py-2">Add new categorie</Link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-table :for="$categories">
                        <x-splade-cell actions>
                            <Link class=" text-green-600 hover:text-green-400 font-bold  px-4"
                                href="{{ route('categories.edit', $item->id) }}">
                            Edit
                            </Link>
                            <Link confirm="Delete category..." confirm-text="Are you sure?"
                                confirm-button="Yes i'm sure" cancel-button="Cancel"
                                class=" text-red-600 hover:text-red-400 font-bold px-4"
                                href="{{ route('categories.destroy', $item->id) }}" method="DELETE">
                            Delete
                            </Link>
                        </x-splade-cell>
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
