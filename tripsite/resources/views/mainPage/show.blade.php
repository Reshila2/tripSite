<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Cent.kz </title>
    <meta name="description" content="Описание страницы">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <meta name="theme-color" content="#FBCC21">
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="CENT" />
    <meta property="og:image" content="Сюда вставить вашу картинку" />
    <meta property="og:title" content="Ваш заголовок" />
    <meta property="og:url" content="Ваш URL страницы" />
    <meta property="og:description" content="Ваше описание" />
</head>

<body>
@include('layouts/show_header')

<section class="item-page">
    <div class="container">


            <div class="item-inside">
                <a href="javascript:void(0)" onclick="window.history.back()">Назад</a><br><br>
                <div class="item_top">
                    <img src="{{ asset($post-> img) }}" alt="Товар" class="item-inside_img">
                    <div class="item-inside_content">
                        <p> {{ $post->subtitle }}</p>
                        <h1>{{ $post->title }}</h1>
                        <p> {{ $post->text }}</p>
                        <div class="item-rating">
                            <input type="radio" id="star-5" name="rating" value="5">
                            <label for="star-5" title="Оценка «5»"><i class="icon-star"></i></label>
                            <input type="radio" id="star-4" name="rating" value="4">
                            <label for="star-4" title="Оценка «4»"><i class="icon-star"></i></label>
                            <input type="radio" id="star-3" name="rating" value="3">
                            <label for="star-3" title="Оценка «3»"><i class="icon-star"></i></label>
                            <input type="radio" id="star-2" name="rating" value="2">
                            <label for="star-2" title="Оценка «2»"><i class="icon-star"></i></label>
                            <input type="radio" id="star-1" name="rating" value="1">
                            <label for="star-1" title="Оценка «1»"><i class="icon-star"></i></label>
                        </div>

                        <div class="counts">
                            <span class="count-minus" onclick="minusCount()">-</span>
                            <span class='count-total' id="num-count"></span>
                            <span class="count-plus" onclick="addCount()">+</span>
                        </div>

                        <br>
                        <span class="price">Итого: <span id="priceValueCount">{{ $post->price }}</span> тг.</span>
                        <br>
                        <br>

                        <a class="btn-order_inside"  href="{{ route('mainPage.cart', ['id'=>$post->id]) }}">Заказать</a>

                        <div class='item-buttons'>
                            <div class="add-favorite"><i class="icon-hearth-stroke"></i>
                                <p class='favorite-text'>Добавить в избранное</p>
                            </div>
                            <div class="add-basket"><i class="icon-basket"></i>
                                <p class='text-basket'>Добавить в корзину</p>
                            </div>
                        </div>
                    </div>
                </div>

                </p>
                <div class="item-content_tabs">
                    <div class="item-content_tab active">Описание</div>
                    <div class="item-content_tab">Отзывы</div>
                    <div class="item-content_tab">Вопросы и ответы</div>
                </div>
                <p>{{ $post->productDescription }}.</p>
                <div class="item-content_tab-content">
                </div>

            </div>
    </div>
</section>
@extends('layouts/footer')
@extends('layouts/form')
<script>
    try {
        const plus = document.querySelector(".count-plus");
        const minus = document.querySelector(".count-minus");
        const total = document.querySelector(".count-total");

        let count = 1;

        total.textContent = count;

        plus.addEventListener("click", () => {
            if (count >= 1) {
                total.textContent = ++count;
            }
        });

        minus.addEventListener("click", () => {
            if (count > 1) {
                total.textContent = --count;
            }
        });
    } catch {}

    const addFavorite = document.querySelector(".add-favorite");
    const favoriteIcon = document.querySelector(".add-favorite i");
    const favoriteText = document.querySelector(".favorite-text");

    try {
        addFavorite.addEventListener("click", (e) => {
            favoriteIcon.classList.toggle("icon-hearth-stroke");
            favoriteIcon.classList.toggle("icon-hearth");
            if (favoriteIcon.classList.contains("icon-hearth")) {
                addFavoriteModal();
                favoriteText.textContent = "Удалить из избранного";
            } else {
                favoriteIcon.classList.remove("added");
                deleteFavoriteModal();
                favoriteText.textContent = "Добавить в избранное";
            }
        });
    } catch {}

    const addBasket = document.querySelector(".add-basket");
    const textBasket = document.querySelector(".text-basket");

    try {
        addBasket.addEventListener("click", () => {
            if (!addBasket.classList.contains("added")) {
                addBasket.classList.add("added");
                addBasketModal();
                textBasket.innerHTML = "Удалить из корзины";
            } else {
                addBasket.classList.remove("added");
                deleteBasketModal();
                textBasket.innerHTML = "Добавить в корзину";
            }
        });
    } catch {}


    var count = 1;
    var countprice = {{$post->price}};
    var countEl = document.getElementById("num-count");

    var priceEl = document.getElementById("priceValueCount");
    priceEl.innerHTML = countprice;

    function addCount() {
        if (count < 10) {
            count++;
            countEl.value = count;
            const a = countEl.value;
            const x = countprice * a;
            priceEl.innerHTML = x;
        }
    }

    function minusCount() {
        if (count > 1) {
            count--;
            countEl.value = count;
            const a = countEl.value;
            const x = countprice * a;
            document.getElementById("priceValueCount").innerHTML = x;
        }
    }
    $(document).ready(function () {
        $('.cart_button').click(function (event) {
            event.preventDefault()
            addToCart()
        })
    })
    {{--function addToCart() {--}}
    {{--    let id = $('.details_name').data('id')--}}
    {{--    let qty = parseInt($('#quantity_input').val())--}}
    {{--    let total_qty = parseInt($('.cart-qty').text())--}}
    {{--    total_qty += qty--}}
    {{--    $('.cart-qty').text(total_qty)--}}
    {{--    $.ajax({--}}
    {{--        url: "{{route('addToCart')}}",--}}
    {{--        type: "POST",--}}
    {{--        data: {--}}
    {{--            id: id,--}}
    {{--            qty: qty,--}}
    {{--        },--}}
    {{--        headers: {--}}
    {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--        },--}}
    {{--        success: (data) => {--}}
    {{--            console.log(data)--}}
    {{--        },--}}
    {{--        error: (data) => {--}}
    {{--            console.log(data)--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}


</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="asset('js/main.js')"></script>
<script>

</script>
</body>

</html>

