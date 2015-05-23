<div class="separator">
    <span>@lang('common.loginWith')</span>
</div>
<div class="text-center">
    <a href="{{ URL::route('socialLogin',['facebook']) }}" class="btn btn-primary">
        <i class="fa fa-facebook"></i> Facebook
    </a>
    <a href="{{ URL::route('socialLogin',['google']) }}" class="btn btn-danger">
        <i class="fa fa-google"></i> Google
    </a>
    <a href="{{ URL::route('socialLogin',['twitter']) }}" class="btn btn-info">
        <i class="fa fa-twitter"></i> Twitter
    </a>
</div>
