<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="{{asset('css/blocks/modal.css')}}">
    <link rel="shortcut icon" href="{{asset('img/etc/logo.png')}}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>{{$products[0]->name}} - ООО АПК РусАгроАльянс</title>
</head>
<body>

@include('blocks/header')

@foreach($products as $product)
<div class="product-pic">
    <div class="product-container-main">
        <p style="color: white; font-size: 40px; font-weight: bolder">{{$product->name}}</p>
    </div>
</div>
<div class="product-container">
    <div class="product-main">
        <div class="product-main-left">
            <img src="{{asset($product->img)}}" class="img-product">
        </div>
        <div class="product-main-right">
            <p style="font-size: 25px; font-weight: bolder; margin-top: 10px">{{$product->name}}</p>
            <div class="product-card">
                <form class="form-product-to-basket" data-id="{{$product->id}}" action="{{url('/basket_product/' .  $product->id)}}" method="post">
                    @csrf
                <div class="product-card-1">
                    <p style="font-size: 25px; font-weight: bolder; margin-bottom: 0" id="product-price">{{$product->price}} ₽</p>
                </div>
                <div class="product-card-3">
                    <button class="btn-add-to-basket" type="submit">Добавить в корзину</button>
{{--                    <button class="btn-add-to-basket open_popup_singin" id="open_popup_singin" type="button" ONCLICK="openPopUpAuth()">Добавить в корзину</button>--}}
                </div>
                </form>
            </div>
            <p style="font-size: 20px; font-weight: bolder; margin-top: 15px; margin-bottom: 10px">Описание</p>
            <p style="font-size: 15px; color:gray; width: 100%; display: flex; margin-bottom: 0">{{$product->des}}</p>
        </div>
    </div>
    <div id="modal-success-add-to-basket">
        <div style="font-size: 25px; font-weight: bolder">Товар добавлен в корзину</div>
        <hr>
        <div style="display: flex; justify-content: space-between; height: 125px">
            <img src="{{asset($product->img)}}" style="min-width: 25%; height: 100%">
            <div style="width: 75%; height: 100%; flex-direction: column; align-items: center; padding: 17px">
                <p style="font-size: 20px; margin-bottom: 5px">{{$product->name}}</p>
                <div style="display: flex">
                    <p style="font-size: 15px; color: grey; margin-bottom: 0">Количество:&nbsp;</p>
                    <p style="font-size: 15px; color: grey; margin-bottom: 5px" id="count">1</p>
                </div>
                <div style="display: flex; font-size: 25px; font-weight: bolder">
                    <div class="result-product" style=""></div>
                    <p>&nbsp;₽</p>
                </div>
            </div>
        </div>
        <a href="{{url('/basket')}}"><button class="btn-modal-basket">Перейти в корзину</button></a>
    </div>
    @endforeach
    <div class="also-container">
        <p style="font-size: 35px; font-weight: bolder; margin-bottom: 25px">Похожие товары</p>
        <div class="also-product-container">
            @php($also_products = \App\Models\Product::where('category', $product->category)->get())
            @foreach($also_products as $also_product)
                @if($product->id !== $also_product->id)
            <a href="{{url('/catalog/' . \App\Models\Category::where('id',$products[0]->category)->first()->code . '/' . $also_product->code)}}" class="also-product">
                <div class="also-product-top">
                    <img src="{{asset($also_product->img)}}" alt="" class="also-img-product">
                </div>
                <div class="also-product-end">
                    <p style="font-size: 20px; font-weight: bolder; margin-bottom: 0; height: 60px; overflow: hidden">{{$also_product->name}}</p>
                    <div style="display: flex; flex-flow: column; bottom: 0; width: 100%">
                        <p style=" font-weight: bolder; margin-bottom: 0">{{$also_product->price}} ₽</p>
                    </div>
                </div>
            </a>
               @endif
            @endforeach
        </div>
    </div>
</div>

@include('blocks/footer')

<script src="{{asset('js/jquery-3.6.1.min.js')}}"></script>
<script src="{{asset('js/product-count.js')}}"></script>
<script src="{{asset('js/ajax.js')}}"></script>
<script>
    $(document).ready ( function(){
        let also_product= document.getElementsByClassName('also-product');
        let i;
        for (i = 5; i < also_product.length; i++) {
            also_product[i].style.display = "none";
        }
    });
</script>

</body>
</html>
