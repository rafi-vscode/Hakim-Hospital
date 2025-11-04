@props([
    'title',
    'value',
    'color' => 'text-gray-900 dark:text-gray-100'
])

<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm sm:rounded-lg">
    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $title }}</h3>
    <p class="text-3xl font-semibold {{ $color }} mt-2">{{ $value }}</p>
</div>