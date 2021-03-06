@extends('site.master.subpage')
@section('pageTitle', '搜尋結果')
@section('description','搜尋結果')
@section('content')

        <!-- 內容區塊 -->
        <div class="container search-container">

            <!-- include 搜尋列 Search Bar -->
            @include('site.layouts.searchbar')

        <!-- 搜尋結果篩選按鈕 -->
        <div class="row searchType-list">
            <form action="search" method="GET">
                @csrf
                <button type="submit" name="searchType" value="全部類別" class="RoundBtn-1 text-article-1">全部類別</button>
                <button type="submit" name="searchType" value="僅查害蟲" class="RoundBtn-1 text-article-1"><span>&emsp;</span>害蟲<span>&emsp;</span></button>
                <button type="submit" name="searchType" value="僅查植株" class="RoundBtn-1 text-article-1"><span>&emsp;</span>植株<span>&emsp;</span></button>
                <input type="hidden" name="keyWord" value="{{ $keyWord ?? '' }}">
            </form>
        </div>

        <!-- 搜尋結果顯示區域 -->
        <div class="row">
            @if(count((array)$searchResults))

            <!-- 有資料的話，使用 foreach 列印 -->
            @foreach($searchResults as $results)

            <div class="img-box col-xs-12 col-sm-6 col-md-4">
                <!-- 判斷這筆資料是 "害蟲" 或 "植株" -->
                @if(substr( $results->num , 0 , 1 ) == 'A')

                <!-- 如果是 "害蟲"，則將網址暫存為 '/pestDetailed/' -->
                <span class="hidden">{{ $url='/pestDetailed/' }}</span>
                @else

                <!-- 如果是 "植株"，則將網址暫存為 '/plantDetailed/' -->
                <span class="hidden">{{ $url='/plantDetailed/' }}</span>

                @endif

                <a href='{{ url($url.$results->name) }}'>
                    <div id="{{ $results->name }}" class="img-innerbox">
                        <div class="img">
                            @if(substr( $results->num , 0 , 1 ) == 'A')

                            <img class="icon" src="{{ asset('img/icon/icon_pest.svg') }}" width="56">
                            @else
                            <img class="icon" src="{{ asset('img/icon/icon_plant.svg') }}" width="56">
                            @endif

                            <img class="corner" src="{{ asset('img/corner.svg') }}" width="80">
                            <img class="main" src="{{ asset($results->img) }}" alt="{{ $results->name }}" onError="this.src='{{ asset('img/image.jpg') }}';">
                        </div>
                        <hr />
                        <div class="base">
                            <p class="text-article-1">{{ $results->name }}</p>
                            <p class="text-small-1">{{ $results->scientificName }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <!-- 無資料的話，則顯示錯誤提醒 -->
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-medium-1 error-msg">
                <img src="{{ asset('img/icon/icon_pest.svg') }}" alt="no data">
                <div>
                    <p>很抱歉，沒有檢索到符合條件的資料</p>
                </div>
            </div>
            @endif

        </div>

        <!-- go to top 功能按鈕 -->
        <button id="goTop" class="Btn-default">
                <img src="{{ asset('img/icon/up.svg') }}" width="40" height="40" alt="GoToTop">
        </button>

    </div>
@stop

