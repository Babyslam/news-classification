@extends('layout/panel')


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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Klasifikasi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="table-responsive">
      <div class="pagination">
        {{ $beritas->appends(['sort_by_category' => $sortByCategory, 'sort_order' => $sortOrder])->links() }}
    </div>
      <div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
        <thead>
        <tr>
          <th class="sorting sorting_asc" tabindex="0" name="nomor" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nomor</th>
          <th class="sorting sorting_asc" tabindex="0" name="judul" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Judul</th>
          <th class="sorting" tabindex="0" name="teks" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Teks Berita</th>
          <th class="sorting" tabindex="0" name="kategori" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Kategori Asli<a href="{{ route('home', ['sort_by_category' => 'kategori', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}" class="fas fa-sort"></a></th>
          <th class="sorting" tabindex="0" name="kategori" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Kategori</th>
          
          
          <th class="sorting sorting_asc" tabindex="0" name="action" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Action</th>
        </tr>
        <tbody>
       
      @foreach($beritas as $index => $berita)
      <tr>
        <td>{{ ($beritas->currentPage() - 1) * $beritas->perPage() + $index + 1 }}</td>
        <td>{{ $berita->judul }}</td>
        <td>{{ $berita->teks }}</td>
        <td>{{ $berita->kategori_asli }} </td>  
            @foreach ($kategoris[$index] as $kategori)
             
            <td>{{ $kategori->kategori }} </td>
            @endforeach
        
        <td>
          <form action="{{ route('beritas-destroy', $berita->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
      </tbody>
        </thead>
        </table>
  </div>
  <div class="pagination">
    {{ $beritas->appends(['sort_by_category' => $sortByCategory, 'sort_order' => $sortOrder])->links() }}
</div>

  </div>

  @endsection