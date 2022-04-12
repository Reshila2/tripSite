<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="./style/style.css" />
    <link href="{{ asset('css/mainPage/style.css') }}" rel="stylesheet">
    <title>Tours</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="wrapper">
    <header>
        <div class="header__container">
            <h1>Tours</h1>
            <nav></nav>
        </div>
    </header>
    <main>
        <div class="main__container">
            <section id="menu">
                <div class="menu__container">
                    <h1>Выберите для себя лучший отпуск в жизни</h1>
                    <div class="menu__items">
                        <div class="menu__item zoom">
                            @foreach ($categories as $category)
                                <li class="bottom-menu_item catlink "><a href="{{ url('/category',$category->id) }}">{{ $category['title'] }}</a></li>
                            @endforeach
                        </div>

                        <div class="dropdown show menu__item zoom">
                            <a
                                class="btn btn-secondary dropdown-toggle"
                                href="#"
                                role="button"
                                id="dropdownMenuLink"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Еще</a
                            >
                            <img src="./img/menu-more.png" alt="" />

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <section id="search">
                <div class="search__container">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"
                  ><i class="fa-solid fa-magnifying-glass"></i
                      ></span>
                        </div>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Что вы ищите?"
                            aria-label="Username"
                            aria-describedby="basic-addon1"
                        />
                    </div>
                </div>
            </section>
            <section id="popular">
                <div class="swiper mySwiper popular__container">
                    <h1>Популярные места</h1>
                    <div class="swiper-wrapper popular__cards">
                        @foreach($posts as $post)
                        <div class="swiper-slide card zoom">
                            <img class="card-img-top" src="{{asset($post['img'])}}" alt="Парапланы"/>
                            <div class="card-body">
                                <a href="#"><h3 class="card-title">{{$post['title']}}</h3></a>
                                <div class="card-rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <p class="card-text">от 15,000 тг за взорслого</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        </div>
    </main>
</div>
@endsection
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 70,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
</body>
</html>

