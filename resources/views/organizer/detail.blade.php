@extends('base')

@section('content')
    <div class="p-10 rounded-lg bg-white bg-opacity-50 dark:bg-slate-800 dark:bg-opacity-80 max-w-5xl mx-auto">

        <h1 class="text-3xl font-extrabold mb-10 dark:text-white">{{ $organizer->name }}</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <div class="mb-5">
                    <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook
                        Link</label>
                    <input type="url" id="facebook" name="facebook_link" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="https://m.facebook.com/example" required value="{{ $organizer->facebook_link }}" />
                </div>
                <div class="mb-5">
                    <label for="x" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">X
                        Link</label>
                    <input type="url" id="x" name="x_link" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="https://x.com/example" required value="{{ $organizer->x_link }}" />
                </div>
                <div class="mb-5">
                    <label for="x"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                    <input type="url" id="x" name="x_link" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="https://x.com/example" required value="{{ $organizer->website_link }}" />
                </div>

                <div class="inline-flex rounded-md shadow-sm" role="group">

                    <form class="inline" action="{{ route('organizer.edit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="organizer_id" value="{{ $organizer->id }}">
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                            Edit
                        </button>
                    </form>
        
                    <form class="inline" action="{{ route('organizer.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="organizer_id" value="{{ $organizer->id }}">
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                            Delete
                        </button>
                    </form>
        
                </div>
            </div>
            <div class="max-h-full">
                <div class="">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About</label>
                    <div
                        class="block p-2.5 w-full max-h-64 overflow-y-auto text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {!! $organizer->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
