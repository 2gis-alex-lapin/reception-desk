<div>
    <label for="{{ $attributes['name'] }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $attributes['title'] }}</label>
    <select multiple name="{{ $attributes['name'] }}[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected></option>
    <option value="logo">Лого</option>
    <option value="background">Фон на карточку (800x400)</option>
    <option value="background">Фон на карточку (400x800)</option>
    <option value="video">Видеобрендирование</option>
    <option value="poly">Полиграфическая продукция</option>
    <option value="buildboard">Билборд в навигаторе</option>
    </select>
</div>