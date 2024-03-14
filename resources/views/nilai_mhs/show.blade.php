@extends('layouts.app')
@section('title', 'Detail Nilai Mahasiswa')
@section('content_header')
    <h1 class="m-0">Detail Nilai Mahasiswa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach(['nama', 'nim', 'jurusan', 'matakuliah', 'kota', 'provinsi'] as $field)
                    <div class="col-md-3">
                        <h5>{{ $field }}:</h5>
                    </div>
                    <div class="col-md-9">
                        @php
                            $value = '';
                            if ($field === 'matakuliah' && !empty($Nilai_mhs->$field)) {
                                $value = $Nilai_mhs->$field->nama . ' (Nilai: ' . $Nilai_mhs->$field->nilai . ')';
                            } elseif ($field === 'jurusan' && !empty($Nilai_mhs->$field)) {
                                $value = $Nilai_mhs->$field->nama;
                            } else {
                                $value = $Nilai_mhs->$field ?? 'Data tidak ditemukan';
                            }
                        @endphp
                        <p>{{ $value }}</p>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('nilai_mhs.index') }}" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
@stop
