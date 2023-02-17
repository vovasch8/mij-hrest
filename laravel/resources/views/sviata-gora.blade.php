@extends('layout.app')

@section('title-block') Свята гора @endsection

@section('content')
    <main class="container">
        <div class="row">
            <div class="description col-lg-6 col-md-12">
                <h3 class="text-center mt-3">Полупанівська Свята Гора</h3>
                <hr>
                <h5>Історія вершини</h5>
                <p>
                    Село Полупанівка відоме з 16 століття, жили тут здебільшого поляки. У північній частині селища знаходиться Свята гора. Відома вона з давніх-давен. І хоч зараз гора вважається християнською святинею, тут знайшли залишки давнього святилища.
                    Із гори витікають декілька джерел, вода яких славиться своїми цілющими властивостями. Одне джерело витікає з відбитку стопи Божої Матері. З 1994 року Свята гора є ландшафтним заказником місцевого значення.
                    У 2010 році на Святій горі відкрили Хресну дорогу. Тут ви зможете побачити 14 образів Ісуса Христа перед сходженням на Голгофу.
                </p>
                <h5>Що можна побачити у селі</h5>
                <p>
                    Хресна дорога із гарним облаштуванням як під'їзду автомобілів так і доріжками для пішоходів. Також з даної місцевості відкриваються гарні краєвиди на навколишню місцевість. Доречі, під церквою є капличка із дуже смачною та цілющою водою, а тому обов'язково візьміть із собою пляшки для води.
                    Це місце є цікавим у геологічному відношенні. На території переважають вапнякові породи. З верхівки пагорба видніються живописні краєвиди на місцевість. Місце тихе й атмосферне.
                    Біля джерел Святої гори є декілька храмів: костел Святого Йосифа та церква Святого Духа 1878 року (перебудована з каплички у 1989 році).
                    Також тут можна побачити пам'ятні знаки на братській могилі радянських партизан та односельчанам, які загинули під час Другої світової війни. Також тут знаходиться символічна насипана могила українських січових стрільців. Біля скель є залишки давнього капища, а деякі з великих каменів поставлені на свої місця якимись невідомими робітниками.
                    Свята гора у Полупанівці потребує археологічних досліджень. Можливо, вченим вдасться відкрити досі невідомі сторінки історії цієї вершини.
                </p>
                <div id="video-block" class="text-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/rGR2emZMWw0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <h5 class="mt-3">Як доїхати до Полупанівки</h5>
                <p>
                    Село Полупанівка знаходиться поблизу дороги Скалат – Кам'янки. Відстань до обласного центру – 31 кілометр, а до Підволочиська – 18 кілометрів.
                    До села відправляються автобуси з Тернопільської АС №2 (вулиця Білогірська, 1) та з Підволочиського автовокзалу (вулиця Тернопільська, 15).
                    Їхати потрібно у сторону Скалата та вийти на зупинці «Полупанівка».
                </p>
                <div id="map" class="text-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10370.191296755802!2d25.984358628248703!3d49.47415798254121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4731c5ee40250649%3A0x473c646ee6d2fe4a!2z0J_QvtC70YPQv9Cw0L3RltCy0YHRjNC60LAg0KHQstGP0YLQsCDQs9C-0YDQsA!5e0!3m2!1suk!2sua!4v1676556132706!5m2!1suk!2sua" width="600" height="450" style="max-width: 600px!important; border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div id="gallery" class="col-lg-6 text-center mt-3">
                <a href="#img1"><img class="site-img m-2" src="{{asset('storage') . '/images/gora1.jpg'}}" alt=""></a>
                <div id="img1" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora1.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img2"><img class="site-img m-2" src="{{asset('storage') . '/images/gora2.jpg'}}" alt="Свята гора"></a>
                <div id="img2" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora2.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img3"><img class="site-img m-2" src="{{asset('storage') . '/images/gora3.jpg'}}" alt="Свята гора"></a>
                <div id="img3" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora3.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img4"><img class="site-img m-2" src="{{asset('storage') . '/images/gora4.jpg'}}" alt="Свята гора"></a>
                <div id="img4" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora4.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img5"><img class="site-img m-2" src="{{asset('storage') . '/images/gora5.jpg'}}" alt="Свята гора"></a>
                <div id="img5" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora5.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img6"><img class="site-img m-2" src="{{asset('storage') . '/images/gora6.jpg'}}" alt="Свята гора"></a>
                <div id="img6" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora6.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img7"><img class="site-img m-2" src="{{asset('storage') . '/images/gora7.jpg'}}" alt="Свята гора"></a>
                <div id="img7" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora7.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img8"><img class="site-img m-2" src="{{asset('storage') . '/images/gora8.jpg'}}" alt="Свята гора"></a>
                <div id="img8" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora8.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img9"><img class="site-img m-2" src="{{asset('storage') . '/images/gora9.jpg'}}" alt="Свята гора"></a>
                <div id="img9" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora9.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img10"><img class="site-img m-2" src="{{asset('storage') . '/images/gora10.jpg'}}" alt="Свята гора"></a>
                <div id="img10" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora10.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img11"><img class="site-img m-2" src="{{asset('storage') . '/images/gora11.jpg'}}" alt="Свята гора"></a>
                <div id="img11" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora11.jpg'}}" alt="Свята гора">
                </div>
                <a href="#img12"><img class="site-img m-2" src="{{asset('storage') . '/images/gora12.jpg'}}" alt="Свята гора"></a>
                <div id="img12" class="popup">
                    <a href="#gallery" class="close">X</a>
                    <img class="full-img" src="{{asset('storage') . '/images/gora12.jpg'}}" alt="Свята гора">
                </div>
                <div class="text-center mt-3">
                    <a href="https://www.google.com.ua/travel/entity/key/ChcIyvzLtu6NmZ5HGgsvZy8xMjIyajh3NhAE/photos?ei=ajRoYdKEMe3Y-QScj5-ICg&sa=X&ts=CAESABoECgIaACoECgAaAA">
                        <button style="max-width: 200px; width: 200px;" class="btn btn-dark">Усі фото</button>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection


