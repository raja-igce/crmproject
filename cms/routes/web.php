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

Route::get('/', 'Front\FrontController@index')->name('index');
Route::get('/index', 'Front\FrontController@index')->name('index');
Route::get('campaign', 'Front\CampaignController@index')->name('homecampaign');
Route::get('underconstruct', 'Front\CampaignController@underconstruct')->name('underconstruct');
Route::get('campaign_details/{slug}', 'Front\CampaignController@campaign_details')->name('campaign_details');
Route::post('saveDonation', 'Front\CampaignController@saveDonation')->name('saveDonation');
Route::post('addComment', 'Front\CampaignController@addComment')->name('addComment');
Route::post('addContact', 'Front\CampaignController@addContact')->name('addContact');

Route::any('blog/{reqtype?}/{reqdata?}', 'Front\BlogController@index')->name('frontblog');
Route::any('ajaxBlog', 'Front\BlogController@ajaxBlog')->name('ajaxBlogfront');
Route::any('blog-innereye/{slug}', 'Front\BlogController@blogDetails')->name('blogDetails');
Route::any('addBlogComment', 'Front\BlogController@addBlogComment')->name('addBlogComment');

Route::get('events/{slug?}', 'Front\EventController@index')->name('eventListing');
Route::get('event_details/{slug}', 'Front\EventController@event_details')->name('event_details');
Route::post('addEventComment', 'Front\EventController@addEventComment')->name('addEventComment');
Route::post('bookSeat', 'Front\EventController@bookSeat')->name('bookSeat');


Route::get('/termscondition', 'admin\RegistrationController@termscondition')->name('termscondition');

Route::prefix('admin')->group(function () {
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
 

    Route::get('/registration', 'admin\RegistrationController@index')->name('registration');
    Route::any('/forgotpassword', 'admin\RegistrationController@forgotpassword')->name('forgotpassword');
    Route::get('/logins', 'admin\RegistrationController@logins')->name('logins');
    Route::post('/verifyForm', 'admin\RegistrationController@verifyForm')->name('verifyForm');
    Route::post('/verifyOTP', 'admin\RegistrationController@verifyOTP')->name('verifyOTP');
    Route::post('/addUser', 'admin\RegistrationController@addUser')->name('addUser');
    Route::post('/updatePassword', 'admin\RegistrationController@updatePassword')->name('updatePassword');
    Route::post('/loginApp', 'admin\RegistrationController@loginApp')->name('loginApp');

    Route::get('/welcome/{token?}', 'admin\RegistrationController@welcome')->name('welcome');



    Auth::routes();
});    

Route::group(['prefix' => 'admin',  'middleware' => ['auth']], function() {
 //Volunteer Profile view
 
    Route::get('/v-profile/{id}', 'admin\VolunteerViewController@index')->name('v-profile');
    Route::get('/viewprofile/{id}', 'admin\VolunteerViewController@viewprofile')->name('viewprofile');
    Route::any('/changePosition', 'admin\VolunteerViewController@changePosition')->name('changePosition');
    Route::any('/changeTeam', 'admin\VolunteerViewController@changeTeam')->name('changeTeam');

    Route::any('/uploadimage', 'admin\CommonController@uploadimage')->name('uploadimage');
    Route::any('/uploadimagethumb', 'admin\CommonController@uploadimagethumb')->name('uploadimagethumb');
    Route::any('/uploadfile', 'admin\CommonController@uploadfile')->name('uploadfile');
    Route::any('/uploadimageReturnfile', 'admin\CommonController@uploadimageReturnfile')->name('uploadimageReturnfile');
    Route::any('/uploadimage1', 'admin\CommonController@uploadimage1')->name('uploadimage1');
    Route::any('/uploadimage2', 'admin\CommonController@uploadimage2')->name('uploadimage2');
    Route::any('/imgUploadAutoHeight', 'admin\CommonController@imgUploadAutoHeight')->name('imgUploadAutoHeight');



    Route::any('/getVolunteerDetail/{id?}', 'admin\UserController@getVolunteerDetail')->name('getVolunteerDetail');
    Route::any('/addVolunteer', 'admin\UserController@addVolunteer')->name('addVolunteer');
    Route::get('/volunteer', 'admin\UserController@index')->name('volunteer');
    Route::any('/ajaxUserList', 'admin\UserController@ajaxUserList')->name('ajaxUserList');
    Route::any('/blockUser', 'admin\UserController@blockUser')->name('blockUser');
    Route::any('/changepassword', 'admin\UserController@changepassword')->name('changepassword');

    Route::any('/addApplication', 'admin\OrganizationController@addApplication')->name('addApplication');

});

