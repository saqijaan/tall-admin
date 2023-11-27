@if ($blog)
    <a class="flex flex-col no-underline border-b-2 border-grey py-5 hover:opacity-75" href="{{ route('blogs.show', $blog) }}">
        <img class="w-full rounded-lg" src="{{ $blog->postImage }}" alt="">
        <div class="flex flex-row justify-between align-middle dark:text-white py-2">
            {{ date('F d, Y') }}
        </div>
        <div class="dark:text-white">
            <h2 class="text-4xl font-bold py-3 pb-5">
                {{ $blog->title }}
            </h2>
            <div>
                {!! $blog->description !!}
            </div>
            <div class="text-2xl font-bold text-blue py-5 flex flex-row items-end">
                <span>Continue reading</span> <i class='bx bx-right-arrow-alt text-2xl'></i>
            </div>
        </div>
    </a>
@endif
