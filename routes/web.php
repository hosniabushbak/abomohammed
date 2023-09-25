<?php
Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index']);



Route::post('save', [App\Http\Controllers\LandingPageController::class, 'savedata']);
Route::post('saveanswer', [App\Http\Controllers\LandingPageController::class, 'saveanswer']);
//updatePhone
Route::post('updatePhone', [App\Http\Controllers\LandingPageController::class, 'updatePhone']);

Route::get('resulte/{msgid}/{id}',[App\Http\Controllers\LandingPageController::class, 'showResulte']);
//Route::redirect('/login', '/login');
Route::get('addPhone/{email}',[App\Http\Controllers\LandingPageController::class, 'showEmailForm']);

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('sendtocrm/sendtocrm','ClientsController@sendToCrm');
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::get('updateactive/{user}','UsersController@updateactive');
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Head Section
    Route::post('head-sections/media', 'HeadSectionController@storeMedia')->name('head-sections.storeMedia');
    Route::post('head-sections/ckmedia', 'HeadSectionController@storeCKEditorImages')->name('head-sections.storeCKEditorImages');
    Route::resource('head-sections', 'HeadSectionController', ['except' => ['show', 'destroy']]);

    // Sections
    Route::delete('sections/destroy', 'SectionsController@massDestroy')->name('sections.massDestroy');
    Route::post('sections/media', 'SectionsController@storeMedia')->name('sections.storeMedia');
    Route::post('sections/ckmedia', 'SectionsController@storeCKEditorImages')->name('sections.storeCKEditorImages');
    Route::resource('sections', 'SectionsController');

    // Testimonials
    Route::delete('testimonials/destroy', 'TestimonialsController@massDestroy')->name('testimonials.massDestroy');
    Route::resource('testimonials', 'TestimonialsController');

    // Clients
    Route::get('clients/emails', 'ClientsController@emails')->name('clients.emails');
    Route::get('sendtocrm/sendtocrm','ClientsController@sendToCrm')->name('clients.sendToCrm');

    Route::get('clients/transfare/{id}/{luid}/{tuid}/{t}', 'ClientsController@transfare');
    Route::get('clients/PhoneEmpty', 'ClientsController@PhoneEmpty');

    Route::get('clients/EditSeirsWithModel/{client}', 'ClientsController@EditSeirsWithModel');
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // Event Titles
    Route::delete('event-titles/destroy', 'EventTitlesController@massDestroy')->name('event-titles.massDestroy');
    Route::resource('event-titles', 'EventTitlesController');

    // Client Events
    Route::get('client-events/EditWithModel/{client_event}', 'ClientEventsController@EditWithModel')->name('client-events.EditWithModel');
    Route::get('client-events/withMod/{id}', 'ClientEventsController@withMod');
    Route::get('client-events/CreatewithMod/{event}/{id}', 'ClientEventsController@CreatewithMod');

    Route::delete('client-events/destroy', 'ClientEventsController@massDestroy')->name('client-events.massDestroy');
    Route::resource('client-events', 'ClientEventsController');

    // Site Setting
    Route::delete('site-settings/destroy', 'SiteSettingController@massDestroy')->name('site-settings.massDestroy');
    Route::post('site-settings/media', 'SiteSettingController@storeMedia')->name('site-settings.storeMedia');
    Route::post('site-settings/ckmedia', 'SiteSettingController@storeCKEditorImages')->name('site-settings.storeCKEditorImages');
    Route::resource('site-settings', 'SiteSettingController');

    // Service Provider
    Route::delete('service-providers/destroy', 'ServiceProviderController@massDestroy')->name('service-providers.massDestroy');
    Route::resource('service-providers', 'ServiceProviderController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionsController');

    // Answers
    Route::delete('answers/destroy', 'AnswersController@massDestroy')->name('answers.massDestroy');
    Route::resource('answers', 'AnswersController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/stop', 'ChangePasswordController@stop')->name('stop');

    }
});
