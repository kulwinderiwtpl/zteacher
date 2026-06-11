<?php

//Route::get('ip', '');


Route::post('/uploadImage', 'UploadController@uploadImage');        //图片
Route::post('/uploadResume', 'UploadController@uploadResume');      //简历附件
Route::post('/uploadHead', 'UploadController@uploadHead');      //简历附件


Route::get('/manage/login', 'Auth\AuthController@getLogin')->name('loginCreatePage');

Route::group(['middleware' => 'systemlog'], function () {
    Route::post('/manage/login', 'Auth\AuthController@postLogin')->name('loginCreate');
});


Route::get('/manage/logout', 'Auth\AuthController@getLogout')->name('logout');

Route::group(['prefix' => 'manage', 'middleware' => ['manageauth', 'RolePermission', 'systemlog']], function () {

    Route::get('/', 'IndexController@getManage')->name('backstagePage');

    //Banner
    Route::get('/getChineseBanner', 'BannerController@getChineseBanner');
    Route::get('/getEnglishBanner', 'BannerController@getEnglishBanner');
    Route::get('/getBanner', 'BannerController@getBanners');
    Route::get('/addBanner/{type}', 'BannerController@addBanner');
    Route::get('/delBanner/{id}', 'BannerController@delBanner');
    Route::post('/addBanner', 'BannerController@insertBanner');
    Route::get('delBanner', 'BannerController@delBanner');
    Route::get('upBanner/{id}', 'BannerController@upBanner');
    Route::post('upBanner', 'BannerController@updateBanner');


    //关于我们
    Route::get('/aboutUs', 'ContentNavController@getAbouts');

    Route::get('/upContent/{id}', 'ContentNavController@upContent');

    Route::post('/updateContent', 'ContentNavController@updateContent');

    Route::get('aboutusTitle/{id}', 'ContentNavController@navTitle');

    Route::post('updateNavTitle', 'NavController@updateNavTitle');  //

    //聘请外教
    Route::get('hiringForeign', 'ContentNavController@getHiringForeign');
    Route::get('hiringForeignTitle/{id}', 'ContentNavController@navTitle');
    Route::get('upStandard/{id}', 'ContentNavController@upStandard');


    //外教人才库
    Route::get('talentPool', 'TalentPoolController@getTalentPool');
    Route::get('upTalentPool/{id}', 'TalentPoolController@upTalentPool');
    Route::post('upTalentPool', 'TalentPoolController@updateTalentPool');

    Route::get('addTalentPool', 'TalentPoolController@addTalentPool');
    Route::post('addTalentPool', 'TalentPoolController@insertTalentPool');

    Route::get('deleteTalentPool/{id}', 'TalentPoolController@deleteTalentPool');
    Route::get('downloadResume/{resume_id}', 'DownloadController@fileDownload');//下载简历

    //联系我们
    Route::get('contactUs', 'ContactUsController@getContactUs');
    Route::post('updateContactUs', 'ContactUsController@updateContactUs');

    Route::get('webSize', 'ContactUsController@getContactUs');

    //平均工资
    Route::get('upAverageWage/{id}','ContentNavEnglishController@upAverageWage');
    Route::post('upAverageWage','ContentNavEnglishController@updataAverageWage'); //平均工资

    //平均消费
    Route::get('addConsumption','ContentNavEnglishController@addConsumption');
    Route::post('addConsumption','ContentNavEnglishController@insertConsumption');
    Route::get('upConsumption/{id}','ContentNavEnglishController@upConsumption');
    Route::post('upConsumption','ContentNavEnglishController@updataConsumption');
    Route::get('delConsumption/{id}','ContentNavEnglishController@delConsumption');


    Route::group(['prefix' => 'EnglishVersion'], function () {

        //About Us
        Route::get('aboutUs', 'ContentNavEnglishController@getAbouts');

        //joinUs
        Route::get('joinUs','ContentNavEnglishController@getJoinUs');
        //Benefits
        Route::get('benefits','ContentNavEnglishController@getBenefits');
        //Life In China
        Route::get('lifeInChina','ContentNavEnglishController@getLifeInChina');
        //workingInChina
        Route::get('workingInChina','ContentNavEnglishController@getWorkingInChina');


        Route::post('/updateContent', 'ContentNavEnglishController@updateContent');

        Route::get('aboutusTitle/{id}', 'ContentNavEnglishController@navTitle');

        Route::get('contactUs', 'ContactUsController@getContactUs');
        Route::post('updateContactUs', 'ContactUsController@updateContactUs');
    });

    //会员信息
    Route::get('memberInformation','MemberController@getMember');
    Route::get('addMember','MemberController@addMember');
    Route::post('addMember','MemberController@insertMember');
    Route::get('upMember/{id}','MemberController@upMember');
    Route::get('delMember/{id}','MemberController@delMember');
    Route::post('upMember','MemberController@updateMember');

    //发布工作
    Route::get('publishedWork','RecruitController@getWork');
    Route::get('addWork','RecruitController@addWork');
    Route::post('addWork','RecruitController@insertWork');
    Route::get('upWork/{id}','RecruitController@upWork');
    Route::post('upWork','RecruitController@updateWork');
    Route::get('delWork/{id}','RecruitController@delWork');


    //设置
    Route::get('/managerDetail/{id}', 'AdminController@managerDetail');

    Route::post('/upManagerDetail', 'UserController@upManagerDetail')->name('managerDetailUpdate');

    /*Route::get('/upAbout/{id}', 'NavController@upNav')->name('aboutWe');
    Route::post('/updateNav', 'NavController@updateNav')->name('aboutWe');
    //English
    Route::get('/aboutUsEnglish', 'NavController@getEnglishAbouts')->name('aboutWe');
    Route::get('/upEnglishAbout/{id}', 'NavController@upEnglishNav')->name('aboutWe');
    Route::post('/upEnglishAbout', 'NavController@updateEnglishNav')->name('aboutWe');
    //end

    //招聘管理
    Route::get('/recruitList', 'RecruitController@getRecruitList')->name('recruit');
    Route::get('/getRecruit/{id}', 'RecruitController@getRecruit')->name('recruit');
    //

    //Benefits
    Route::get('/benefits', 'NavController@getBenefits')->name('benefits');
    Route::get('/upBenefits/{id}', 'NavController@upEnglishNav')->name('benefits');
    Route::post('/upEnglishNav', 'NavController@updateEnglishNav')->name('benefits');
    //

    //用户管理
    //会员用户
    Route::get('/myUsers', 'ZhuoJiao\UserController@getMyUsers')->name('myUsers');
    Route::get('/upMyUser/{id}', 'ZhuoJiao\UserController@upMyUser')->name('myUsers');
    Route::post('/upMyUser', 'ZhuoJiao\UserController@updateMyUser')->name('myUsers');
    //国外用户
    Route::get('/foreignUsers', 'ZhuoJiao\ForeignUserController@getForeignUsers')->name('myUsers');
    Route::get('/upForeignUsers/{id}', 'ZhuoJiao\ForeignUserController@upForeignUsers')->name('myUsers');
    Route::post('/upForeignUsers', 'ZhuoJiao\ForeignUserController@updateForeignUsers')->name('myUsers');
    //


    //聘请外教
    Route::get('/engage', 'NavController@getEngages')->name('engage');
    Route::get('/upEngage/{id}', 'NavController@upNav')->name('engage');
    Route::post('/updateNav', 'NavController@updateNav')->name('engage');
    //聘请服务
    Route::get('/service', 'NavController@getServices')->name('engage');
    Route::get('/upService/{id}', 'NavController@upNav')->name('engage');
    Route::post('/updateNav', 'NavController@updateNav')->name('engage');
    //

    //站点配置
    Route::get('/webSite', 'WeBsiteController@getWebSite')->name('website');
    Route::post('/webSite', 'WeBsiteController@postWebSite')->name('website');*/
    //



    Route::get('/userList', 'UserController@getUserList')->name('userList');
    Route::get('/handleUser/{uid}/{action}', 'UserController@handleUser')->name('userStatusUpdate');
    Route::get('/userAdd', 'UserController@getUserAdd')->name('userCreatePage');
    Route::post('/userAdd', 'UserController@postUserAdd')->name('userCreate');
    Route::post('checkUserName', 'UserController@checkUserName')->name('checkUserName');
    Route::post('checkEmail', 'UserController@checkEmail')->name('checkEmail');
    Route::get('/userEdit/{uid}', 'UserController@getUserEdit')->name('userUpdatePage');
    Route::post('/userEdit', 'UserController@postUserEdit')->name('userUpdate');
    Route::get('/managerList', 'UserController@getManagerList')->name('managerList');
    Route::get('/handleManage/{uid}/{action}', 'UserController@handleManage')->name('userStatusUpdate');
    Route::get('/managerAdd', 'UserController@managerAdd')->name('managerCreatePage');
    Route::post('/managerAdd', 'UserController@postManagerAdd')->name('managerCreate');
    Route::post('checkManageName', 'UserController@checkManageName')->name('checkManageName');
    Route::post('checkManageEmail', 'UserController@checkManageEmail')->name('checkManageEmail');

    Route::post('/managerDetail', 'UserController@postManagerDetail')->name('managerDetailUpdate');
    Route::get('/managerDel/{id}', 'UserController@managerDel')->name('managerDelete');
    Route::post('/managerDeleteAll', 'UserController@postManagerDeleteAll')->name('managerAllDelete');

    Route::get('/rolesList', 'UserController@getRolesList')->name('rolesList');
    Route::get('/rolesAdd', 'UserController@getRolesAdd')->name('rolesCreatePage');
    Route::post('/rolesAdd', 'UserController@postRolesAdd')->name('rolesCreate');
    Route::get('/rolesDel/{id}', 'UserController@getRolesDel')->name('rolesDelete');
    Route::get('/rolesDetail/{id}', 'UserController@getRolesDetail')->name('rolesDetail');
    Route::post('/rolesDetail', 'UserController@postRolesDetail')->name('rolesDetailUpdate');

    Route::get('/permissionsList', 'UserController@getPermissionsList')->name('permissionsList');
    Route::get('/permissionsAdd', 'UserController@getPermissionsAdd')->name('permissionsCreatePage');
    Route::post('/permissionsAdd', 'UserController@postPermissionsAdd')->name('permissionsCreate');
    Route::get('/permissionsDel/{id}', 'UserController@getPermissionsDel')->name('permissionsDelete');
    Route::get('/permissionsDetail/{id}', 'UserController@getPermissionsDetail')->name('permissionsDetail');
    Route::post('/permissionsDetail', 'UserController@postPermissionsDetail')->name('postPermissionsDetailUpdate');


    Route::get('/menuList/{id}/{level}', 'MenuController@getMenuList')->name('getMenuList');
    Route::get('/addMenu/{id?}', 'MenuController@addMenu')->name('addMenu');
    Route::post('/menuCreate', 'MenuController@menuCreate')->name('menuCreate');
    Route::get('/menuDelete/{id}', 'MenuController@menuDelete')->name('menuDelete');
    Route::get('/menuUpdate/{id}', 'MenuController@menuUpdate')->name('menuUpdate');
    Route::post('/updateMenu', 'MenuController@updateMenu')->name('updateMenu');

});