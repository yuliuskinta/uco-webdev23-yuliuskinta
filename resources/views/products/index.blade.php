<x-template title="Product List">
    <div class="row">
    @foreach($data as $item)
    <div class="col-3">
    <x-product-card name="{{ $item['name'] }}" price="{{$item['price']}}" image="{{$item['image']}}"></x-product-card>
    </div>
    @endforeach

    @for($i = 1; $i <=10; $i++)
    <div class="col-3">
        <x-product-card name="{{ $item['name'] }}" price="{{$item['price']}}" image="{{$item['image']}}"></x-product-card>
        </div>
    @endfor
    </div>
</x-template>
