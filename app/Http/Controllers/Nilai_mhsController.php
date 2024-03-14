<?php

namespace App\Http\Controllers;

use App\Exports\Nilai_mhsExport;
use App\Models\Jurusan;
use App\Models\Matakuliah;
use App\Models\Nilai_mhs;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Nilai_mhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $ar_nilai_mhs = DB::table('nilai_mhs')
        ->join('jurusan', 'jurusan.id', '=', 'nilai_mhs.jurusan_id')
        ->join('matakuliah', 'matakuliah.id', '=', 'nilai_mhs.matakuliah_id')
        ->select('nilai_mhs.*', 'jurusan.nama AS jur', 'matakuliah.nama AS mat')
        ->paginate(5); // Menambahkan pagination dengan 10 item per halaman

    return view('nilai_mhs.index', compact('ar_nilai_mhs'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_jurusan = Jurusan::all();
        $ar_matakuliah = Matakuliah::all();

        return view('nilai_mhs.create', compact('ar_jurusan', 'ar_matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'jurusan_id' => 'required|numeric',
            'kota' => 'required|string',
            'provinsi' => 'required|string',
            'matakuliah_id' => 'required|numeric',
        ]);
        Nilai_mhs::create($request->all());

        return redirect()->route('nilai_mhs.index')
            ->with('success', 'Data nilai mahasiswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Nilai_mhs = Nilai_mhs::with('jurusan', 'matakuliah')->find($id);
        return view('nilai_mhs.show', compact('Nilai_mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Nilai_mhs = Nilai_mhs::find($id);
        $ar_jurusan = DB::table('jurusan')->get();
        $ar_matakuliah = DB::table('matakuliah')->get(); 

    return view('nilai_mhs.edit', compact('Nilai_mhs', 'ar_jurusan', 'ar_matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'jurusan_id' => 'required|numeric',
            'kota' => 'required|string',
            'provinsi' => 'required|string',
            'matakuliah_id' => 'required|numeric',
        ]);

        $Nilai_mhs = Nilai_mhs::find($id);
        $Nilai_mhs->update($request->all());

        return redirect()->route('nilai_mhs.index')
            ->with('success', 'Data nilai mahasiswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Nilai_mhs = Nilai_mhs::find($id);
        $Nilai_mhs->delete();

        return redirect()->route('nilai_mhs.index')
            ->with('success', 'Data nilai mahasiswa deleted successfully.');
    }

    public function nilai_mhsPDF()
    {
        $ar_nilai_mhs = DB::table('nilai_mhs')
            ->join('jurusan', 'jurusan.id', '=', 'nilai_mhs.jurusan_id')
            ->join('matakuliah', 'matakuliah.id', '=', 'nilai_mhs.matakuliah_id')
            ->select('nilai_mhs.*', 'jurusan.nama AS jur', 'matakuliah.nama AS mat')
            ->get();
    
        $pdf = PDF::loadView('nilai_mhs/nilai_mhsPDF', ['ar_nilai_mhs' => $ar_nilai_mhs]);
        return $pdf->download('datanilai_mhs.pdf');
    }

    public function nilai_mhscsv()
    {
    return Excel::download(new Nilai_mhsExport, 'buku.csv');
    }
    
}
