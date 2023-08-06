@extends('layouts.admin')
@section('title', 'Thùng rác menu')
@section('content')

@section('header')
<link rel="stylesheet" href="{{asset ('public/jquery.dataTables.min.css')}}">
@endsection
@section('footer')
<script src="{{asset('public/jquery.dataTables.min.js')}}"></script>
<script>
  let table = new DataTable('#myTable');
</script>
@endsection

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thùng rác menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Thùng rác menu</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
            {{-- <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-times"></i> Xóa</button> --}}
          </div>
          <div class="col-md-6 text-right">
            <a href="{{ route('menu.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
          </div>
        </div>
      </div>
      <div class="card-body">
          @includeIf('backend.message_alert')
          <table class="table table-bordered table-striped" id="myTable">
          <thead>
              <tr>
                  <th style="width:20px;" class="text-center"> #</th>
                  <th>Tên Menu</th>
                  <th>Liên kết </th>
                  <th style="width:160px;" class="text-center">Vị trí</th>
                  <th style="width:100px;" class="text-center">Chức năng</th>
                  <th  style="width:20px;" class="text-center">ID</th>
                  {{-- <th style="width: 20%">
                  </th> --}}
              </tr>
          </thead>
          <tbody>
            @foreach ($list_menu as $menu)
            <tr>
              <td class="text-center"><input type="checkbox"></td>
                <td>{{$menu->name}}</td>
                <td>{{$menu->link}}</td>
                <td class="text-center">{{$menu->position}}</td>
                <td class="text-center">
                  <a href="{{ route('menu.restore',['menu'=>$menu->id]) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-trash-restore"></i></a>
                  <a href="{{ route('menu.destroy',['menu'=>$menu->id]) }}" class="btn btn-danger btn-sm">
                    <i class="fas fa-ban"></i></a>
                </td>
                <td class="text-center">{{$menu->id}}</td>
            </tr>
            @endforeach

          </tbody>
          </table>
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection