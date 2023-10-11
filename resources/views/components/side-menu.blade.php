<nav class="side-nav">
    <ul>
        @if (auth()->user())
            <li>
                <a href="{{ route('dashboard') }}" class="side-menu {{ Request::is('/') ? 'side-menu--active' : null }}">
                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="side-menu__title">
                        Dashboard
                        <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;"
                    class="side-menu {{ Request::is('dashboard/sampah*') ? 'side-menu--active' : null }}">
                    <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                    <div class="side-menu__title">
                        Sampah
                        <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                    </div>
                </a>
                <ul class="{{ Request::is('dashboard/sampah*') ? 'side-menu__sub-open' : null }}">
                    <li>
                        <a href="{{ route('sampah.index') }}"
                            class="side-menu {{ Request::is('dashboard/sampah') ? 'side-menu--active' : null }}">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> Daftar Data Sampah </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sampah.create') }}"
                            class="side-menu {{ Request::is('dashboard/sampah/create') ? 'side-menu--active' : null }}">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> Tambah Data Sampah </div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li>
            <a href="javascript:;"
                class="side-menu {{ Request::is('dashboard/setoran-sampah*') ? 'side-menu--active' : null }}">
                <div class="side-menu__icon"> <i data-lucide="package-search"></i> </div>
                <div class="side-menu__title">
                    Setoran Sampah
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{ Request::is('setoran-sampah*') ? 'side-menu__sub-open' : null }}">
                <li>
                    <a href="{{ route('setoran_sampah.index') }}"
                        class="side-menu {{ Request::is('setoran-sampah') ? 'side-menu--active' : null }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Daftar Setoran </div>
                    </a>
                </li>
                @if (!auth()->user())
                    <li>
                        <a href="{{ route('setoran_sampah.create') }}"
                            class="side-menu {{ Request::is('setoran-sampah/create') ? 'side-menu--active' : null }}">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> Tambah Setoran </div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        {{-- <li>
            <a href="javascript:;" class="side-menu {{ Request::is('order*') ? 'side-menu--active' : null }}">
                <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                <div class="side-menu__title">
                    Order
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{ Request::is('order*') ? 'side-menu__sub-open' : null }}">
                <li>
                    <a href="{{ route('order.index') }}"
                        class="side-menu {{ Request::is('order') ? 'side-menu--active' : null }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Daftar Order </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('order.create') }}"
                        class="side-menu {{ Request::is('order/create') ? 'side-menu--active' : null }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Tambah Order </div>
                    </a>
                </li>
            </ul>
        </li> --}}
        {{-- @if (auth()->user()->role == 'owner')
            <li>
                <a href="javascript:;" class="side-menu {{ Request::is('invoice*') ? 'side-menu--active' : null }}">
                    <div class="side-menu__icon"> <i data-lucide="banknote"></i> </div>
                    <div class="side-menu__title">
                        Invoice
                        <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                    </div>
                </a>
                <ul class="{{ Request::is('invoice*') ? 'side-menu__sub-open' : null }}">
                    <li>
                        <a href="{{ route('invoice.index') }}"
                            class="side-menu {{ Request::is('invoice') ? 'side-menu--active' : null }}">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> Daftar Invoice </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('invoice.create') }}"
                            class="side-menu {{ Request::is('invoice/create') ? 'side-menu--active' : null }}">
                            <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> Buat Invoice </div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif --}}
        {{-- <li>
            <a href="javascript:;" class="side-menu {{ Request::is('rekapitulasi*') ? 'side-menu--active' : null }}">
                <div class="side-menu__icon"> <i data-lucide="printer"></i> </div>
                <div class="side-menu__title">
                    Rekapitulasi
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{ Request::is('rekapitulasi*') ? 'side-menu__sub-open' : null }}">
                <li>
                    <a href="{{ route('rekapitulasi.index') }}"
                        class="side-menu {{ Request::is('rekapitulasi') ? 'side-menu--active' : null }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Daftar Rekapitulasi </div>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>
</nav>
