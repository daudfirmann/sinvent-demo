@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h4 class="font-weight-bold mb-3">EDIT BARANG KELUAR</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.update', $barangKeluar->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL KELUAR</label>
                                <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" name="tgl_keluar" value="{{ old('tgl_keluar', $barangKeluar->tgl_keluar) }}" placeholder="Masukkan Tanggal Keluar Barang">
                           
                                <!-- error message untuk tgl_keluar -->
                                @error('tgl_keluar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUMLAH KELUAR</label>
                                <input type="number" min="0" class="form-control @error('qty_keluar') is-invalid @enderror" name="qty_keluar" value="{{ old('qty_keluar', $barangKeluar->qty_keluar) }}" placeholder="Masukkan Jumlah Keluar Barang">
                           
                                <!-- error message untuk qty_keluar -->
                                @error('qty_keluar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">PILIH BARANG</label>
                                <!-- Input readonly untuk menampilkan nama barang -->
                                <input type="text" class="form-control" value="{{ $barangKeluar->barang->merk }}" readonly>
                                
                                <!-- Input hidden untuk menyimpan nilai barang_id -->
                                <input type="hidden" name="barang_id" value="{{ $barangKeluar->barang_id }}">
                                
                                <!-- error message untuk kategori -->
                                @error('barang_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="{{ route('barangkeluar.index') }}" class="btn btn-md btn-danger">BACK</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection