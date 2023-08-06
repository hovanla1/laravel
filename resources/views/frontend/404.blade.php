<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lỗi 404</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('public/dist/css/adminlte.min.css')}}">

</head>
<body class="hold-transition sidebar-mini">

 <div>
    <div class="error-page">
         <h2 class="headline text-warning" style="margin-top:1px;"> 404</h2>
        <div class="error-content" style="margin-top:70px;">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Website không hoạt động.</h3>
            <p> Chúng tôi không tìm thấy website bạn yêu cầu!!! <br/>
             Vui lòng trở lại <a href="{{URL::to('/')}}">trang chủ</a> hoặc sử dụng thanh tìm kiếm. 
            </p> 
            <form action="{{ route('search.home')}}" method="GET" class="search-form" roles="form">
                <div class="input-group">
                  <input type="text" name="keywordsearch" class="form-control" placeholder="Search">
    
                  <div class="input-group-append">
                    <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div> <!-- /.error-content --> 
       
    </div>
 </div>

<!-- jQuery -->
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/ckfinder/ckfinder.js')}}"></script>
</body>
</html>
