@extends('base')

@section('content')

<section class="bg-white/50 dark:bg-gray-900/50 rounded-xl flex flex-col overflow-hidden">
    <div class="grid max-w-screen-xl px-4 pt-8 pb-4 mx-auto lg:gap-8 xl:gap-0 lg:pt-16 lg:pb-8 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7 w-full">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">{{ $event->title }}</h1>
            <div class="max-w-2xl mb-6 font-light text-gray-700 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-200">
                {!! $event->description !!}
            </div>
            
            <div class="grid grid-cols-2 gap-x-6">
                <div>
                    <h5 class="text-xl font-bold dark:text-white">Organizer</h5>
                    <p class="max-w-2xl mb-6 font-semibold text-gray-600 lg:mb-8 md:text-md lg:text-lg dark:text-gray-300">{{ $event->organizer->name}}</p>
                </div>
                <div>
                    <h5 class="text-xl font-bold dark:text-white">Booking URL</h5>
                    <p class="max-w-2xl mb-6 font-semibold text-gray-600 lg:mb-8 md:text-md lg:text-lg dark:text-gray-400">{{ $event->booking_url}}</p>
                    
                </div>
                <div>
                    <h5 class="text-xl font-bold dark:text-white">Date & Time</h5>
                    <p class="max-w-2xl mb-6 font-semibold text-gray-600 lg:mb-8 md:text-md lg:text-lg dark:text-gray-400">{{ $event->formatted_date ." - ". $event->formatted_time}}</p>
                    
                </div>
                <div>
                    <h5 class="text-xl font-bold dark:text-white">Location</h5>
                    <p class="max-w-2xl mb-6 font-semibold text-gray-600 lg:mb-8 md:text-md lg:text-lg dark:text-gray-400">{{ $event->venue}}</p>
                    
                </div>
            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="https://picsum.photos/1000/500?random={{ $event->id }}" alt="mockup">

            
        </div>                
    </div>
    <div class="text-center py-5 bg-teal-400 bg-opacity-60 dark:bg-zinc-800 dark:bg-opacity-80">
        @foreach ($event->formatted_tags as $tag)
            @if ($loop->index % 2 == 0)
                <span class="bg-indigo-100 text-indigo-800 text-xl font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $tag }}</span>
            
            @else
                <span class="bg-pink-100 text-pink-800 text-xl font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">{{ $tag }}</span>
            
            @endif
        @endforeach
        
    </div>
</section>

@endsection