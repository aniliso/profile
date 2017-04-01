<?php

namespace Modules\Profile\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Profile\Entities\Profile;
use Modules\Profile\Repositories\ProfileRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ProfileController extends AdminBaseController
{
    /**
     * @var ProfileRepository
     */
    private $profile;

    public function __construct(ProfileRepository $profile)
    {
        parent::__construct();

        $this->profile = $profile;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Profile $profile
     * @return Response
     */
    public function edit(Profile $profile)
    {
        return view('profile::admin.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Profile $profile
     * @param  Request $request
     * @return Response
     */
    public function update(Profile $profile, Request $request)
    {
        $this->profile->update($profile, $request->all());

        return redirect()->route('admin.user.user.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('profile::profiles.title.profiles')]));
    }
}
