@extends('layouts.dashboard')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Daftar Data Sampah
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('sampah.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Data</a>
            <div class="hidden md:block mx-auto text-slate-500">Menampilkan 1 hingga 10 dari {{ $entries }} entri</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form method="GET" class="w-56 relative text-slate-500">
                    <input name="keyword" type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </form>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">NO</th>
                        <th class="whitespace-nowrap">JENIS SAMPAH</th>
                        <th class="text-center whitespace-nowrap">DESKRIPSI</th>
                        <th class="text-center whitespace-nowrap">HARGA KILOAN</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sampah as $data)
                        <tr class="intro-x">
                            <td class="text-left">{{ $iteration++ }}</td>
                            <td class="text-left">{{ $data->nama }}</td>
                            <td class="text-center">{{ Str::words(strip_tags($data->deskripsi), 3, '...') }}</td>
                            <td class="text-center">{{ 'Rp. ' . number_format($data->harga_kg) }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3"
                                        href="{{ route('sampah.detail', ['sampah' => $data]) }}">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                        Detail </a>
                                    <a class="flex items-center mr-3"
                                        href="{{ route('sampah.update', ['sampah' => $data]) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                        onclick="sampahFormActionChanger({{ $data->id }})"
                                        data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

        {{-- BEGIN: Pagination --}}
        {{ $sampah->links('pagination::tailwind') }}
        {{-- END: Pagination --}}

    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Apa Kamu Yakin?</div>
                        <div class="text-slate-500 mt-2">
                            Yakin ingin menghapus data ini?
                            <br>
                            Proses ini tidak dapat dibatalkan
                        </div>
                    </div>
                    <form id="sampah-delete-form" class="px-5 pb-8 text-center" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Batal</button>
                        <button type="submit" class="btn btn-danger text-danger w-24">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection

@push('scripts')
    <script>
        function sampahFormActionChanger(sampah_id) {
            const newAction = `sampah/delete/${sampah_id}`;
            document.getElementById('sampah-delete-form').setAttribute('action', newAction);
            console.log(document.getElementById('sampah-delete-form').getAttribute('action'));
        }
    </script>
@endpush
