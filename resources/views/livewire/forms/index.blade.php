<form action="/orders/{{$name}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        @foreach ($formFields as $field_id)
            @livewire('form-field', [
                'field_id' => $field_id
            ])
        @endforeach
        <x-button>{{ trans('Отправить') }}</x-button>
    </div>
</form>
