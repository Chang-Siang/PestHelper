<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
//--------------------------------------------------------------------------
// support function
//--------------------------------------------------------------------------
// [change type] this function can change array to an object.
function convertArray2Object($defs)
{
    $innerfunc = function ($a) use (&$innerfunc) {
        return (is_array($a)) ? (object)array_map($innerfunc, $a) : $a;
    };
    return (object)array_map($innerfunc, $defs);
}
/*
//---------------------------------------------------------------------------
// 前端區域
//---------------------------------------------------------------------------
 */
# test
Route::POST('/postajax', 'testController@testajax');

# 系統首頁 & 熱門關鍵字
Route::get('/', 'SearchController@GetKeywordList');

# 關鍵字搜尋
Route::get('/search', 'SearchController@Search');

# 害蟲目錄
Route::get('/pestcatalog', 'pestController@GetCategoryList');

# 害蟲目錄 -> 子目錄展開
/* get -> 由前端處理目錄資料 */
Route::get('/GetPestCategoryData', 'pestController@GetPestCategoryData');
/* post -> 由後端處理目錄資料 */
Route::post('/GetPestCategoryData', 'pestController@GetPestCategoryDataBack');


# 植株目錄
Route::get('/plantcatalog', 'plantController@GetCategoryList');

# 植株目錄 -> 子目錄展開
Route::get('/GetPlantCategoryData', 'plantController@GetPlantCategoryData');

#害蟲個別頁面
Route::get('/pestDetailed/{name}', 'PestController@GetPestData');
// Route::get('/pestTestDetailed/{num}', 'PestController@TestDetailed');

#植株個別頁面
Route::get('/plantDetailed/{name}', 'PlantController@GetPlantData');
// Route::get('/plantTestDetailed/{num}', 'PlantController@TestDetailed');

# 害蟲影像辨識
Route::get('/recognition', function () {
    return view('site/recognition');
});
# 害蟲影像辨識 -> 傳送辨識圖片
Route::post('/recognition', 'PestController@recognition');

/*
//---------------------------------------------------------------------------
// 後端區域
//---------------------------------------------------------------------------
 */

Route::get('/welcome', function () {
    return view('/backend/welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

#導向害蟲目錄
Route::get('/_pestcatalog', function () {
    return view('/backend/pestcatalog');
});
#導向植株目錄
Route::get('/_plantcatalog', function () {
    return view('/backend/plantcatalog');
});
#導向圖片上傳
Route::get('/imageUpload', function () {
    return view('/backend/imageUpload');
});

#顯示搜尋結果
Route::get('/searchResults', function () {
    return view('/backend/searchResults');
});

#顯示害蟲清單
Route::get('backend/_pestcatalog', 'PestController@GetCategoryList');

#顯示植株清單
Route::get('/_plantcatalog', 'PlantController@GetCategoryList');

#顯示建議表單
Route::post('/pestDetailed/suggestion', 'suggestController@suggestion');
Route::post('/plantDetailed/suggestion', 'suggestController@suggestion');
Auth::routes();
Route::post('/pestDetailed/newsuggestion', 'suggestController@newsuggestion');
Route::post('/plantDetailed/newsuggestion', 'suggestController@newsuggestion');
Auth::routes();



// 圖片上傳
Route::get('imageupload', 'PestController@imageUpload')->name('image.upload');
Route::post('imageupload', 'PestController@imageUploadPost')->name('image.upload.post');
