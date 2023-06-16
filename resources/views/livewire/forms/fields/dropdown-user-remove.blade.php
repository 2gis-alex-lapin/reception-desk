@push('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
<script>

</script>
@endpush
<div>
    <p class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">Причина удаления пользовательского аккаунта</p>

    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownDefaultRadio" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Выбрать <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

    <!-- Dropdown menu -->
    <div id="dropdownDefaultRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
        <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
            <li>
                <div class="flex items-center">
                    <input checked id="default-radio-1" type="radio" value="fired" name="{{ $attributes['name'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Увольнение</label>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <input id="default-radio-2" type="radio" value="vacation" name="{{ $attributes['name'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Отпуск</label>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <input id="default-radio-3" type="radio" value="maternity-leave" name="{{ $attributes['name'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="default-radio-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Декрет</label>
                </div>
            </li>
        </ul>
    </div>
</div>