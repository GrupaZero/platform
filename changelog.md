###Changelog:
##v0.0.6
*GZERO PLATFORM*

- Added Add user nickName field
- Added email field to edit user account form
- Added missing disquss counter
- Added handling social accounts without email field
- Fixed api url on edit account when multi language is disabled
- Fixed SEO fields formatting issues
- Fixed lang code in html tag
- Fixed loading mask dimensions

*GZERO ADMIN*

- Added Add user nickName field

*GZERO API*

- Added Add user nickName field

*GZERO CMS*

- Added Add user nickName field
- Added unique nickname for users with empty on user creation
- Fixed SEO fields in translation presenter

*GZERO SOCIAL*

- Added user email from social response for user creation
- Unique social id is now used as fallback for response with missing email
- Fixed social login buttons so that they are visible only for configured services
- Fixed loading mask

##v0.0.5
*GZERO PLATFORM*

- Added logo image
- Added favicon
- Added title attribute to content links in category and homepage views
- Added language switcher
- Added sidebarLeft and sidebarRight blade layouts for user account page
- Added cookies policy information bar
- Added 'publishedAt', 'DESC' sort option for entries on homepage
- Added google analytics script in head with googleAnalyticsId from seo options
- Added disqus integration
- Added colorbox
- Fixed $langs in views, sto that it contains only enabled languages
- Fixed dev page, so it can be view only by admin users
- Fixed register route allowing logged in users
- Page title for from config instead of options
- Changed html lang attribute, so that it corresponds with current language
- Replaced LESS with SCSS files
- Updated password reminder code and translations
- Added responsive theme

*GZERO ADMIN*

- Prevent the user deleting their account
- Fixed language issues when multi language option is disabled
- Fixed translation issues
- Content 'theme' can now be edited
- CKEditor - Allow class attribute on html elements
- CKEditor - added 'encode' email protection method
- CKEditor - Added Youtube embed plugin
- CKEditor - Added advanced tab in image and link windows

*GZERO API*

- Codeception tests fixes

*GZERO CMS*

- Fixed block finder for static pages when multi language is disabled
- Added 'publishedAt', 'DESC' sort option for category children's in category handler
- Fixed DynamicRouter to use url without query string, so that pagination can work
- Fixed Block finder to show hidden blocks on root pages
- Fixed force delete bug, to properly delete thrashed contents
- Added cookies policy url option
- Added Mysql backup & restore artisan command

*GZERO SOCIAL*

- Added BaseController as parent controller so that $langs variables will be available in view
- CSS 'margin-zero-top' class replaced with 'm0' class from new platform style

##v0.0.4
- Docker improvements
- Ability to  disable multi language

##v0.0.3
- Added blocks
- Added docker

##v0.0.2
- Content translations management implementation on frontend and backend

##v0.0.1
- Migration on Laravel 5
