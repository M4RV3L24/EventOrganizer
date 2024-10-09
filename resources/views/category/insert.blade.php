@extends('base')

@section('content')
    <div class="p-10 rounded-lg bg-white bg-opacity-50 dark:bg-slate-800 dark:bg-opacity-80 max-w-lg mx-auto">
        <h1 class="text-center text-3xl font-extrabold mb-5 dark:text-white">{{ isset($category) ? 'Edit' : 'Add' }} category</h1>

        <form class="w-full mx-auto"
            action="{{ isset($category) ? route('category.update', ['category_id' => $category->id]) : route('category.store') }}"
            method="POST">

            @csrf
            @if (isset($category))
                @method('PUT')
            @endif
            <div class="grid grid-cols-1">
                <div>
                    <div class="mb-5">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        @if ($errors->has('name'))
                            <div class="text-red-500">{{ $errors->first('name') }}</div>
                        @endif
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Marvel Wilbert Odelio" required
                            value="{{ isset($category) ? $category->name : '' }}" />
                    </div>
                    
                </div>
            </div>

            <button type="submit"
                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                <span
                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Submit
                </span>
            </button>
            <a href="{{ route('category.list') }}">
                <button type="button"
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Cancel
                    </span>
                </button>
            </a>
        </form>

    </div>
@endsection
