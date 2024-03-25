<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-end z-10 navbar bg-[#2fc0cc] text-white flex justify-end" wire:scroll="handleScroll">
    @auth
        <a href="{{ url('/dashboard') }}" class="font-semibold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Mon espace</a>
    @else
        <a href="{{ route('login') }}" class="font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Se connecter</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ms-4 font-semibold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>S'inscrire</a>
        @endif
    @endauth
</div>
