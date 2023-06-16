<form action="/orders/{{$name}}" method="post" enctype="multipart/form-data" class="block">
    @csrf
    <input type="hidden" name="task_id" value="{{$name}}">
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        @foreach ($formFields as $field_id)
            @livewire('form-field', [
            'field_id' => $field_id
            ])
        @endforeach
    </div>
    <div class="text-right my-2">
        <x-button class="my-5">{{ trans('Отправить') }}</x-button>
    </div>
</form>
