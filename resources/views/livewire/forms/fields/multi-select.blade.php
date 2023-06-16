<div>
    <label for="{{ $attributes['name'] }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $attributes['title'] }}</label>
    <select multiple name="{{ $attributes['name'] }}[]" class="bg-gray-50 h-48 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected value="logo">Лого</option>
    <option selected value="background-h">Фон на карточку (2000х1000)</option>
    <option value="background-v">Фон на карточку (1000x2000)</option>
    <option value="video">Видео</option>
    <option value="video-background-h">Обложка видео (800x400)</option>
    <option value="video-background-v">Обложка видео (400x800)</option>
    <option value="poly">Полиграфическая продукция</option>
    <option value="buildboard">Билборд в навигаторе</option>
    </select>
</div>