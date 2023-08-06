@extends('layouts.admin')
@section('title', 'Tất cả thương hiệu')

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
            <h1>Danh sách thương hiệu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Tất cả thương hiệu</li>
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
                <a href="{{ route('brand.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Thêm</a>
                <a href="{{ route('brand.trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <table class="table table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <th style="width:20px;" class="text-center"> #</th>
                    <th style="width:90px;">Hình ảnh</th>
                    <th>Tên thương hiệu</th>
                    
                    <th class="text-center">Ngày đăng</th>
                    <th class="text-center">Chức năng</th>
                    <th  style="width:20px;" class="text-center">ID</th>
                    {{-- <th style="width: 20%">
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($list_brand as $brand)
                <tr>
                    <td class="text-center"><input type="checkbox"></td>
                    <td><img class="img-fluid" src="{{asset('public/images/brand/'.$brand->image)}}" alt="{{$brand->image}}"></td>
                    <td>{{$brand->name}}</td>
                    
                    <td class="text-center">{{$brand->created_at}}</td>
                    <td class="text-center">
                        @if ($brand->status==1)
                        <a  href="{{ route('brand.status',['brand'=>$brand->id]) }}" class="btn btn-success btn-sm">
                          <i class="fas fa-toggle-on">
                          </i>
                        </a>
                        @else
                        <a  href="{{ route('brand.status',['brand'=>$brand->id]) }}" class="btn btn-danger btn-sm">
                          <i class="fas fa-toggle-off">
                          </i>
                        </a>
                        @endif
                      
                        <a  href="{{ route('brand.show',['brand'=>$brand->id]) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye">
                            </i>
                            
                        </a>
                        <a href="{{ route('brand.edit',['brand'=>$brand->id]) }}" class="btn btn-info btn-sm" >
                            <i class="fas fa-pencil-alt">
                            </i>
                            
                        </a>
                        <a href="{{ route('brand.delete',['brand'=>$brand->id]) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            
                        </a>

                    </td>
                    <td class="text-center">{{$brand->id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
          </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /.card -->
  
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
  @endsection
