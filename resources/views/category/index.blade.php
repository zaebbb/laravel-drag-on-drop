@extends('layouts.app')

@section('content')
    <div class="container">
        <style>
            .bold-category{
                font-weight: bold !important;
            }
        </style>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Поиск товаров по ГОСТ</label>
                            <input type="text" class="form-control" id="search-input" placeholder="Введите ГОСТ">
                        </div>
                        {{ print($category) }}
{{--                        <pre>--}}
                            {{ print($products) }}
{{--                        </pre>--}}
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

        function searchCategories(input){
            $('.product-info').each(function(indexProduct,elementProduct){

                if($(elementProduct).data("product") == input){

                    $('.category-element').each(function(indexCategory, elementCategory){

                        if($(elementProduct).data("category-id") == $(elementCategory).data("id")){

                            $(elementCategory).addClass("bold-category")
                        }
                    })
                }
            })
        }

        function clearBoldCategory(){
            $('.category-element').each(function(i, s) {
                $(s).removeClass("bold-category")
            })
        }

        document.addEventListener("DOMContentLoaded", () => {
            $('#search-input').on("input", function(){
                let $this = this

                clearBoldCategory();
                searchCategories($($this).val())
            })
        })

    </script>
@endsection
