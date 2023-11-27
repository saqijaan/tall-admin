<div class="pb-16 lg:pb-20">
    <div class="flex items-center pb-6">
        <img src="/web/img/icon-project.png" alt="icon story" />
        <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
            Topics
        </h3>
        <a class="flex no-underline items-center pl-10 font-body italic text-green transition-colors hover:text-secondary dark:text-green-light dark:hover:text-secondary" href="{{ route('topics.index') }}">
            All Topics
            <img class="ml-3" src="/web/img/long-arrow-right.png" alt="arrow right" />
        </a>
    </div>
    <div>
        @foreach ($topics as $topic)
            @include('web.partials.topic')
        @endforeach

    </div>
</div>
