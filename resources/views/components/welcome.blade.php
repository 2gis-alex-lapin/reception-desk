<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <!-- <x-application-logo class="block h-12 w-auto" /> -->

    <h1 class="mt-8 text-2xl font-medium text-gray-900 my-4">
        Reception Desk
    </h1>
    <div class="grid grid-cols-4 gap-4">
        
        @foreach($tasks as $task)

            <div>
                <a href="orders/{{ $task->slug }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="w-24 mx-auto">
                        {!! $task->icon !!}
                    </div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ $task->title }}</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{ $task->description }}</p>
                </a>
            </div>

        @endforeach

    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    
</div>
