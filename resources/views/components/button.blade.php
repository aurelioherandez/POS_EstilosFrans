<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-black-100 dark:bg-black-100 border border-transparent rounded-lg font-bold text-sm text-white dark:text-black uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-amber-600 hover:text-white focus:bg-gray-700 dark:focus:bg-amber-600 active:bg-gray-900 dark:active:bg-amber-600 dark:active:text-white focus:outline-none focus:ring focus:ring-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
