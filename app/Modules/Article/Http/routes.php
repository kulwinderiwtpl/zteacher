<?php


Route::get('/', 'IndexController@index');


Route::get('/index', 'IndexCnController@index');            //中文版首页
Route::get('/indexEN', 'IndexEnController@index');          //English版首页


Route::get('/hiring', 'IndexCnController@gethiring');       //聘请外教
Route::get('/releaseWork', 'IndexCnController@getRelease');     //发布工作
//外教人才库
Route::get('/talentPool', 'IndexCnController@getTalentPool');
Route::get('/talentPoolList', 'IndexCnController@getTalentPoolList');
//联系我们
Route::get('/contactUs', 'IndexCnController@getContactUs');



Route::get('/joinUs', 'IndexEnController@joinUs');          //Join Us
Route::get('/benefits', 'IndexEnController@getBenefits');   //Benefits
Route::get('/working', 'IndexEnController@working');        //Working in China
Route::get('/life', 'IndexEnController@life');              //Life  in China
Route::get('/contactUs_EN', 'IndexEnController@contactUs');              //Contact Us




Route::group(['middleware' => 'LoginAuth'], function () {
    Route::get('/getResume/{id}', 'IndexCnController@getResume');//查看简历
});










Route::get('time', function () {

    var_dump(Route::current());
});

Route::get('/mail', function () {

    return view('email.passwordEn');
});


