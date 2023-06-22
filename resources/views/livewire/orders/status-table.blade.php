@push('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
<script>

</script>
@endpush
<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white dark:bg-gray-700 border-b border-gray-200">
                <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white my-4">
                    {{ $title }}
                </h1>
                <div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Задача
                </th>
                <th scope="col" class="px-6 py-3">
                    Статус
                </th>
                <th scope="col" class="px-6 py-3">
                    Категория
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $order->getTitle() }}
                </th>
                <td class="px-6 py-4">
                    <x-colored-label value="{{ $order->status->title }}" class="{{ $order->status->color }}"></x-colored-label>
                </td>
                <td class="px-6 py-4">
                    {{ trans($order->task->type) }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('order-status', $order->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Подробнее</a>
                </td>
            </tr>            
            @endforeach
        </tbody>
    </table>                    
</div>

                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>