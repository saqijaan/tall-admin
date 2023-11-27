<div class="py-16 lg:py-20">
    <div class="flex items-center pb-6">
        <img src="/web/img/latest.png" alt="icon story" />
        <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
            The Latest
        </h3>
        <a class="flex no-underline items-center pl-10 font-body italic text-green transition-colors hover:text-secondary dark:text-green-light dark:hover:text-secondary" href="{{ route('blogs.index') }}">
            All posts
            <img class="ml-3" src="/web/img/long-arrow-right.png" alt="arrow right" />
        </a>
    </div>
    <div class="pt-8">
        @foreach ($blogs as $blog)
            @include('web.partials.blog')
        @endforeach

    </div>
</div>
