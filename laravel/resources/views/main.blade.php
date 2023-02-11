@extends('layout.app')

@section('title-block') Мій Хрест @endsection

@section('content')
    <main class="container">
        <div class="row">
            <div class="main-block">
                <div class="text-wrapper">
                    <h3 class="text-center">Центр реабілітації та ранньої допомоги
                        <br>незрячим дітям та їх батькам
                        <br>Світло Надії
                    </h3>
                </div>
                <img src="{{asset('storage') . '/images/dim2.jpg'}}" data-speed="-0.75" class="img-main">
            </div>
        </div>
        <div class="row">
            <div class="description col-lg-6 col-md-12">
                <h3 class="text-center mt-3">Опис нашої місії</h3>
                <p>
                    Наше служіння в Україні, на батьківщині Матері Чацької, розпочалося в 1991 році в Старому Скалаті
                    Тернопільської області. Наш будинок став базою для літнього та зимового відпочинку сімей з незрячими дітьми Житомира та
                    Харкова.
                </p>
                <p>
                    З 2012 року ми працюємо в Центрі реабілітації та ранньої допомоги незрячим дітям та їх батькам. вул.
                    Івана Павла ІІ «Світло надії». Ми проводимо реабілітаційну допомогу, в якій беруть участь
                    маленькі діти та їхні батьки. До нас приїжджають діти з усієї України, тому що ми єдиний Центр, що приймаємо незрячих дітей з різними
                    вадами. Наші вихованці отримують професійну допомогу тифолога, психолога, реабілітолога по зору,
                    фізичної реабілітології, вчителя орієнтування в просторі та масажиста. Наша місія є великою
                    допомогою для дітей, а також величезною підтримкою для батьків.
                </p>
                <p>
                    З осені 2003 року ми служимо в другому закладі в Україні – дуже близькому до серця Матері Чацької і
                    кожного з нас – у Житомирі. Тут почала своє релігійне життя мати Єлизавета. У домі Матері Божої
                    Розарію, який знаходиться в парафії отців францисканців, ми продовжуємо молитися і служити незрячим,
                    особливо наймолодшим. У нашому дитячому садку діти навчаються основному у повсякденному
                    житті. Перебуваючи під нашою опікою з понеділка по п'ятницю, вони набувають навичок, необхідних для
                    самостійного життя. Вони закріплюють самостійний прийом їжі, одягання, навчання та ігри. Ми служимо
                    в парафіяльній бібліотеці та супроводжуємо родини незрячих із Житомира та околиць.
                </p>
                <p>
                    Ми вдячні Богові, що можемо реалізувати харизму, яку залишила нам мати Єлизавета Чацька, у місцях,
                    позначених її присутністю, пов’язаних з її дитинством і юністю.
                </p>
                <div class="contacts">
                    <h5 class="text-center">Контактна інформація</h5>
                    <p>
                        47845, Тернопільська обл.,<br>
                        Підволочиський р-н.,<br>
                        с.Старий Скалат,<br>
                        вул. Лісова, 12;<br>
                        тел.: +380962669970, +380980782587<br>
                        E-mail: centr.svitlonadii@gmail.com, maria.fsk@gmail.com
                    </p>
                </div>
            </div>
            <div id="gallery" class="col-lg-6 text-center mt-3">
                <a href="#img1"><img class="site-img m-2" src="{{asset('storage') . '/images/main1.jpg'}}" alt=""></a>
                <div id="img1" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/main1.jpg'}}" alt="Світло надії">
                </div>
                <a href="#img2"><img class="site-img m-2" src="{{asset('storage') . '/images/main2.jpg'}}" alt="Світло надії"></a>
                <div id="img2" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/main2.jpg'}}" alt="Світло надії">
                </div>
                <a href="#img3"><img class="site-img m-2" src="{{asset('storage') . '/images/main3.jpg'}}" alt="Світло надії"></a>
                <div id="img3" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/main3.jpg'}}" alt="Світло надії">
                </div>
                <a href="#img4"><img class="site-img m-2" src="{{asset('storage') . '/images/main4.jpg'}}" alt="Світло надії"></a>
                <div id="img4" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/main4.jpg'}}" alt="Світло надії">
                </div>
                <a href="#img5"><img class="site-img m-2" src="{{asset('storage') . '/images/main5.jpg'}}" alt="Світло надії"></a>
                <div id="img5" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/main5.jpg'}}" alt="Світло надії">
                </div>
                <a href="#img6"><img class="site-img m-2" src="{{asset('storage') . '/images/main6.jpg'}}" alt="Світло надії"></a>
                <div id="img6" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/main6.jpg'}}" alt="Світло надії">
                </div>
                <a href="#img7"><img class="site-img m-2" src="{{asset('storage') . '/images/main7.jpg'}}" alt="Світло надії"></a>
                <div id="img7" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/main7.jpg'}}" alt="Світло надії">
                </div>
                <a href="#img8"><img class="site-img m-2" src="{{asset('storage') . '/images/main8.jpg'}}" alt="Світло надії"></a>
                <div id="img8" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/main8.jpg'}}" alt="Світло надії">
                </div>
            </div>
        </div>
    </main>
@endsection

