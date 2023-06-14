<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white dark:bg-gray-700 border-b border-gray-200">
                <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white my-4">
                    {{ $title }}
                </h1>
                <div>
                    @livewire('forms', ['name' => $slug])
                </div>
            </div>
        </div>
    </div>
</div>