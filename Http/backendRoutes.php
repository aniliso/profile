<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/profile'], function (Router $router) {
    $router->bind('profile', function ($id) {
        return app('Modules\Profile\Repositories\ProfileRepository')->find($id);
    });
    $router->get('profiles/{profile}/edit', [
        'as' => 'admin.profile.profile.edit',
        'uses' => 'ProfileController@edit',
        'middleware' => 'can:profile.profiles.edit'
    ]);
    $router->put('profiles/{profile}', [
        'as' => 'admin.profile.profile.update',
        'uses' => 'ProfileController@update',
        'middleware' => 'can:profile.profiles.edit'
    ]);
// append

});
