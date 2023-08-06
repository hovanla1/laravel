@extends('layouts.admin')
@section('title', 'Tất cả người dùng')

@section('header')
<link rel="stylesheet" href="{{asset ('public/jquery.dataTables.min.css')}}">
@endsection
@section('footer')
<script src="{{asset('public/jquery.dataTables.min.js')}}"></script>
<script>
  let table = new DataTable('#myTable');
</script>
@endsection

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách người dùng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Tất cả người dùng</li>
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
              <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-times"></i>  Xóa</button>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('user.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Thêm</a>
                <a href="{{ route('user.trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <table class="table table-bordered table-striped" id="myTable">
              <thead>
                <tr>
                    <th style="width:20px;" class="text-center">#</th>
                    <th style="width:100px;" class="text-center">Hình ảnh</th>
                    <th style="width:150px;">Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th style="width:160px;" class="text-center">Ngày tạo</th>
                    <th style="width:150px;" class="text-center">Chức năng</th>
                    <th style="width:20px;" class="text-center">ID</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($list_user as $user)
                <tr>
                    <td class="text-center"><input type="checkbox"></td>
                    <td>
                    <img class="img-fluid" src="{{ asset('public/images/user/'.$user->image)}}" alt="{{$user->image}}">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-center">
                      @if ($user->status==1)
                      <a  href="{{ route('user.status',['user'=>$user->id]) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-toggle-on">
                        </i>
                      </a>
                      @else
                      <a  href="{{ route('user.status',['user'=>$user->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-toggle-off">
                        </i>
                      </a>
                      @endif
                    
                      <a  href="{{ route('user.show',['user'=>$user->id]) }}" class="btn btn-primary btn-sm">
                          <i class="fas fa-eye">
                          </i>
                         
                      </a>
                      <a href="{{ route('user.edit',['user'=>$user->id]) }}" class="btn btn-info btn-sm" >
                          <i class="fas fa-pencil-alt">
                          </i>
                          
                      </a>
                      <a href="{{ route('user.delete',['user'=>$user->id]) }}" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash">
                          </i>
                          
                      </a>

                  </td>
                    <td class="text-center">{{ $user->id }}</td>
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
