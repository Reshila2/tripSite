<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cent.kz</title>

    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
<section class="feedback">
    <div class="container">
        <h2>Обратная связь</h2>
        <div class="feedback-grid">
            <p class="feedback-descr">Высокий уровень вовлечения представителей целевой аудитории является четким
                доказательством простого
                факта: сплочённость команды профессионалов играет определяющее значение для первоочередных
                требований. Есть над чем задуматься: многие известные личности заблокированы в&nbsp;рамках своих
                собственных рациональных ограничений.</p>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
            <form method="POST" action="contact-form" class="feedback-form">
                @csrf
                <div class="feedback-form_item">
                    <input type="text" name="name"  placeholder="Имя" class="feedback-input" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <input type="text" name="surname"  placeholder="Фамилия" class="feedback-input" value="{{ old('surname') }}">
                    @if ($errors->has('surname'))
                        <span class="text-danger">{{ $errors->first('surname') }}</span>
                    @endif
                </div>
                <div class="feedback-form_item">

                    <input type="email" name="email" class="feedback-input" class="feedback-input" placeholder="Email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif

                    <input type="text"placeholder="Телефон" name="phone" id="tel" class="feedback-input" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <textarea name="message" id="coment"  placeholder="Комментарий..." rows="3" class="feedback-input textarea">{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                @endif

                <button type="submit" class="btn btn-feedback_bottom">Оставить заявку</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>
