<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\IndexCnController;
use App\Http\Controllers\IndexEnController;
use App\Http\Controllers\user\ForeignUserController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContentNavController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\ContentNavEnglishController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\RecruitController;
use App\Http\Controllers\Admin\TalentPoolController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', [IndexController::class, 'index']);


Route::get('/index', [IndexCnController::class, 'index']);            //中文版首页
Route::get('/indexEN', [IndexEnController::class, 'index']);          //English版首页


Route::get('/hiring', [IndexCnController::class, 'gethiring']);       //聘请外教
Route::get('/releaseWork', [IndexCnController::class, 'getRelease']);     //发布工作
//外教人才库
Route::get('/talentPool', [IndexCnController::class, 'getTalentPool']);
Route::get('/talentPoolList', [IndexCnController::class, 'getTalentPoolList']);
//联系我们
Route::get('/contactUs', [IndexCnController::class, 'getContactUs']);



Route::get('/joinUs', [IndexEnController::class, 'joinUs']);          //Join Us
Route::get('/benefits', [IndexEnController::class,'getBenefits']);   //Benefits
Route::get('/working', [IndexEnController::class, 'working']);        //Working in China
Route::get('/life', [IndexEnController::class,'life']);              //Life  in China
Route::get('/contactUs_EN', [IndexEnController::class,'contactUs']);              //Contact Us




Route::group(['middleware' => 'LoginAuth'], function () {
    Route::get('/getResume/{id}', [IndexCnController::class, 'getResume']);//查看简历
});




Route::group(['prefix' => 'EN'], function () {
    //登录
    Route::get('/login', [ForeignUserController::class,'login']);
    Route::post('/login', [ForeignUserController::class,'postlogin']);
    //注册
    Route::get('/register', [ForeignUserController::class,'register']);
    Route::post('/register', [ForeignUserController::class,'postRegister']);

    Route::get('/logout', [ForeignUserController::class,'getLogout']);

    Route::get('password/edit',[ForeignUserController::class,'resetPassword']);

    //重置密码
    Route::get('/retrievePassword', [ForeignUserController::class,'retrievePassword']);
    Route::post('/resetPasswords', [ForeignUserController::class,'sendPasswordEmail']);
    Route::post('/editPassword', [ForeignUserController::class,'editPassword']);//提交

    Route::group(['middleware' => 'ENLoginAuth'], function () {

        //个人中心
        Route::get('myCenter', [ForeignUserController::class,'myCenter']);
        Route::get('editResume', [ForeignUserController::class,'editResume']);
        Route::post('editResume', [ForeignUserController::class,'updateResume']);


        Route::post('uploadHeaderImg', [ForeignUserController::class,'uploadHeaderImg']);


        Route::get('getImg', [ForeignUserController::class,'getImg']);
//修改密码
        Route::get('/changePassword', [ForeignUserController::class,'upPassword']);
        Route::post('/upPassword', [ForeignUserController::class,'updatePassword']);
    });

});

Route::get('password/edit',[UserController::class,'resetPassword']);

Route::group(['prefix' => 'CN'], function () {
    //登录
    Route::get('/login', [UserController::class,'login']);
    Route::post('/login', [UserController::class,'ostLogin']);
    //退出
    Route::get('/logout', [UserController::class,'getLogout']);
    //注册
    Route::get('/register', [UserController::class,'register']);
    Route::post('/register', [UserController::class,'postRegister']);

    //重置密码
    Route::get('/retrievePassword', [UserController::class,'retrievePassword']);
    Route::post('/resetPasswords', [UserController::class,'sendPasswordEmail']);
    Route::post('/editPassword', [UserController::class,'editPassword']);//提交


    Route::group(['middleware' => 'LoginAuth'], function () {
        Route::get('/changePassword', [UserController::class,'upPassword']);       //修改密码
        Route::post('/upPassword',[UserController::class,'updatePassword']);


        Route::post('/addrecruit', [UserController::class,'addrecruit']);      //发布工作
    });
});

Route::group(['middleware' => 'LoginAuth'], function () {

    Route::post('upHeaderImg',[UserController::class,'uploadHeaderImg']);

    //发布工作
    Route::get('/publish',[UserController::class,'publish'])->name('publish');
    Route::post('/publishWork',[UserController::class,'publishWork']);
    Route::get('/getWork',[UserController::class,'getWork']);
    Route::get('/editWork/{id}',[UserController::class,'editWork']);
    Route::post('/updateWork',[UserController::class,'updateWork']);
    Route::get('/deleteWork',[UserController::class,'deleteWork']);
});


Route::get('time', function () {

    var_dump(Route::current());
});

Route::get('/mail', function () {
   return view('email.passwordEn');
});

//上传头像
Route::post('uploadHeaderImg','UploadController@uploadHeaderImg');
//简历
Route::post('uploadFile','UploadController@uploadFile');
Route::get('getValidateCode', 'CommunalController@getValidateCode');
Route::post('ccccc', 'UserController@sendPasswordEmail');


//路由显式绑定    RouteServiceProvider.php
Route::get('mail/{nav}', function (\App\Modules\Article\Model\NavCModel $nav) {

dd($nav);
});


Route::post('/uploadImage', 'UploadController@uploadImage');        //图片
Route::post('/uploadResume', 'UploadController@uploadResume');      //简历附件
Route::post('/uploadHead', 'UploadController@uploadHead');      //简历附件


