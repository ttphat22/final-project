@extends('layouts.app_master_frontend')
@section('css')
    <?php $style = file_get_contents('css/product_insights.min.css');echo $style;?>
@stop
<style>
    .filter-tab .active a {
        color: red;
    }
</style>
@section('content')
    <div class="container">
        <div class="product-list">
            <div class="left">
                @include('frontend.pages.product.include._inc_sidebar')
            </div>
            <div class="right">
{{--                <div class="breadcrumb">--}}
{{--                    <ul>--}}
{{--                        <li >--}}
{{--                            <a itemprop="url" href="/" title="Home"><span itemprop="title">Home</span></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                @if (config('layouts.pages.search.price.type') == 1)
                    <div class="filter-tab">
                        @include('frontend.pages.product.include._inc_filter_price')
                    </div>
                @endif
                <div class="order-tab">
                    <span class="total-prod">{{ __('category.total') }}: {{ $products->total() }} {{ __('category.product') }}</span>
                    <div class="sort">
                        <div class="item">
                            <span class="title js-show-sort">Sắp xếp <i class="fa fa-caret-down"></i></span>
                            <ul>
                                <li><a class="{{ Request::get('sort') == 'desc' ? "active" : "" }}" href="{{ request()->fullUrlWithQuery(['sort'=> 'desc']) }}">Giảm dần</a></li>
                                <li><a class="{{ Request::get('sort') == 'asc' ? "active" : "" }}" href="{{ request()->fullUrlWithQuery(['sort'=> 'asc']) }}">Tang dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="group">
                    @foreach($products as $product)
                        @include('frontend.components.product_item', ['product' => $product])
                    @endforeach
                </div>
                <div style="display: block;">
                    {!! $products->appends($query ?? [])->links() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
		<?php $js = file_get_contents('js/product_search.js');echo $js;?>
    </script>
@stop