Route::any('/cronAddTask', 'admin\TaskCroneController@cronAddTask')->name('cronAddTask');
Route::any('/cronTaskNotify', 'admin\TaskCroneController@cronTaskNotify')->name('cronTaskNotify');




Route::group(['prefix' => 'admin',  'middleware' => ['auth','check_user_active']], function() {
       Route::get('/home', 'admin\DashboardController@index')->name('home');
    Route::get('/education', 'admin\DashboardController@education')->name('education');

    Route::get('/application/{type}', 'admin\OrganizationController@index')->name('application');
    Route::any('/ajaxApplicationList', 'admin\OrganizationController@ajaxApplicationList')->name('ajaxApplicationList');
    Route::any('/addIndividualApplication', 'admin\OrganizationController@addIndividualApplication')->name('addIndividualApplication');
    Route::any('/ajaxIndividualApplicationList', 'admin\OrganizationController@ajaxIndividualApplicationList')->name('ajaxIndividualApplicationList');

    Route::get('/beneficiaries', 'admin\BeneficiaryController@index')->name('beneficiaries');
    Route::any('/ajaxBeneficiariesList', 'admin\BeneficiaryController@ajaxBeneficiariesList')->name('ajaxBeneficiariesList');
    Route::any('/addBeneficiaries', 'admin\BeneficiaryController@addBeneficiaries')->name('addBeneficiaries');
    Route::any('/approveBeneficiaries', 'admin\BeneficiaryController@approveBeneficiaries')->name('approveBeneficiaries');
    Route::any('/getBeneficiariesDetail/{id?}', 'admin\BeneficiaryController@getBeneficiariesDetail')->name('getBeneficiariesDetail');
    Route::any('/deleteBeneficiary', 'admin\BeneficiaryController@deleteBeneficiary')->name('deleteBeneficiary');

   
    Route::get('/setting/{type}', 'admin\MasterSettingController@index')->name('setting');
    Route::post('/addMasterData', 'admin\MasterSettingController@addMasterData')->name('addMasterData');
    Route::any('/ajaxSetting', 'admin\MasterSettingController@ajaxSetting')->name('ajaxSetting');
    Route::any('/deleteRecord', 'admin\MasterSettingController@deleteRecord')->name('deleteRecord');

    Route::get('/project', 'admin\ProjectController@index')->name('project');
    Route::any('/addProject', 'admin\ProjectController@addProject')->name('addProject');
    Route::any('/ajaxProject', 'admin\ProjectController@ajaxProject')->name('ajaxProject');
    Route::any('/deleteProject', 'admin\ProjectController@deleteProject')->name('deleteProject');
    Route::any('/removeProjectDoc', 'admin\ProjectController@removeProjectDoc')->name('removeProjectDoc');

    Route::any('/addPayment', 'admin\PaymentController@addPayment')->name('addPayment');
    Route::any('/ajaxPaymentData', 'admin\PaymentController@ajaxPaymentData')->name('ajaxPaymentData');
    Route::any('/ajaxExpenseData', 'admin\PaymentController@ajaxExpenseData')->name('ajaxExpenseData');
    Route::any('/addExpense', 'admin\PaymentController@addExpense')->name('addExpense');
    Route::any('/deleteExpense', 'admin\PaymentController@deleteExpense')->name('deleteExpense');
    
    Route::any('/addNote', 'admin\PaymentController@addNote')->name('addNote');
    Route::any('/ajaxNote', 'admin\PaymentController@ajaxNote')->name('ajaxNote');
    Route::any('/ajaxRevenue', 'admin\PaymentController@ajaxRevenue')->name('ajaxRevenue');

    Route::get('/event/{type?}/{id?}', 'admin\EventController@index')->name('event')->middleware('check_user_active');
    Route::any('/addEvent', 'admin\EventController@addEvent')->name('addEvent');
    Route::any('/ajaxEvent', 'admin\EventController@ajaxEvent')->name('ajaxEvent');
    Route::any('/deleteEvent', 'admin\EventController@deleteEvent')->name('deleteEvent');

   

    Route::get('/campaign', 'admin\CamapignController@index')->name('campaign');
    Route::any('/addCampaign', 'admin\CamapignController@addCampaign')->name('addCampaign');
    Route::any('/ajaxCampaign', 'admin\CamapignController@ajaxCampaign')->name('ajaxCampaign');
    Route::any('/deleteCampaign', 'admin\CamapignController@deleteCampaign')->name('deleteCampaign');

    Route::get('/story', 'admin\StoryController@index')->name('story');
    Route::any('/addStory', 'admin\StoryController@addStory')->name('addStory');
    Route::any('/ajaxStory', 'admin\StoryController@ajaxStory')->name('ajaxStory');
    Route::any('/deleteStory', 'admin\StoryController@deleteStory')->name('deleteStory');

    Route::get('/blog', 'admin\BlogController@index')->name('blog');
    Route::any('/addBlog', 'admin\BlogController@addBlog')->name('addBlog');
    Route::any('/ajaxBlog', 'admin\BlogController@ajaxBlog')->name('ajaxBlog');
    Route::any('/deleteBlog', 'admin\BlogController@deleteBlog')->name('deleteBlog');

    Route::get('/ichat', 'admin\ChatController@index')->name('ichat');
    Route::any('/ajaxChatUsers', 'admin\ChatController@ajaxChatUsers')->name('ajaxChatUsers');
    Route::any('/ajaxChatedUsers', 'admin\ChatController@ajaxChatedUsers')->name('ajaxChatedUsers');
    Route::any('/ajaxContactsUsers', 'admin\ChatController@ajaxContactsUsers')->name('ajaxContactsUsers');
    Route::any('/ajaxChatMessages', 'admin\ChatController@ajaxChatMessages')->name('ajaxChatMessages');
    Route::any('/sendMessages', 'admin\ChatController@sendMessages')->name('sendMessages');
    Route::post('/markAsRead', 'admin\ChatController@markAsRead')->name('markAsRead');

    Route::get('/groupchat', 'admin\GroupChatController@index')->name('groupchat');
    Route::any('/ajaxGroups', 'admin\GroupChatController@ajaxGroups')->name('ajaxGroups');
    Route::any('/ajaxChatedGroups', 'admin\GroupChatController@ajaxChatedGroups')->name('ajaxChatedGroups');
    Route::any('/ajaxGroupMessages', 'admin\GroupChatController@ajaxGroupMessages')->name('ajaxGroupMessages');
    Route::any('/sendGroupMessages', 'admin\GroupChatController@sendGroupMessages')->name('sendGroupMessages');
    Route::post('/markGroupAsRead', 'admin\GroupChatController@markGroupAsRead')->name('markGroupAsRead');
    Route::post('/createGroup', 'admin\GroupChatController@createGroup')->name('createGroup');
    Route::post('/deleteGroup', 'admin\GroupChatController@deleteGroup')->name('deleteGroup');
 
    Route::get('/task/{type?}/{id?}', 'admin\TaskController@index')->name('task');
    Route::any('/addTask', 'admin\TaskController@addTask')->name('addTask');
    Route::any('/ajaxTask', 'admin\TaskController@ajaxTask')->name('ajaxTask');
    Route::any('/deleteTask', 'admin\TaskController@deleteTask')->name('deleteTask');
    Route::any('/taskreview', 'admin\TaskController@taskreview')->name('taskreview');
    Route::any('/doneTask', 'admin\TaskController@doneTask')->name('doneTask');
    Route::any('/ajaxAssignTask', 'admin\TaskController@ajaxAssignTask')->name('ajaxAssignTask');
    
    //Volunteer Permissions
    Route::get('/volunteers_permissions', 'admin\PermissionController@volunteers_permissions')->name('volunteers_permissions');
    Route::get('/addDefaultPermission/{userid}', 'admin\PermissionController@addDefaultPermission')->name('addDefaultPermission');
    Route::any('/ajaxvolunteers_permissions', 'admin\PermissionController@ajaxvolunteers_permissions')->name('ajaxvolunteers_permissions');
    Route::post('/updatePermissions', 'admin\PermissionController@updatePermissions')->name('updatePermissions');

    //Organiztion Permissions 
    Route::get('/organization_permissions', 'admin\OrganizationPermissionController@organization_permissions')->name('organization_permissions');
    Route::any('/ajaxorganization_permissions', 'admin\OrganizationPermissionController@ajaxorganization_permissions')->name('ajaxorganization_permissions');
    Route::post('/updateOrganizationPermissions', 'admin\OrganizationPermissionController@updateOrganizationPermissions')->name('updateOrganizationPermissions');

    //Contact
    Route::get('/contacts', 'admin\ContactController@index')->name('contacts');
    Route::any('/addContact', 'admin\ContactController@addContact')->name('addContact');
    Route::any('/ajaxContact', 'admin\ContactController@ajaxContact')->name('ajaxContact');
    Route::any('/deleteContact', 'admin\ContactController@deleteContact')->name('deleteContact');
}); // with prefix admin
