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
                                    <td
                                        class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                                        {{ $product->name }}</td>
                                    <td 
                                        class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                                        {{ $product->stock }}</td>
                                    <td
                                        class="flex items-center justify-end border-b border-slate-100 p-4 pl-8 text-slate-500">
                                         <a href="{{ route('products.show', $product->id) }}"
                                            class="mx-2 border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">SHOW</a>
                                        {{--<a href="{{ route('dashboard.blogs.edit', $blog->id) }}"
                                            class="mx-2 border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">EDIT</a> --}}
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
