@extends('layouts.admin')
@section('title', 'Thêm bài viết')
@section('footer')
<script>
  CKEDITOR.replace('metadesc');
  CKEDITOR.replace('detail');
</script>
@endsection

@section('content')

<form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm bài viết</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Thêm bài viết</li>
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
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Lưu[Thêm]</button>
                <a href="{{ route('post.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="title">Tiêu đề bài viết</label>
                        <input type="text" name="title" value="{{ old('title') }}"" id="name" class="form-control" placeholder="Nhập tiêu đề bài viết"> 
                        @if ($errors->has('title'))
                          <div class="text-danger">{{$errors->first('title')}}</div>
                        @endif 
                    </div>
                    <div class="mb-3">
                      <label for="metakey">Từ khóa</label>
                      <textarea name="metakey" id="metakey" class="form-control"
                      placeholder="Từ khóa tìm kiếm">{{ old('metakey') }}</textarea>
                      @if ($errors->has('metakey'))
                      <div class="text-danger">{{$errors->first('metakey')}}</div>
                    @endif 
                  </div>
                  <div class="mb-3">
                      <label for="metadesc">Mô tả</label>
                      <textarea name="metadesc" id="metadesc" class="form-control"
                      placeholder="Nhập mô tả">{{ old('metadesc') }}</textarea>
                      @if ($errors->has('metadesc'))
                      <div class="text-danger">{{$errors->first('metadesc')}}</div>
                      @endif
                  </div>
                    <div class="mb-3">
                      <label for="detail">Nội dung bài viết</label>
                      <textarea name="detail" rows="5" id="detail" class="form-control" 
                      placeholder="Nội dung bài viết">{{ old('detail') }}</textarea>
                      @if ($errors->has('detail'))
                      <div class="text-danger">{{$errors->first('detail')}}</div>
                    @endif 
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label for="topic_id">Chủ đề bài viết</label>
                    <select name="topic_id" id="topic_id" name="topic_id" class="form-control">
                      <option value="0">--Chủ đề bài viết--</option>
                        {{!! $html_topic_id !!}}
                    </select>
                </div> 
                    <div class="mb-3">
                        <label for="images">Hình ảnh</label>
                        <input type="file" name="" id="images" class="form-contimagesrol-file"> 
                        @if ($errors->has('images'))
                        <div class="text-danger">{{$errors->first('images')}}</div>
                      @endif 
                    </div> 
                    <div class="mb-3">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" name="status" class="form-control">
                            <option value="1">Xuất bản</option>
                            <option value="2">Chưa xuất bản</option>
                        </select>
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
