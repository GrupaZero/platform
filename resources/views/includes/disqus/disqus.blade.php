<div id="disqus_thread"></div>
@if(config('disqus.domain') && config('disqus.api_key'))
    <script>
        var disqus_config = function() {
            this.page.url = "{{$url}}"; // page's canonical url
            this.page.identifier = {{$contentId}}; // page's unique identifier
            // The generated payload which authenticates users with Disqus
            this.page.remote_auth_s3 = '{{$remoteAuthS3}}';
            this.page.api_key = '{{config('disqus.api_key')}}';

            // This adds the custom login/logout functionality
            this.sso = {
                name: "{{ config('gzero.siteName') }}",
                url: "{{ route('login') }}",
                logout: "{{ route('logout') }}"
            };
        };
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = '//{{config('disqus.domain')}}.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
@endif
<noscript>
    <div class="alert alert-info" role="alert">
        @lang('common.commentsNoJsMessage')
    </div>
    <a href="https://disqus.com/?ref_noscript" rel="nofollow"></a>
</noscript>
