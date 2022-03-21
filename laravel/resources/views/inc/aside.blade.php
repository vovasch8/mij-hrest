<div class="col-md-4">
    <h5 class="text-center text-danger">Онлайн Трансляція</h5>
    @include('widgets.video-player')
    <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 >Слова Апостола Павла до Колосян</h4>
            <p class="mb-0">«Слово Христове нехай у вас перебуває щедро, навчайтесь у всякій мудрості й напоумляйте одні одних»<br><span>(Кол 3,16)</span></p>
        </div>

        <div class="p-4">
            <h4>Посилання</h4>
            <ol class="list-unstyled mb-0">
                @foreach($links->where('id_block', '1') as $link)
                    <li><a class="link-dark" href="{{$link->link}}">{{$link->name}}</a></li>
                @endforeach

            </ol>
        </div>

        <div class="p-4">
            <h4>Інше</h4>
            <ol class="list-unstyled">
                @foreach($links->where('id_block', 2) as $link)
                    <li><a class="link-dark" href="{{$link->link}}">{{$link->name}}</a></li>
                @endforeach
            </ol>
        </div>
    </div>
</div>
