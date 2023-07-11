@extends('loginlayout/panel')

@section('contents')

<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <a href="{{route ('register')}}" class="h1"><b>Klasifikasi Kategori Berita</b></a>
  </div>

<div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register Akun</p>
      
      <form action="{{ route('register-proses') }}" method="post">
        @csrf
        @error('name')
            <small>{{ $message }}</small>
        @enderror 
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{  old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
 
        @error('email')
            <small>{{ $message }}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{  old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        @error('password')
            <small>{{ $message }}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">Sudah Punya Akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
</div>

@endsection