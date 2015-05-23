@extends('layouts.sidebarLeft')

@section('title')
    @lang('common.edit')
@stop

@section('sidebarLeft')
    @include('account.menu', ['menu' => $menu])
@stop

@section('content')
    <h1 class="page-header">@lang('common.edit')</h1>

   <div class="row">
       <div class="col-md-5">
           <form id="edit-account-form" action="#" method="post" role="form">
               <div class="form-group{{ $errors->first('firstName') ? ' has-error' : '' }}">
                   <label class="control-label" for="firstName">@lang('common.firstName')</label>
                   <input type="text" id="firstName" name="firstName" class="form-control"
                          value="{{ $user->firstName }}"
                          placeholder="@lang('common.firstName')">
                   @if($errors->first('firstName'))
                       <p class="help-block">{{ $errors->first('firstName') }}</p>
                   @endif
               </div>
               <div class="form-group{{ $errors->first('lastName') ? ' has-error' : '' }}">
                   <label class="control-label" for="lastName">@lang('common.lastName')</label>
                   <input type="text" id="lastName" name="lastName" class="form-control"
                          value="{{ $user->lastName }}"
                          placeholder="@lang('common.lastName')">
                   @if($errors->first('lastName'))
                       <p class="help-block">{{ $errors->first('lastName') }}</p>
                   @endif
               </div>
               <div class="separator">
                   <span>@lang('common.passwordChange')</span>
               </div>
               <p class="text-muted">
                   <i class="fa fa-info-circle"><!-- icon --></i> @lang('common.leaveBlank')
               </p>
               @if(strpos($user->email,'social_') == false)
                   <div class="form-group{{ $errors->first('password') ? ' has-error' : '' }}">
                       <label class="control-label" for="password">@lang('common.newPassword')</label>
                       <input type="password" id="password" name="password" class="form-control"
                              placeholder="@lang('common.newPassword')">
                       @if($errors->first('password'))
                           <p class="help-block">{{ $errors->first('password') }}</p>
                       @endif
                   </div>
                   <div class="form-group{{ $errors->first('password_confirmation') ? ' has-error' : '' }}">
                       <label class="control-label" for="passwordConfirmation">@lang('common.passwordRepeat')</label>
                       <input type="password" id="passwordConfirmation" name="password_confirmation" class="form-control"
                              placeholder="@lang('common.passwordRepeat')">
                       @if($errors->first('password_confirmation'))
                           <p class="help-block">{{ $errors->first('password_confirmation') }}</p>
                       @endif
                   </div>
               @endif
               <button id="edit-account" type="submit" class="btn btn-primary">@lang('common.save')</button>
           </form>
       </div>
   </div>
@stop
@section('footerScripts')
    <script type="text/javascript">
        $(function () {
            $('#edit-account').click(function (event) {
                event.preventDefault();
                Loading.start('body');
                $.ajax({
                    url: "/<?php echo $lang->code;?>/api/v1/account/ <?php echo $user->id;?>",
                    data: $('#edit-account-form').serializeObject(),
                    type: 'PUT'
                }).done(function (result) {
                    Loading.stop();
                    if(result.success){
                        // set success message
                        setGlobalMessage('success', "@lang('common.changesSavedMessage')");
                        hideMessages();
                        clearFormValidationErrors();
                    } else {
                        // clear previous errors
                        clearFormValidationErrors();
                        $.each(result.errors, function (index, error) {
                            // set form errors
                            setFormValidationErrors(index, error);
                        });
                    }
                })
            });
        });
    </script>
@stop
