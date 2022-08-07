@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории</div>

                    <div class="card-body">
                        {{--Отображаем список категорий--}}

                        {{ print($settingCategory) }}

                        {{--END Отображаем список категорий--}}

                        <hr>
                        <form action="{{ route('category.setting.save') }}" method="POST">
                            @csrf
                            <input type="hidden" id="sort" name="sort" value="">
                            <button type="submit" class="btn btn-outline-success">Сохранить</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
    <script>
        function generation_sort_menu() {
            let id = [];
            $('.user-menu-sort-category').each(function (i,s) {
                if($(s).data('id')) {
                    let idCategory = $(s).data('id')
                    let title = $($('.user-menu-sort-category__border')[i]).data("title")
                    let parentId = $($('.user-menu-hidden-element')[i]).data("parent-id")
                    id.push(`${idCategory}:${title}:${parentId}`);
                }
            });
            $('#sort').val(id.join(','));
        }
        $( function() {
            $( ".user-menu-sort-categories" ).sortable();
            $( ".user-menu-sort-categories" ).disableSelection();

            $( ".user-menu-sort-categories" ).droppable({
                accept: ".user-menu-sort-category",
                over: function( event, ui )//если фигура над клеткой- выделяем её границей
                {
                    $(this).addClass('hover');
                    $(this).removeClass('dang');
                    $(ui.draggable).addClass('hover');
                },
                out: function( event, ui )//если фигура ушла- снимаем границу
                {
                    $(this).removeClass('hover');
                    $(this).addClass('dang');
                },
                drop:function( event, ui )//если бросили фигуру в клетку
                {
                    $(ui.draggable).removeClass('hover');
                    $(this).removeClass('hover');//убираем выделение
                    setTimeout(function () {
                        generation_sort_menu();
                    }, 500);
                }
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            generation_sort_menu()
        })

    </script>
@endsection
