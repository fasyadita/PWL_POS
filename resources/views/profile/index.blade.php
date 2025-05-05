@extends('layouts.template')
 
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                 </div>
             @endif
         </div>
         <div class="col-md-3">
             <!-- Profile Image -->
             <div class="card card-primary card-outline">
                 <div class="card-body box-profile">
                     <div class="text-center">
                        @if(auth()->user()->foto_profil)
                            {{-- <img src="{{ asset('images/' . auth()->user()->foto_profil) }}" alt="User profile picture" class="img-circle"> --}}
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/' . auth()->user()->foto_profil) }}"
                                alt="User profile picture" style="width: 209px; height: 209px;">
                        @else
                            <img src="{{ Avatar::create(auth()->user()->nama)->toBase64() }}" alt="User profile picture" class="img-circle">
                        @endif
                     </div>
 
                     <h3 class="profile-username text-center">{{ $user->nama }}</h3>
                     <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('foto_profil') is-invalid @enderror"
                                    id="foto_profil" name="foto_profil" accept="image/*">
                                <label class="custom-file-label" for="foto_profil">Pilih file</label>
                                @error('foto_profil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Foto Profil</button>
                    </form>
                    
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </div>
         <!-- /.col -->
         <!-- /.card-header -->
    
         <div class="col-md-9">
            <div class="card card-primary card-outline">
                 <div class="card-header">
                     <h3 class="card-title">Profile</h3>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body">
                         @csrf
                         @method('PUT')
 
                         <div class="form-group">
                             <label for="username">Username</label>
                             <input type="text" class="form-control @error('username') is-invalid @enderror"
                                 id="username" name="username" value="{{ old('username', $user->username) }}">
                             @error('username')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
 
                         <div class="form-group">
                             <label for="nama">Nama</label>
                             <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                 name="nama" value="{{ old('nama', $user->nama) }}">
                             @error('nama')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
 
                         <div class="form-group">
                             <label for="level">Level Pengguna</label>
                             <input type="text" class="form-control" value="{{ $user->level->level_nama }}" disabled>
                         </div>
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </div>
         <!-- /.col -->
     </div>
     <!-- /.row -->
 @endsection