@extends('layouts.user')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Daftar Data Setoran
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            @if (!auth()->user())
                <a href="{{ route('setoran_sampah.create') }}" class="btn btn-primary shadow-md mr-2">Setorkan Sampah</a>
            @endif
            <div class="hidden md:block mx-auto text-slate-500">Menampilkan 1 hingga 10 dari {{ $entries }} entri</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form method="GET" class="w-56 relative text-slate-500">
                    <input name="keyword" type="text" class="form-control w-56 box pr-10"
                        placeholder="Cari Sampah / Nama...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </form>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap text-center">NO</th>
                        <th class="text-center whitespace-nowrap">NAMA</th>
                        <th class="whitespace-nowrap text-center">JENIS SAMPAH</th>
                        <th class="text-center whitespace-nowrap">JUMLAH</th>
                        <th class="text-center whitespace-nowrap">HARGA /KG</th>
                        <th class="text-center whitespace-nowrap">HASIL</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        @if (auth()->user())
                            <th class="text-center whitespace-nowrap">ACTION</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($setoran as $data)
                        <tr class="intro-x">
                            <td class="text-center">{{ $iteration++ }}</td>
                            <td class="text-center">{{ $data->nama }}</td>
                            <td class="text-center">{{ $data->jenis_sampah }}</td>
                            <td class="text-center">{{ number_format($data->jumlah) }} Kg</td>
                            <td class="text-center">{{ 'Rp. ' . number_format($data->sampah->harga_kg) }}</td>
                            <td class="text-center">{{ 'Rp. ' . number_format($data->hasil) }}</td>
                            <td class="text-center">{{ $data->status }}</td>
                            @if (auth()->user())
                                <td class="text-center">
                                    <div class="flex justify-center items-center gap-2">
                                        @switch($data->status)
                                            @case('dibuat')
                                                <a class="flex items-center" href="javascript:;" data-tw-toggle="modal"
                                                    onclick="status_terima_form({{ $data->id }})"
                                                    data-tw-target="#status-diterima-confirmation-modal">
                                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                                    Terima Setoran </a>
                                            @break

                                            @case('diterima')
                                                <a class="flex items-center" href="javascript:;" data-tw-toggle="modal"
                                                    onclick="status_uang_diambil_form({{ $data->id }})"
                                                    data-tw-target="#status-uang-diambil-confirmation-modal">
                                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Uang Diberikan
                                                </a>
                                            @break

                                            @default
                                        @endswitch

                                    </div>
                                </td>
                            @endif
                        </tr>

                        @empty
                            <tr>
                                <td colspan="{{ !auth()->user() ? 7 : 8 }}" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->

            {{-- BEGIN: Pagination --}}
            {{ $setoran->links('pagination::tailwind') }}
            {{-- END: Pagination --}}

        </div>
        <!-- BEGIN: Status diterima Confirmation Modal -->
        <div id="status-diterima-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-alert" class="w-16 h-16 text-warning mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Apa Kamu Yakin?</div>
                            <div class="text-slate-500 mt-2">
                                Yakin menerima setoran sampah?
                                <br>
                                Proses ini tidak dapat dibatalkan
                            </div>
                        </div>
                        <form id="status-diambil-form" class="px-5 pb-8 text-center" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Batal</button>
                            <button type="submit" class="btn btn-warning text-warning w-24">Yakin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Status diterima Confirmation Modal -->
        <!-- BEGIN: Status uang diambil Confirmation Modal -->
        <div id="status-uang-diambil-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-alert" class="w-16 h-16 text-warning mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Apa Kamu Yakin?</div>
                            <div class="text-slate-500 mt-2">
                                Yakin memberikan uang setoran sampah kepada user?
                                <br>
                                Proses ini tidak dapat dibatalkan
                            </div>
                        </div>
                        <form id="status-uang-diterima-form" class="px-5 pb-8 text-center" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Batal</button>
                            <button type="submit" class="btn btn-warning text-warning w-24">Yakin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Status uang diambil Confirmation Modal -->
    @endsection

    @push('scripts')
        <script>
            function status_terima_form(sampah_id) {
                const newAction = `setoran-sampah/update/${sampah_id}/diterima`;
                document.getElementById('status-diambil-form').setAttribute('action', newAction);
                console.log(document.getElementById('status-diambil-form').getAttribute('action'));
            }

            function status_uang_diambil_form(sampah_id) {
                const newAction = `setoran-sampah/update/${sampah_id}/uang_diambil`;
                document.getElementById('status-uang-diterima-form').setAttribute('action', newAction);
                console.log(document.getElementById('status-uang-diterima-form').getAttribute('action'));
            }
        </script>
    @endpush
