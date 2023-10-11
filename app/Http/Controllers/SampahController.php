<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SampahController extends Controller
{
    public function index(Request $request)
    {
        $sampah = Sampah::latest();
        $data = [
            'title' => 'Daftar Data Sampah',
            'sampah' => $sampah->paginate(10)->withQueryString(),
            'entries' => $sampah->count()
        ];

        return view('menus.sampah.index', $data);
    }

    public function detail(Request $request, Sampah $sampah)
    {
        $data = [
            'title' => 'Detail Data Sampah',
            'sampah' => $sampah
        ];

        return view('menus.sampah.detail', $data);
    }

    public function create(Request $request)
    {
        $data = [
            'title' => 'Tambah Data Sampah',
        ];

        return view('menus.sampah.create', $data);
    }
    public function update(Request $request, Sampah $sampah)
    {
        $data = [
            'title' => 'Ubah Data Sampah',
            'sampah' => $sampah
        ];

        return view('menus.sampah.update', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'harga_kg' => 'required|numeric|min:1',
            'gambar' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validasi Gagal!');
        }

        $is_created = Sampah::create($validator->validate());
        if ($is_created) {
            $is_created->gambar()->create([
                'src' => $request->file('gambar')->store('sampah'),
                'alt' => "gambar data sampah $is_created->nama"
            ]);
            return redirect()->route('sampah.index')->with('success', 'Data sampah baru berhasil dibuat!');
        }
        return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan pada database!<br>Data sampah gagal dibuat!');
    }
    public function patch(Request $request, Sampah $sampah)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'harga_kg' => 'required|numeric|min:1',
            'gambar' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validasi Gagal!');
        }

        $is_updated = $sampah->update($validator->validate());
        if ($is_updated) {
            if ($request->has('gambar')) {
                $sampah->gambar()->update([
                    'src' => $request->file('gambar')->store('sampah'),
                    'alt' => "gambar data sampah " . $request->get('nama')
                ]);
            }
            return redirect()->route('sampah.detail', ['sampah' => $sampah])->with('success', 'Data sampah berhasil diubah!');
        }
        return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan pada database!<br>Data sampah gagal diubah!');
    }
    public function delete(Sampah $sampah)
    {
        if ($sampah->delete()) {
            return redirect()->route('sampah.index')->with('success', 'Data sampah berhasil dihapus!');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan pada database!<br>Data sampah gagal dihapus!');
    }
}
