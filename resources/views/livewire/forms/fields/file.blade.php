@push('sripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<script>
// import Dropzone from "dropzone";

// let myDropzone = Dropzone({
//   paramName: "file", // The name that will be used to transfer the file
//   maxFilesize: 2, // MB
//   accept: function(file, done) {
//     if (file.name == "justinbieber.jpg") {
//       done("Naha, you don't.");
//     }
//     else { done(); }
//   }
// });
</script>
@endpush
<div>
    <p class="flex mb-2 mt-5 text-sm font-medium text-gray-900 dark:text-white">Исходные материалы</p>
    <input type="file" name="file" wire:model="file" id="dropzone-{{ $attributes['name'] }}" class="dropzone" multiple/>
    <div class="items-top grid grid-cols-1 gap-2">
        @if ($file)
            @foreach ($file as $file_instance)
                <div class="flex items-center">
                    <div class="flex m-3 w-20 h-20 border-opacity-100 border-black border-2 border border-spacing">
                        <img class="w-full" src="{{ $file_instance->temporaryUrl() }}">
                    </div>
                    <div class="text-left">{{ $file_instance->getClientOriginalName() }}</div>
                </div>
            @endforeach
        @endif
    </div>
</div>
