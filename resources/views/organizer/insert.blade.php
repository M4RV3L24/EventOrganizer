@extends('base')

@section('content')
    <div class="p-10 rounded-lg bg-white bg-opacity-50 dark:bg-slate-800 dark:bg-opacity-80 max-w-5xl mx-auto">
        <h1 class="text-3xl font-extrabold mb-5 dark:text-white">{{ isset($organizer) ? 'Edit' : 'Add' }} Organizer</h1>

        <form class="w-full mx-auto"
            action="{{ isset($organizer) ? route('organizer.update', ['organizer_id' => $organizer->id]) : route('organizer.store') }}"
            method="POST">

            @csrf
            @if (isset($organizer))
                @method('PUT')
            @endif
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
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
                            value="{{ isset($organizer) ? $organizer->name : '' }}" />
                    </div>
                    <div class="mb-5">
                        <label for="facebook"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                        <input type="url" id="facebook" name="facebook_link"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://m.facebook.com/example" required
                            value="{{ isset($organizer) ? $organizer->facebook_link : '' }}" />
                    </div>
                    <div class="mb-5">
                        <label for="x" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">X</label>
                        <input type="url" id="x" name="x_link"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://x.com/example" required
                            value="{{ isset($organizer) ? $organizer->x_link : '' }}" />
                    </div>
                    <div class="mb-5">
                        <label for="website" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                        <input type="url" id="website" name="website_link"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="www.example.com" required
                            value="{{ isset($organizer) ? $organizer->website_link : '' }}" />
                    </div>

                </div>
                <div>
                    <div class="mb-5">
                        <textarea class="editor" name="description">{{ isset($organizer) ? $organizer->description : '' }}</textarea>
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
            <a href="{{ route('organizer.list') }}">
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


@section('scripts')
    @vite('resources/js/tinymce.js')
@endsection
