<?php
return [
    'api_key'    => env('DISQUS_API_KEY', ''),
    'api_secret' => env('DISQUS_API_SECRET', ''),
    'domain'     => env('DISQUS_DOMAIN', ''), //<DISQUS_DOMAIN>.disqus.com/embed.js
    'enabled'    => env('DISQUS_ENABLED', 'false'),
];
