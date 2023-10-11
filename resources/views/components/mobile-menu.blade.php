<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Logo Bank Sampah Png" class="w-14" src="{{ Vite::asset('resources/logo/Logo-01.png') }}">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="menu"
                class="w-8 h-8 text-white transform "></i> </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        <ul class="scrollable__content py-2">
            @if (auth()->user())
                <li>
                    <a href="{{ route('dashboard') }}" class="menu {{ Request::is('/') ? 'menu--active' : null }}">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title"> Dashboard <i data-lucide="chevron-down"
                                class="menu__sub-icon transform rotate-180"></i> </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="menu {{ Request::is('dashboard/sampah*') ? 'menu--active' : null }}">
                        <div class="menu__icon"> <i data-lucide="user"></i> </div>
                        <div class="menu__title"> Sampah <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="{{ Request::is('dashboard/sampah*') ? 'menu__sub-open' : null }}">
                        <li>
                            <a href="{{ route('sampah.index') }}" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Daftar Sampah </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sampah.create') }}" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Tambah Sampah </div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li>
                <a href="javascript:;"
                    class="menu {{ Request::is('dashboard/setoran-sampah*') ? 'menu--active' : null }}">
                    <div class="menu__icon"> <i data-lucide="package-search"></i> </div>
                    <div class="menu__title"> Setoran Sampah <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="{{ Request::is('dashboard/setoran-sampah*') ? 'menu__sub-open' : null }}">
                    <li>
                        <a href="{{ route('setoran_sampah.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Daftar Setoran </div>
                        </a>
                    </li>
                    @if (!auth()->user())
                        <li>
                            <a href="{{ route('setoran_sampah.create') }}" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Tambah Setoran </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            {{-- <li>
                <a href="javascript:;" class="menu {{ Request::is('order*') ? 'menu--active' : null }}">
                    <div class="menu__icon"> <i data-lucide="box"></i> </div>
                    <div class="menu__title"> Order <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="{{ Request::is('order*') ? 'menu__sub-open' : null }}">
                    <li>
                        <a href="{{ route('order.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Daftar Order </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order.create') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Tambah Order </div>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li>
                <a href="javascript:;" class="menu {{ Request::is('invoice*') ? 'menu--active' : null }}">
                    <div class="menu__icon"> <i data-lucide="banknote"></i> </div>
                    <div class="menu__title"> Invoice <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="{{ Request::is('invoice*') ? 'menu__sub-open' : null }}">
                    <li>
                        <a href="{{ route('invoice.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Daftar Invoice </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('invoice.create') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Buat Invoice </div>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li>
                <a href="javascript:;" class="menu {{ Request::is('rekapitulasi*') ? 'menu--active' : null }}">
                    <div class="menu__icon"> <i data-lucide="printer"></i> </div>
                    <div class="menu__title"> Rekapitulasi <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="{{ Request::is('rekapitulasi*') ? 'menu__sub-open' : null }}">
                    <li>
                        <a href="{{ route('rekapitulasi.index') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Daftar Rekapitulasi </div>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
