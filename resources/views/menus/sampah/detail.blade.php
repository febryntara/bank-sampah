@extends('layouts.dashboard')

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Detail Data Sampah
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5" enctype="multipart/form-data">
                <div class="">
                    <label for="input-nama" class="form-label flex justify-between">
                        <p>Jenis Sampah</p>
                        @error('nama')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                    <input id="input-nama" name="nama" type="text" class="form-control"
                        value="{{ old('nama') ?? $sampah->nama }}" placeholder="masukan jenis sampah"
                        value="{{ $sampah->nama }}" readonly>
                </div>
                <div class="mt-3">
                    <label for="" class="form-label flex justify-between">
                        <p>Pilih Gambar Sampah</p>
                        @error('gambar')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                    <img id="image-preview" class="rounded-md object-contain w-full lg:w-1/2 h-max-[180px]"
                        src="{{ $sampah->gambar ? $sampah->gambar->path : 'https://iaingawi.ac.id/site/wp-content/uploads/2023/07/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg' }}"
                        alt="bank sampah">
                    {{-- <x-input-form name="image" placeholder="pilih gambar" label="Gambar Sampah" input-type="default"
                        type="file" extend-class="" id="input-image" /> --}}
                    <input id="input-gambar" name="gambar" type="file"
                        class="form-control h-[0px] w-[0px] overflow-hidden" placeholder="pilih gambar sampah" readonly>
                </div>
                <div class="mt-3">
                    <label for="input-nama" class="form-label flex justify-between">
                        <p>Deskripsi</p>
                        @error('deskripsi')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                    <div name="deskripsi" id="input-deskripsi"
                        class="w-full min-h-[70px] p-2 border border-slate-200 bg-slate-100">
                        {{ $sampah->deskripsi }}</div>
                </div>
                <div class="mt-3">
                    <label for="input-harga_kg" class="form-label flex justify-between">
                        <p>Harga Sampah per Kg</p>
                        @error('harga_kg')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                    <input id="input-harga_kg" name="harga_kg" type="text" class="form-control"
                        value="{{ old('harga_kg') ?? $sampah->harga_kg }}" placeholder="masukan harga sampah per kg"
                        readonly>
                </div>
                <div class="text-right mt-5">
                    <a href="{{ route('sampah.index') }}" class="btn btn-outline-secondary w-24 mr-1">Kembali</a>
                    <a href="{{ route('sampah.update', ['sampah' => $sampah]) }}"
                        class="btn btn-outline-secondary w-24 mr-1">Update</a>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
