{{-- <div class="row">
  @php
  $product_store= $product->productstore;
  $price= $product_store->price ?? "";
  $qty= $product_store->qty ?? "";
@endphp

    <div class="col-md-12">
        <div class="mb-3">
            <label for="price">Giá nhập kho</label>
            <input type="text" name="price" value="{{ $price }}" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="price" class="form-control" placeholder="Giá nhập"> 
            @if ($errors->has('price'))
              <div class="text-danger">{{$errors->first('price')}}</div>
            @endif 
        </div>
        <div class="mb-3">
            <label for="qty">Số lượng</label>
            <input type="number" name="qty" value="{{ $qty }}" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="qty" class="form-control" placeholder="Nhập số lượng"> 
            @if ($errors->has('qty'))
              <div class="text-danger">{{$errors->first('qty')}}</div>
            @endif 
        </div>
    </div>
</div> --}}

<div class="row">
  @php
  $price= $product_store->price ?? "";
  $qty= $product_store->qty ?? "";
@endphp

    <div class="col-md-12">
        <div class="mb-3">
            <label for="price">Giá nhập kho</label>
            <input type="text" name="price" value="{{ old('price', $price) }}" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="price" class="form-control" placeholder="Giá nhập"> 
            @if ($errors->has('price'))
              <div class="text-danger">{{$errors->first('price')}}</div>
            @endif 
        </div>
        <div class="mb-3">
            <label for="qty">Số lượng</label>
            <input type="number" name="qty" value="{{ old('qty', $qty) }}" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="qty" class="form-control" placeholder="Nhập số lượng"> 
            @if ($errors->has('qty'))
              <div class="text-danger">{{$errors->first('qty')}}</div>
            @endif 
        </div>
    </div>
</div>
