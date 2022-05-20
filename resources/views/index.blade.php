@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto mb-15">
        <div class="flex text-gray-200 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="text-5xl uppercase font-bold pb-4">
                    Welcome to Laramovie
                </h1>
                <h5 class="text-gray-400 text-xl font-bold pb-14">
                    Find latest movie reviews and trailers here
                </h5>
                <a href="/review"
                    class="button uppercase font-bold text-lg px-8 py-4 bg-green-500 rounded-full hover:bg-green-800 cursor-pointer">Find
                    Movie Reviews</a>
            </div>
        </div>
    </div>

    <div class="flex text-gray-200 m-auto mb-15">
        <div class="w-full m-auto">
            <div class="flex sm:w-4/5 lg:w-3/5 m-auto">
                <h2 class="flex mb-8 text-3xl font-bold border-l-4 pl-1 border-red-600">New Latest Trailers</h2>
            </div>
            <div class="flex flex-wrap w-4/5 m-auto justify-center">
                <iframe width="480" height="270" src="https://www.youtube.com/embed/a8Gx8wiNbs8"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <iframe width="480" height="270" src="https://www.youtube.com/embed/giXco2jaZ_4"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <iframe width="480" height="270" src="https://www.youtube.com/embed/tgB1wUcmbbw"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <iframe width="480" height="270" src="https://www.youtube.com/embed/6DxjJzmYsXo"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <iframe width="480" height="270" src="https://www.youtube.com/embed/wBDLRvjHVOY"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <iframe width="480" height="270" src="https://www.youtube.com/embed/BwZs3H_UN3k"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="flex text-gray-200 mb-15">
        <div class="w-full">
            <div class="flex sm:w-4/5 lg:w-3/5 m-auto">
                <h2 class="flex pl-1 mb-8 text-3xl font-bold border-l-4 border-red-600">Most Recent Review</h2>
            </div>

            @if (isset($posts))
                <div class="text-gray-200 sm:w-4/5 lg:w-3/5 m-auto mb-4 text-center">
                    <div class="flex w-full items-center mb-8">
                        <img src="{{ asset('images/' . $posts->image_path) }}" width="300px" height="450px"
                            alt={{ $posts->image_path }}>
                        <div class="pl-4 text-left">
                            <div class="flex m-auto items-center mb-4">
                                <div>
                                    <a href="/review/{{ $posts->slug }}" class="cursor-pointer">
                                        <h2 class="text-2xl font-bold mb-2 pl-1 border-l-4 border-red-600">
                                            {{ $posts->title }} &#40;{{ $posts->year }}&#41;</h2>
                                    </a>
                                    <span class="text-md text-gray-400">
                                        By <span class="font-bold italic text-red-500">{{ $posts->user->name }}</span>,
                                        posted on {{ date('jS M Y', strtotime($posts->updated_at)) }}
                                    </span>
                                </div>
                                <div class="flex w-15 h-15 ml-4 bg-red-600 items-center">
                                    <p class="text-2xl font-bold text-center m-auto">{{ $posts->rating }}</p>
                                </div>
                            </div>

                            <p class="text-xl leading-relaxed">
                                {{ substr($posts->description, 0, 150) }}
                                <a href="/review/{{ $posts->slug }}"
                                    class="text-lg font-bold mt-2 text-red-600 cursor-pointer">
                                    ..Read more
                                </a>
                            </p>
                        </div>
                    </div>

                    <a href="/review"
                        class="button uppercase font-bold text-lg px-8 py-4 bg-green-500 rounded-full hover:bg-green-800 cursor-pointer">Find
                        More Reviews</a>
                </div>
            @else
                <p>No review has been posted yet. Try making new one!</p>
            @endif
        </div>
    </div>

    <div class="flex text-gray-200 mb-15">
        <div class="sm:w-4/5 lg:w-3/5 m-auto">
            <div class="flex">
                <h2 class="flex pl-1 mb-8 text-3xl font-bold border-l-4 border-red-600">News</h2>
            </div>
            <div class="grid grid-cols-1">
                <div class="flex items-center">
                    <img src="{{ asset('images/hiring.svg') }}" width="400px" alt="hiring">
                    <div class="pl-4">
                        <h6 class="text-xl font-bold mb-4">BREAKING! We are Hiring!</h6>
                        <p class="leading-relaxed">Have a passion in writting? Let us hire you! Apply on our contact below.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti rerum assumenda illo velit
                            nostrum minus dolor vitae dicta. Optio rerum amet debitis dicta molestiae fugiat adipisci quam
                            saepe magni voluptatum.</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <img src="{{ asset('images/mobile.svg') }}" width="400px" alt="mobile">
                    <div class="pl-4">
                        <h6 class="text-xl font-bold mb-4">Mobile App Coming Soon!</h6>
                        <p class="leading-relaxed">Laramovie mobile app will coming out soon. Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Corrupti rerum assumenda illo velit nostrum minus dolor vitae
                            dicta. Optio rerum amet debitis dicta molestiae fugiat adipisci quam saepe magni voluptatum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
