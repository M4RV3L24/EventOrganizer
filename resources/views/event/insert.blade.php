@extends('base')

@section('content')
    <div class="p-10 rounded-lg bg-white bg-opacity-50 dark:bg-slate-800 dark:bg-opacity-80 max-w-5xl mx-auto">
        <h1 class="text-3xl font-extrabold mb-5 dark:text-white">{{ isset($event) ? 'Edit' : 'Add' }} Event</h1>

        <form class="w-full mx-auto"
            action="{{ isset($event) ? route('event.update', ['event_id' => $event->id]) : route('event.store') }}"
            method="POST">

            @csrf
            @if (isset($event))
                @method('PUT')
            @endif
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <div class="mb-5">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        @if ($errors->has('title'))
                            <div class="text-red-500">{{ $errors->first('title') }}</div>
                        @endif
                        <input type="text" id="title" name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Marvel Wilbert Odelio" required value="{{ isset($event) ? $event->title : '' }}" />
                    </div>
                    <div class="mb-5">
                        <label for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        @if ($errors->has('location'))
                            <div class="text-red-500">{{ $errors->first('location') }}</div>
                        @endif
                        <input type="text" id="venue" name="venue"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="st. Example No. 5" required value="{{ isset($event) ? $event->venue : '' }}" />
                    </div>

                    <div class="mb-5">
                        <label for="organizer"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Organizer</label>

                        <select name="organizer_id" id="organizer"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($organizers as $organizer)
                                @if (isset($event) && $event->organizer_id == $organizer->id)
                                    <option value="{{ $organizer->id }}" selected>{{ $organizer->name }}</option>
                                @else
                                    <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select name="event_category_id" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($categories as $category)
                                @if (isset($event) && $event->event_category_id == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                            @if ($errors->has('date'))
                                <div class="text-red-500">{{ $errors->first('date') }}</div>
                            @endif
                            <input type="date" id="date" name="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="" required value="{{ isset($event) ? $event->date : '' }}" />
                        </div>
                        <div class="mb-5">
                            <label for="start_time"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Time</label>
                            @if ($errors->has('start_time'))
                                <div class="text-red-500">{{ $errors->first('start_time') }}</div>
                            @endif
                            <input type="time" step="1" id="start_time" name="start_time"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="" required value="{{ isset($event) ? $event->start_time : '' }}" />
                        </div>


                    </div>
                    <div class="mb-5">
                        <label for="booking_url"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Booking URL</label>
                        @if ($errors->has('booking_url'))
                            <div class="text-red-500">{{ $errors->first('booking_url') }}</div>
                        @endif
                        <input type="url" id="booking_url" name="booking_url"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="st. Example No. 5" required
                            value="{{ isset($event) ? $event->booking_url : '' }}" />
                    </div>


                    <button type="submit"
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                        <span
                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Submit
                        </span>
                    </button>
                    <a href="{{ route('event.admin') }}">
                        <button type="button"
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Cancel
                            </span>
                        </button>
                    </a>
                </div>
                <div class="">
                    <div class="mb-5">
                        <textarea class="editor" name="description">{{ isset($event) ? $event->description : '' }}</textarea>
                    </div>
                    <div class="mb-5">
                        <div id="tag-container"
                            class="flex flex-wrap items-center p-2 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                            <input type="text" id="tag-input"
                                class="flex-grow p-2 bg-transparent border-none outline-none dark:text-white"
                                placeholder="Add a tag" />
                        </div>
                        <input type="hidden" name="tags" id="tags"
                            value="{{ isset($event) ? implode(',', json_decode($event->tags)) : '' }}">
                    </div>
                </div>
            </div>

        </form>

    </div>
@endsection


@section('scripts')
    @vite('resources/js/tinymce.js')

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var tags = $('#tags').val().split(',').filter(tag => tag.trim() !== '');
            tags.forEach(tag => addTag(tag));

            $('#tag-input').on('keypress', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                    var tag = $(this).val().trim();
                    if (tag) {
                        addTag(tag);
                        $(this).val('');
                    }
                }
            });

            function addTag(tag) {
                var tagElement = $(
                    '<span class="tag bg-blue-500 text-white rounded-full px-2 py-1 m-1 flex items-center">' +
                    tag + '<span class="ml-2 cursor-pointer">&times;</span></span>');
                tagElement.find('span').on('click', function() {
                    $(this).parent().remove();
                    updateTagsInput();
                });
                $('#tag-container').append(tagElement);
                updateTagsInput();
            }

            function updateTagsInput() {
                var tags = [];
                $('#tag-container .tag').each(function() {
                    tags.push($(this).text().slice(0, -1));
                });
                $('#tags').val(tags.join(','));
            }
        });
    </script>
@endsection
