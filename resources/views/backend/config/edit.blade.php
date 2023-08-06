@extends('layouts.admin')
@section('title', 'Chỉnh sửa cấu hình')
@section('content')

<form action="{{ route('postconfig')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chỉnh sửa cấu hình</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa cấu hình</li>
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
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Lưu[Cập nhật]</button>
                <button type="reset" unset class="btn btn-sm btn-warning">Hủy</button>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <div class="row">
                <div class="col-md-7">
                    <div class="mb-3">
                        <label for="name">Tên shop</label>
                        <input type="text" name="shop_name" value="{{ old('shop_name',$config->shop_name) }}" id="shop_name" class="form-control" placeholder="Nhập tên shop"> 
                        @if ($errors->has('shop_name'))
                          <div class="text-danger">{{$errors->first('shop_name')}}</div>
                        @endif 
                    </div>
                    <div class="mb-3">
                      <label for="name">Tên hiển thị ở home</label>
                      <input type="text" name="site_name" value="{{ old('site_name',$config->site_name) }}" id="site_name" class="form-control" placeholder="Nhập tên hiển thị"> 
                      @if ($errors->has('site_name'))
                        <div class="text-danger">{{$errors->first('site_name')}}</div>
                      @endif 
                  </div>
                    <div class="mb-3">
                        <label for="metakey">Từ khóa</label>
                        <input type="text" name="metakey" value="{{ old('metakey',$config->metakey) }}" id="metakey" class="form-control" placeholder="Nhập từ khóa"> 
                        @if ($errors->has('metakey'))
                        <div class="text-danger">{{$errors->first('metakey')}}</div>
                      @endif 
                    </div>
                    <div class="mb-3">
                        <label for="metadesc">Mô tả</label>
                        <textarea name="metadesc" id="metadesc" class="form-control"
                        placeholder="Nhập mô tả">{{ old('metadesc',$config->metadesc) }}</textarea>
                        @if ($errors->has('metadesc'))
                        <div class="text-danger">{{$errors->first('metadesc')}}</div>
                      @endif 
                    </div>
                    <div class="mb-3">
                      <label for="address">Địa chỉ</label>
                      <textarea name="address" id="address" class="form-control"
                      placeholder="Nhập địa chỉ">{{ old('address',$config->address) }}</textarea>
                      @if ($errors->has('address'))
                      <div class="text-danger">{{$errors->first('address')}}</div>
                    @endif 
                    </div> 
                    <div class="mb-3">
                      <label for="author">Tác giả</label>
                      <input type="text" name="author" value="{{ old('author',$config->author) }}" id="author" class="form-control" placeholder="Nhập tên tác giả"> 
                      @if ($errors->has('author'))
                      <div class="text-danger">{{$errors->first('author')}}</div>
                    @endif 
                  </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                      <label for="phone">Số điện thoại</label>
                      <input type="text" name="phone" value="{{ old('phone',$config->phone) }}" id="phone" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"class="form-control" placeholder="Nhập số điện thoại"> 
                      @if ($errors->has('phone'))
                      <div class="text-danger">{{$errors->first('phone')}}</div>
                    @endif 
                    </div> 
                    <div class="mb-3">
                      <label for="email">Email</label>
                      <input type="text" name="email" value="{{ old('email',$config->email) }}" id="email" class="form-control" placeholder="Nhập email"> 
                      @if ($errors->has('email'))
                      <div class="text-danger">{{$errors->first('email')}}</div>
                    @endif 
                    </div> 
                    <div class="mb-3">
                      <label for="facebook">Facebook</label>
                      <input type="text" name="facebook" value="{{ old('facebook',$config->facebook) }}" id="facebook" class="form-control" placeholder="Nhập facebook">
                    </div> 
                    <div class="mb-3">
                      <label for="twitter">Twitter</label>
                      <input type="text" name="twitter" value="{{ old('twitter',$config->twitter) }}" id="twitter" class="form-control" placeholder="Nhập twitter">
                    </div> 
                    <div class="mb-3">
                      <label for="instagram">Instagram</label>
                      <input type="text" name="instagram" value="{{ old('instagram',$config->instagram) }}" id="instagram" class="form-control" placeholder="Nhập instagram">
                    </div> 
                    
                    <div class="mb-3">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control-file">  
                    </div>     
                </div>          
            </div>


        </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /.card -->
  
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</form>

  @endsection
