<?php
return [
    'domain'                         => env('DOMAIN', 'localhost'),
    'siteName'                       => 'G-ZERO CMS',
    'defaultPageSize'                => 5,
    'seoTitleAlternativeField'       => 'title',
    'seoDescriptionAlternativeField' => 'body',
    'seoDescLength'                  => 160,
    'useUsersNickNames'              => true,
    'siteDesc'                       => 'Content management system.',
    'multilang'                      => [
        'enabled'   => true,
        'detected'  => false, // Do not change, changes in runtime!
        'subdomain' => false
    ],
    'upload'                         => [
        'directory' => env('UPLOAD_DIR', 'uploads') // directory inside filesystem root directory (storage/app/ as default)
    ],
    'block_type'                     => [
        'basic'   => 'Gzero\Core\Handler\Block\Basic',
        'content' => 'Gzero\Core\Handler\Block\Content',
        'menu'    => 'Gzero\Core\Handler\Block\Menu',
        'slider'  => 'Gzero\Core\Handler\Block\Slider',
        'widget'  => 'Gzero\Core\Handler\Block\Widget'
    ],
    'content_type'                   => [
        'content'  => 'Gzero\Core\Handler\Content\Content',
        'category' => 'Gzero\Core\Handler\Content\Category'
    ],
    'file_type' => [
        'image'    => 'Gzero\Core\Handler\File\Image',
        'document' => 'Gzero\Core\Handler\File\Document',
        'video'    => 'Gzero\Core\Handler\File\Video',
        'music'    => 'Gzero\Core\Handler\File\Music'
    ],
    'allowed_file_extensions' => [
        'image'    => ['png', 'jpg', 'jpeg', 'tif'],
        'document' => ['pdf', 'odt', 'ods', 'doc', 'docx', 'xls', 'xlsx', 'txt'],
        'video'    => ['mp4'],
        'music'    => ['mp3']
    ],
    'available_blocks_regions'       => [
        'header',
        'homepage',
        'featured',
        'contentHeader',
        'sidebarLeft',
        'sidebarRight',
        'contentFooter',
        'footer'
    ]
];
