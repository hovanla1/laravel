@extends('layouts.admin')
@section('title', 'Chi tiết người dùng')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CHI TIẾT NGƯỜI DÙNG</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Chi tiết người dùng</li>
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
                
            </div>
            <div class="col-md-6 text-right">
              <a href="{{ route('user.edit',['user'=>$user->id]) }}" class="btn btn-success btn-sm" >
                <i class="fas fa-pencil-alt"></i>Sửa</a>
            <a href="{{ route('user.delete',['user'=>$user->id]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>Xóa</a>
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-9">
                <table class="table">
                  <tr>
                    <th style="width:200px;">Tên trường</th>
                    <th>Giá trị</th>
                  </tr>
                  <tr>
                    <td>Id</td>
                    <td>{{$user->id}}</td>
                  </tr>
                  <tr>
                    <td>Họ tên khách hàng</td>
                    <td>{{$user->name}}</td>
                  </tr>  
                  <tr>
                    <td>Tên đăng nhập</td>
                    <td>{{$user->username}}</td>
                  </tr>
                  <tr>
                    <td>Số điện thoại</td>
                    <td>{{$user->phone}}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{$user->email}}</td>
                  </tr>
                  <tr>
                    <td>Địa chỉ</td>
                    <td>{{$user->address}}</td>
                  </tr>
                </table>
              </div>
              <div class="col-md-3">
                <table class="table">
                  <tr>
                    <th>Ảnh đại diện</th>
                  </tr>
                  <tr>
                    <td><img class="img-fluid img-thumbnail" src="{{asset('public/images/user/'.$user->image)}}" alt="{{$user->image}}"></td>
                  </tr>
                </table>
              </div>
          </div>           
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
