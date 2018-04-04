<!-- create.blade.php -->

@extends('master')
@section('content')
<div class="container">
  <form id="frmUsers" name="frmUsers" class="form-horizontal" novalidate="">
    <div class="form-group row">
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">UUID</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="uuid_" name="uuid_" placeholder="uuid" value={{$uuid}} disabled>
        <input type="hidden" class="form-control form-control-lg" id="uuid" name="uuid" value="{{$uuid}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="nama" placeholder="masukkan nama...." name="nama">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
      <div class="col-sm-10">
        <textarea id="alamat" name="alamat" placeholder="masukkan alamat...." rows="8" cols="80"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="button" class="btn btn-primary" id="btn-save_nomodal" value="add">Save changes</button>
      <input type="hidden" id="uuid" name="uuid" >
    </div>
  </form>
</div>
@endsection