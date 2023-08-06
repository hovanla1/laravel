@if (count($list_topic)>0)
<div>
    <h2>Chủ đề</h2>
    <div class="panel-group category-products" id="accordian"><!--brand-product-->
        @foreach ($list_topic as $topic)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{route('slug.home',['slug'=>$topic->slug])}}">{{$topic->name}}</a></h4>
            </div>
        </div>
        @endforeach
    </div><!--/brand-product-->
</div>
@endif
