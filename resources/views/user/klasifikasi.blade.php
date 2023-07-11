@extends('layout.panel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="m-0">Dashboard</h2>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Input Data Klasifikasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('home') }}">
                        @csrf <!-- Add CSRF token for security -->
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Enter ...">
                        </div>

                        <div class="form-group">
                            <label for="teks">Teks Berita</label>
                            <textarea class="form-control" name="teks" rows="10" placeholder="Enter ..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="kategori_asli">Kategori Asli</label>
                            <select id="kategori_asli" name="kategori_asli" class="form-control">
                                @foreach ($kategoriAsliOptions as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Klasifikasikan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
