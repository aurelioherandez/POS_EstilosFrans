@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-white dark:border-white dark:bg-white dark:text-black focus:border-white dark:focus:border-white focus:ring-indigo-500 dark:focus:ring-white rounded-md']) !!}>
