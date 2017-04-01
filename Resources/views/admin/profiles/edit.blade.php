@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('profile::profiles.title.edit profile', ['name'=>$profile->user->fullname]) }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.user.user.index') }}">{{ trans('profile::profiles.title.profiles') }}</a></li>
        <li class="active">{{ trans('profile::profiles.title.edit') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.profile.profile.update', $profile->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <fieldset>
                        <legend>{{ trans('profile::profiles.title.contact info') }}</legend>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::normalInput('email', trans('profile::profiles.form.email'), $errors, $profile) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::normalInput('phone', trans('profile::profiles.form.phone'), $errors, $profile) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::normalInput('mobile', trans('profile::profiles.form.mobile'), $errors, $profile) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::normalInput('fax', trans('profile::profiles.form.fax'), $errors, $profile) !!}
                            </div>
                        </div>

                        {!! BSForm::textarea('address', trans('profile::profiles.form.address'), ['class'=>'textarea']) !!}
                    </fieldset>
                </div>

                <div class="box-body">
                    <fieldset>
                        <legend>{{ trans('profile::profiles.title.social media') }}</legend>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::normalInput('facebook', trans('profile::profiles.form.facebook'), $errors, $profile) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::normalInput('instagram', trans('profile::profiles.form.instagram'), $errors, $profile) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::normalInput('twitter', trans('profile::profiles.form.twitter'), $errors, $profile) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::normalInput('google', trans('profile::profiles.form.google'), $errors, $profile) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::normalInput('linkedin', trans('profile::profiles.form.linkedin'), $errors, $profile) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::normalInput('website', trans('profile::profiles.form.website'), $errors, $profile) !!}
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('profile::admin.profiles.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.user.user.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
    <script>
        $(".textarea").wysihtml5();
    </script>
@stop
