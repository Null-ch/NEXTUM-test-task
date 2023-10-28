@extends('layouts.main')
@section('content')
    <style>
        .center-label {
            text-align: center;
        }

        .select-row {
            display: flex;
            justify-content: center;
        }
    </style>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 ml-2 p-3">
                        <h3>Создание РЕП шедевра</h3>
                        <form action="{{ route('store_page') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card mt-5">
                                <label class="mt-2 p-2 text-center">Название будущего текста</label>
                                <div class="p-3">
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                </div>
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <p class="text-red text-center">{{ $errors->first('title') }}</p>
                                </span>
                            @endif
                            </div>
                            <div class="card mt-5">
                                <label class="mt-2 p-2 text-center">Первый</label>
                                <div class="p-3">
                                    <textarea class="form-control summernote" type="text" name="content-1" value="{{ old('content-1') }}"></textarea>
                                    @error('content-1')
                                        <span class="invalid-feedback" role="alert">
                                            <p class="text-red text-center">{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card mt-5">
                                <label class="mt-2 p-2 text-center">Второй</label>
                                <div class="p-3">
                                    <textarea class="form-control summernote" type="text" name="content-2" value="{{ old('content-2') }}"></textarea>
                                    @error('content-2')
                                        <span class="invalid-feedback" role="alert">
                                            <p class="text-red text-center">{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card mt-5">
                                <label class="mt-2 p-2 text-center">Третий</label>
                                <div class="p-3">
                                    <textarea class="form-control summernote" type="text" name="content-3" value="{{ old('content-3') }}"></textarea>
                                </div>
                                @error('content-3')
                                    <span class="invalid-feedback" role="alert">
                                        <p class="text-red text-center">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="p-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card">Предпросмотр</h4>
                                        <div id="preview"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5">
                                <div class="form-group mt-3 text-center">
                                    <input type="submit" class="btn btn-success" value="Добавить">
                                </div>
                                <div class="form-group mt-3 text-center ml-5">
                                    <input type="button" class="btn btn-secondary" value="Предпросмотр" onclick="showPreview()">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Введите текст',
                tabsize: 2,
                height: 120,
                disableDragAndDrop: true,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        });
    </script>
    <script>
        function showPreview() {
            var content1 = document.getElementsByName("content-1")[0].value;
            var content2 = document.getElementsByName("content-2")[0].value;
            var content3 = document.getElementsByName("content-3")[0].value;
            var previewString = content1 + " " + content2 + " " + content3;

            // Создаем временный контейнер для удаления HTML тегов
            var tempDiv = document.createElement("div");
            tempDiv.innerHTML = previewString;
            var plainText = tempDiv.innerText;

            Swal.fire({
                title: "Предпросмотр",
                html: `<div style="font-size: 16px">${plainText}</div>`,
                icon: "info",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
            });
        }
    </script>
    <script>
        function showPreview() {
            // Получите значения полей из формы
            var title = document.getElementById('title').value;
            var content1 = document.getElementsByName('content-1')[0].value;
            var content2 = document.getElementsByName('content-2')[0].value;
            var content3 = document.getElementsByName('content-3')[0].value;
    
            // Создайте HTML-код предпросмотра
            var previewHTML = `
                <h3>Название: ${title}</h3>
                <div>Первое четверостишье: ${content1}</div>
                <div>Второе четверостишье: ${content2}</div>
                <div>Третье четверостишье: ${content3}</div>
            `;
    
            // Отобразите предпросмотр в окне предпросмотра
            document.getElementById('preview').innerHTML = previewHTML;
        }
    </script>
@endsection
