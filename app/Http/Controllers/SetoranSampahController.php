<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\SetoranSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SetoranSampahController extends Controller
{
    public function index(Request $request)
    {
        $setoran = session()->get('setoran_sampah') ?? collect([]);
        if (!auth()->user()) {
            $setoran = SetoranSampah::whereIn('id', $setoran->map(fn ($data) => $data->id));
        } else {
            $setoran = SetoranSampah::latest();
        }
        $data = [
            'title' => 'Daftar Setoran Sampah',
            'setoran' => $setoran->search($request->get('keyword'))->paginate(5)->withQueryString(),
            'entries' => $setoran->count(),
            'iteration' => !$request->has('page') ? 1 : ($request->get('page') != 1 ? ($request->get('page') - 1) * 5 + 1 : 1)
        ];
        return view('menus.setoran_sampah.index', $data);
    }

    public function detail(Request $request, SetoranSampah $setoran)
    {
        $data = [
            'title' => 'Detail Data Sampah',
            'sampah' => $setoran
        ];

        return view('menus.setoran_sampah.detail', $data);
    }

    public function create(Request $request)
    {
        $data = [
            'title' => 'Tambah Data Sampah',
            'sampah' => Sampah::latest()->get()
        ];

        return view('menus.setoran_sampah.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sampah_id' => 'required|numeric|min:1',
            'jumlah' => 'required|numeric|min:1',
            'nama' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validasi Gagal!');
        }

        $is_created = SetoranSampah::create($validator->validate());
        if ($is_created) {
            $setoran = collect(session()->has('setoran_sampah') ? session()->get('setoran_sampah') : []);
            session()->put('setoran_sampah', $setoran->push($is_created));
            return redirect()->route('setoran_sampah.index')->with('success', 'Setoran sampah berhasil dibuat!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan pada database!<br>setoran gagal dibuat!');
        }
    }

    public function status_diterima(SetoranSampah $setoran)
    {
        if ($setoran->status != 'dibuat') {
            return redirect()->back()->with('error', "aksi tidak diijinkan!");
        }

        if ($setoran->update([
            'status' => 'diterima'
        ])) {
            return redirect()->route('setoran_sampah.index')->with('success', 'Setoran berhasil diupdate!');
        };
        return redirect()->route('setoran_sampah.index')->with('success', 'Setoran gagal diupdate!');
    }
    public function status_uang_diambil(SetoranSampah $setoran)
    {
        if ($setoran->status != 'diterima') {
            return redirect()->back()->with('error', "aksi tidak diijinkan!");
        }

        if ($setoran->update([
            'status' => 'uang_diambil'
        ])) {
            return redirect()->route('setoran_sampah.index')->with('success', 'Setoran berhasil diupdate!');
        };
        return redirect()->route('setoran_sampah.index')->with('success', 'Setoran gagal diupdate!');
    }
}
