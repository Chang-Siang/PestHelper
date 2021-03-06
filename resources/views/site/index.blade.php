@extends('site.master.homepage')
@section('content')

        <!-- 內容區塊 -->
        <div class="container">

            <!-- 網站標語 Web Slogan -->
            <div id="Web-page-slogan" class="row">
                <h1 class="col-xs-12 text-Oversized">蟲害小幫手<br />病蟲害解決方案服務</h1>
            </div>
        </div>
        <div class="container index">

            <!-- 功能標語 Function Slogan -->
            <div class="row">
                <h2 class="col-xs-12 text-medium-1">開始你的搜尋，病蟲害問題迎刃而解</h2>
            </div>

            <!-- include 搜尋列 Search Bar -->
            @include('site.layouts.searchbar')

            <!-- Popular Keyword -->
            <div class="row">
                <div class="col-xs-12">
                    @if(count((array)$keyWordList))
                    @foreach($keyWordList as $keyWord)

                    <a href="{{ url('/search?keyWord=' . $keyWord->keyWord) }}" class="RoundBtn-1 text-article-1">{{ $keyWord->keyWord }}</a>
                    @endforeach
                    @endif

                </div>
            </div>

            <!-- 其他呼籲 Other Function -->
            <div class="row" style="padding-top: 50px;text-align: center;">
                <p class="text-medium-2">或者你可以試試</p>
            </div>

            <div class="row cta">
                <a href="{{ url('/recognition') }}">
                    <button type="button" id="btnTest" class="btn-1 text-medium-0">害蟲辨識</button>
                </a>
                {{-- <span style="margin: 10px;"></span> --}}
                {{-- <button type="button" id="btnTest" class="btn-opacity text-medium-2">瀏覽教學</button> --}}
            </div>
        </div>
@stop


