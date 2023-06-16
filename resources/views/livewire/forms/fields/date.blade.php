@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
@endpush
<div>
    <p class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">Дата рождения</p>
    <div class="relative max-w-sm">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        </div>
        <input datepicker name="{{ $attributes['name'] }}" datepicker-format="yyyy-mm-dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('component.date.placeholder') }}">
        <div class="hidden absolute">
            <div class="days">
                <div class="days-of-week grid grid-cols-7 mb-1 dow block flex-1 leading-9 border-0 rounded-lg cursor-default text-center text-gray-900 font-semibold text-sm"></div>
                <div class="datepicker-grid w-64 grid grid-cols-7 block flex-1 leading-9 border-0 rounded-lg cursor-default text-center text-gray-900 font-semibold text-sm h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400"></div>
            </div>
            <div class="calendar-weeks">
                <div class="days-of-week flex"><span class="dow h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400"></span></div>
                <div class="weeks week block flex-1 leading-9 border-0 rounded-lg cursor-default text-center text-gray-900 font-semibold text-sm"></div>
            </div>
        </div>        
    </div>
</div>