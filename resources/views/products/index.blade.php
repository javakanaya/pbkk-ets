<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            {{ __('Product') }}
            <a href="{{ route('products.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">+ ADD</a>
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session()->has('success'))
                        <div id="toast-success"
                            class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-2xl"
                            role="alert">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
                        </div>
                    @elseif(session()->has('Failed'))
                    <div id="toast-warning" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                            </svg>
                            <span class="sr-only">Warning icon</span>
                        </div>
                        <div class="ml-3 text-sm font-normal">{{ session('Failed') }}</div>
                 
                    </div>

                    @endif
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-900 text-left">Name</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-900 text-left">Stock</th>
                                <th
                                    class="border-b flex items-center justify-end font-medium p-4 pl-8 pt-0 pb-3 text-slate-900 text-left ">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            {{-- populate our post data --}}
                            @foreach ($products as $product)
                                <tr>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                                        {{ $product->name }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                                        {{ $product->stock }}</td>
                                    <td
                                        class="flex items-center justify-end border-b border-slate-100 p-4 pl-8 text-slate-500">
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="mx-2 border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">SHOW</a>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="mx-2 border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">EDIT</a>
                                        <form method="post" action="{{ route('products.destroy', $product->id) }}"
                                            class="inline">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="mx-2 border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md"
                                                onclick="return confirm('Are you sure?')">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
