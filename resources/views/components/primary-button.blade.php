<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-32 py-2 bg-indigo-700 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-800 focus:bg-indigo-800 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-900 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
