@extends('layouts.user')

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Tambah Setoran Sampah
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('setoran_sampah.store') }}" method="POST" class="intro-y box p-5">
                @csrf
                <div class="">
                    <label for="input-sampah-id" class="form-label flex justify-between">
                        <p>Jenis Sampah</p>
                        @error('sampah_id')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                    <select name="sampah_id" id="input-sampah-id" class="tom-select">
                        @foreach ($sampah as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="input-jumlah" class="form-label flex justify-between">
                        <p>Jumlah (kg)</p>
                        @error('jumlah')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                    <input id="input-jumlah" name="jumlah" type="text" class="form-control" value="{{ old('jumlah') }}"
                        placeholder="masukan jumlah setoran (kg)">
                </div>
                <div class="mt-3">
                    <label for="input-nama" class="form-label flex justify-between">
                        <p>Nama</p>
                        @error('nama')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                    <input id="input-nama" name="nama" type="text" class="form-control" value="{{ old('nama') }}"
                        placeholder="masukan nama penyetor">
                </div>
                <div class="text-right mt-5">
                    <a href="{{ route('setoran_sampah.index') }}" class="btn btn-outline-secondary w-24 mr-1">Kembali</a>
                    <button type="submit" class="btn btn-primary text-primary w-24">Setorkan</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;

                for (var i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        document.querySelector(placeToInsertImagePreview).src = event.target.result;
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        }

        function imageTriggerInput() {
            document.querySelector('#input-gambar').click();
        }

        document.querySelector('#input-gambar').addEventListener('change', function() {
            previewImage(this, '#image-preview');
        });
    </script>
@endpush
