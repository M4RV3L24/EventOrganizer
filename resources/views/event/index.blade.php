@extends('base')

@section('content')
<div class=" mx-auto">
    
    <h2 class="drop-shadow-lg uppercase mb-4 text-6xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white text-center py-5"><span class="text-transparent bg-clip-text bg-gradient-to-r dark:to-orange-200 dark:from-red-400 to-stone-900 from-slate-800">Events in Surabaya</span></h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @foreach($events as $event)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                <a href="#">
                    <img class="rounded-t-lg" src="https://picsum.photos/500?random={{ $loop->index }}" alt="" />
                </a>
                <div class="px-5 pt-5 pb-2 flex-grow">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-transparent bg-clip-text bg-gradient-to-r dark:to-emerald-200 dark:from-sky-400 to-stone-900 from-slate-800">{{ $event->title }}</h5>
                    </a>
                    <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">{{ $event->formatted_date . " - " . $event->formatted_time}}</p>
                    <p class="mb-6 text-xs text-gray-900 dark:text-white">{{ $event->venue }}</p>

                    <p class="font-bold text-base text-gray-700 dark:text-red-200">FREE</p>
                    <p class="font-bold text-base text-gray-700 dark:text-red-200">Organizer: {{ $event->organizer->name }}</p>
                </div>
                <div class="text-center pb-3 pt-5">
                    <a href="{{ route('event.detail',$event->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</div>
    
@endsection