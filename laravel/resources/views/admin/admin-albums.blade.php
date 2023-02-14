@extends('layout.admin')

@section('title-block') Альбоми @endsection

@section('content')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            @include('inc.admin-aside')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Альбоми</h1>
                </div>

                <div id="messages"></div>

                <div class="container">
                    <form action="{{route('addAlbum')}}" method="post" class="dropzone" id="dropzone"enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">Назва альбому</span>
                            <input id="title" type="text" class="form-control" name="name">
                            <button id="addDropAlbum" type="button" class="btn btn-success">+ Додати альбом</button>
                        </div>
                        <h5>Перетягніть сюди фото</h5>
                        <hr>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script>
        let myDropzone = new Dropzone("#dropzone", {
            autoProcessQueue: false,
            addRemoveLinks: true,
            acceptedFiles: '.jpeg,.jpg,.png,.gif'
        });
        let addAlbum = document.getElementById('addDropAlbum');
        addAlbum.addEventListener('click', function(){
            let data = new FormData();
            let title = document.getElementById('title').value;
            let files = myDropzone.getAcceptedFiles();
            files.forEach(file => {
                data.append('images[]', file);
            });
            data.append('title', title);
            data.append('_token', $('meta[name="csrf-token"]').attr('content'));
            if(title.length && files.length) {
                $.ajax({
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    cache : false,
                    dataType    : 'json',
                    url: "{{ route('addAlbum') }}",
                    data: data,
                    success: function (response) {
                        let message = document.getElementById('messages');
                        message.innerHTML = "<span style='width: 100%; display: inline-block;' class='alert alert-success'>Альбом додано!</span>";
                    }
                });
            }
        });
    </script>
@endsection
