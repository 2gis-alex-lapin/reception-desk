<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        Tasks
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-gray-500 hover:bg-blue-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Create New Task</button>
            @if($isOpen)
                @include('livewire.tasks.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Slug</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Desc</th>
                        <th class="px-4 py-2">Icon</th>
                        <th class="px-4 py-2 w-20">URL</th>
                        <th class="px-4 py-2 w-60">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td class="border px-4 py-2">{{ $task->slug }}</td>
                        <td class="border px-4 py-2">{{ $task->title }}</td>
                        <td class="border px-4 py-2">{{ $task->description }}</td>
                        <td class="border px-4 py-2">{!! $task->icon !!}</td>
                        <td class="border px-4 py-2">{{ $task->url }}</td>
                        <td class="border px-4 py-2 text-center">
                        <button wire:click="edit({{ $task->id }})" class="bg-gray-500 hover:bg-blue-700 text-white py-1 px-3 rounded">Edit</button>
                            <button wire:click="delete({{ $task->id }})" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>