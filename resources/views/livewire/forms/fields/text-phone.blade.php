@push('scripts')
<script src="https://unpkg.com/imask"></script>
<script>
    var element = document.getElementById("input-<?= $attributes['name'] ?>");
    var maskOptions = {
    mask: '+{7} 000 000 00 00'
    };
    var mask = IMask(element, maskOptions);    
</script>
@endpush
<div>
    <label for="{{ $attributes['name'] }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $attributes['title'] }}</label>
    <input id="input-{{ $attributes['name'] }}" type="text" name="{{ $attributes['name'] }}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $attributes['placeholder'] }}">
</div>