Route::get('/manage/login', [AuthController::class,'getLogin'])->name('loginCreatePage');


    Route::post('/manage/login', [AuthController::class,'postLogin'])->middleware('systemlog')->name('loginCreate');



Route::get('/manage/logout', [AuthController::class,'getLogout'])->name('logout');

Route::group(['prefix' => 'manage', 'middleware' => ['manageauth', 'RolePermission', 'systemlog']], function () {

    Route::get('/', [AdminIndexController::class,'getManage'])->name('backstagePage');

    //Banner
    Route::get('/getChineseBanner', [BannerController::class,'getChineseBanner']);
    Route::get('/getEnglishBanner', [BannerController::class,'getEnglishBanner']);
    Route::get('/getBanner', [BannerController::class,'getBanners']);
    Route::get('/addBanner/{type}', [BannerController::class,'addBanner']);
    Route::get('/delBanner/{id}', [BannerController::class,'delBanner']);
    Route::post('/addBanner', [BannerController::class,'insertBanner']);
    Route::get('delBanner', [BannerController::class,'delBanner']);
    Route::get('upBanner/{id}', [BannerController::class,'upBanner']);
    Route::post('upBanner', [BannerController::class,'updateBanner']);


    //关于我们
    Route::get('/aboutUs', [ContentNavController::class,'getAbouts']);

    Route::get('/upContent/{id}', [ContentNavController::class,'upContent']);

    Route::post('/updateContent', [ContentNavController::class,'updateContent']);

    Route::get('aboutusTitle/{id}', [ContentNavController::class,'navTitle']);

    Route::post('updateNavTitle', 'NavController@updateNavTitle');  //

    //聘请外教
    Route::get('hiringForeign', [ContentNavController::class,'getHiringForeign']);
    Route::get('hiringForeignTitle/{id}', [ContentNavController::class,'navTitle']);
    Route::get('upStandard/{id}', [ContentNavController::class,'upStandard']);


    //外教人才库
    Route::get('talentPool', [TalentPoolController::class,'getTalentPool']);
    Route::get('upTalentPool/{id}', [TalentPoolController::class,'upTalentPool']);
    Route::post('upTalentPool', [TalentPoolController::class,'updateTalentPool']);

    Route::get('addTalentPool', [TalentPoolController::class,'addTalentPool']);
    Route::post('addTalentPool', [TalentPoolController::class,'insertTalentPool']);

    Route::get('deleteTalentPool/{id}', [TalentPoolController::class,'deleteTalentPool']);
    Route::get('downloadResume/{resume_id}', [TalentPoolController::class,'fileDownload']);//下载简历

    //联系我们
    Route::get('contactUs', [ContactUsController::class,'getContactUs']);
    Route::post('updateContactUs', [ContactUsController::class,'updateContactUs']);

    Route::get('webSize', [ContactUsController::class,'getContactUs']);

    //平均工资
    Route::get('upAverageWage/{id}',[ContentNavEnglishController::class,'upAverageWage']);
    Route::post('upAverageWage','ContentNavEnglishController@updataAverageWage'); //平均工资

    //平均消费
    Route::get('addConsumption',[ContentNavEnglishController::class,'addConsumption']);
    Route::post('addConsumption',[ContentNavEnglishController::class,'insertConsumption']);
    Route::get('upConsumption/{id}',[ContentNavEnglishController::class,'upConsumption']);
    Route::post('upConsumption',[ContentNavEnglishController::class,'updataConsumption']);
    Route::get('delConsumption/{id}',[ContentNavEnglishController::class,'delConsumption']);


    Route::group(['prefix' => 'EnglishVersion'], function () {

        //About Us
        Route::get('aboutUs', [ContentNavEnglishController::class,'getAbouts']);

        //joinUs
        Route::get('joinUs',[ContentNavEnglishController::class,'getJoinUs']);
        //Benefits
        Route::get('benefits',[ContentNavEnglishController::class,'getBenefits']);
        //Life In China
        Route::get('lifeInChina',[ContentNavEnglishController::class,'getLifeInChina']);
        //workingInChina
        Route::get('workingInChina',[ContentNavEnglishController::class,'getWorkingInChina']);


        Route::post('/updateContent', [ContentNavEnglishController::class,'updateContent']);

        Route::get('aboutusTitle/{id}', [ContentNavEnglishController::class,'navTitle']);

        Route::get('contactUs', [ContactUsController::class,'getContactUs']);
        Route::post('updateContactUs', [ContactUsController::class,'updateContactUs']);
    });

    //会员信息
    Route::get('memberInformation',[MemberController::class,'getMember']);
    Route::get('addMember',[MemberController::class,'addMember']);
    Route::post('addMember',[MemberController::class,'insertMember']);
    Route::get('upMember/{id}',[MemberController::class,'upMember']);
    Route::get('delMember/{id}',[MemberController::class,'delMember']);
    Route::post('upMember',[MemberController::class,'updateMember']);

    //发布工作
    Route::get('publishedWork',[RecruitController::class,'getWork']);
    Route::get('addWork',[RecruitController::class,'addWork']);
    Route::post('addWork',[RecruitController::class,'insertWork']);
    Route::get('upWork/{id}',[RecruitController::class,'upWork']);
    Route::post('upWork',[RecruitController::class,'updateWork']);
    Route::get('delWork/{id}',[RecruitController::class,'delWork']);


    //设置
    Route::get('/managerDetail/{id}', [AdminController::class,'managerDetail']);

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