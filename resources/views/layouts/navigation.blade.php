<nav x-data="{ open: false }" class="bg-white border-bottom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="navbar-brand fw-bold fs-5 text-primary mb-0">
            <x-application-logo />
        </a>

        @auth
        <!-- Menu Desktop -->
        <div class="d-none d-sm-flex align-items-center">
            <div class="me-3 text-dark small">{{ Auth::user()->email }}</div>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="btn btn-outline-secondary btn-sm">
                        {{ Auth::user()->name }} <i class="bi bi-caret-down ms-1"></i>
                    </button>
                </x-slot>

                <x-slot name="content">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Sair') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        @endauth

        <!-- Menu Mobile -->
        <div class="d-sm-none">
            <button @click="open = ! open" class="btn btn-outline-primary">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </div>

    <!-- Menu Mobile Dropdown -->
    <div :class="{'d-block': open, 'd-none': !open}" class="d-none bg-light border-top">
        @auth
        <div class="px-4 py-3 border-bottom">
            <div class="fw-semibold">{{ Auth::user()->name }}</div>
            <div class="text-muted small">{{ Auth::user()->email }}</div>
        </div>
        <div class="px-4 py-2">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Perfil') }}
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Sair') }}
                </x-responsive-nav-link>
            </form>
        </div>
        @endauth
    </div>
</nav>
