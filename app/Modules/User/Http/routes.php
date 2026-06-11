<?php



//Route::post('sendPasswordEmail', 'UserController@sendPasswordEmail');
Route::get('password/edit','UserController@resetPassword');

Route::group(['prefix' => 'CN'], function () {
    //登录
    Route::get('/login', 'UserController@login');
    Route::post('/login', 'UserController@postLogin');
    //退出
    Route::get('/logout', 'UserController@getLogout');
    //注册
    Route::get('/register', 'UserController@register');
    Route::post('/register', 'UserController@postRegister');

    //重置密码
    Route::get('/retrievePassword', 'UserController@retrievePassword');
    Route::post('/resetPasswords', 'UserController@sendPasswordEmail');
    Route::post('/editPassword', 'UserController@editPassword');//提交


    Route::group(['middleware' => 'LoginAuth'], function () {
        Route::get('/changePassword', 'UserController@upPassword');       //修改密码
        Route::post('/upPassword','UserController@updatePassword');


        Route::post('/addrecruit', 'UserController@addrecruit');      //发布工作
    });
});
Route::group(['middleware' => 'LoginAuth'], function () {

    Route::post('upHeaderImg','UserController@uploadHeaderImg');

    //发布工作
    Route::get('/publish','UserController@publish')->name('publish');
    Route::post('/publishWork','UserController@publishWork');
    Route::get('/getWork','UserController@getWork');
    Route::get('/editWork/{id}','UserController@editWork');
    Route::post('/updateWork','UserController@updateWork');
    Route::get('/deleteWork','UserController@deleteWork');
});




//上传头像
Route::post('uploadHeaderImg','UploadController@uploadHeaderImg');
//简历
Route::post('uploadFile','UploadController@uploadFile');



Route::group(['prefix' => 'EN'], function () {
    //登录
    Route::get('/login', 'ForeignUserController@login');
    Route::post('/login', 'ForeignUserController@postlogin');
    //注册
    Route::get('/register', 'ForeignUserController@register');
    Route::post('/register', 'ForeignUserController@postRegister');

    Route::get('/logout', 'ForeignUserController@getLogout');

    Route::get('password/edit','ForeignUserController@resetPassword');

    //重置密码
    Route::get('/retrievePassword', 'ForeignUserController@retrievePassword');
    Route::post('/resetPasswords', 'ForeignUserController@sendPasswordEmail');
    Route::post('/editPassword', 'ForeignUserController@editPassword');//提交

    Route::group(['middleware' => 'ENLoginAuth'], function () {

        //个人中心
        Route::get('myCenter','ForeignUserController@myCenter');
        Route::get('editResume','ForeignUserController@editResume');
        Route::post('editResume','ForeignUserController@updateResume');


        Route::post('uploadHeaderImg','ForeignUserController@uploadHeaderImg');


        Route::get('getImg','ForeignUserController@getImg');
//修改密码
        Route::get('/changePassword', 'ForeignUserController@upPassword');
        Route::post('/upPassword','ForeignUserController@updatePassword');
    });

});












//获取图片验证码
Route::get('getValidateCode', 'CommunalController@getValidateCode');




Route::post('ccccc', 'UserController@sendPasswordEmail');


//路由显式绑定    RouteServiceProvider.php
Route::get('mail/{nav}', function (\App\Modules\Article\Model\NavCModel $nav) {

dd($nav);
});

