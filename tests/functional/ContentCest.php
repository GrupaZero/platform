<?php namespace platform;

use Gzero\Entity\Content;
use Gzero\Entity\User;
use Gzero\Repository\ContentRepository;
use Gzero\Repository\UserRepository;
use Illuminate\Events\Dispatcher;

class ContentCest {

    public function __construct()
    {
        $this->contentRepo = new ContentRepository(new Content(), new Dispatcher());
        $this->userRepo    = new UserRepository(new User(), new Dispatcher());
    }

    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function canViewArticle(FunctionalTester $I)
    {
        $user        = $I->haveUser();
        $content     = $I->haveContent(['type' => 'content', 'isActive' => 1], $user);
        $route       = '/' . $content->route->translations[0]['langCode'] . '/' . $content->route->translations[0]['url'];
        $translation = $content->translations[0];

        $I->wantTo('view article ' . $content->id);
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->canSee($translation->title);
        $I->canSee($translation->body);
        $I->canSee($user->firstName . ' ' . $user->lastName);
        $I->canSee(date('d-m-Y', strtotime($content->createdAt)));
    }


    public function canUseArticleBreadcrumbs(FunctionalTester $I)
    {
        $user     = $I->haveUser();
        $category = $I->haveContent(
            [
                'type'         => 'category',
                'isActive'     => 1,
                'translations' => [
                    'title'    => 'lorem ipsum',
                    'langCode' => 'en',
                    'isActive'     => 1
                ]
            ],
            $user
        );
        $content  = $I->haveContent(['type' => 'content', 'isActive' => 1, 'parentId' => $category->id], $user);

        $contentRoute  = '/' . $content->route->translations[0]['langCode'] . '/' . $content->route->translations[0]['url'];
        $categoryRoute = '/' . $category->route->translations[0]['langCode'] . '/' . $category->route->translations[0]['url'];
        $linkName      = ucwords($category->translations[0]->title);

        $I->wantTo('use breadcrumbs to go back to category view from article');
        $I->amOnPage($contentRoute);
        $I->seeResponseCodeIs(200);

        $I->seeLink($linkName, $categoryRoute);
        $I->seeLink('Start', '/en');
        $I->click($linkName);
        $I->canSeeCurrentUrlEquals($categoryRoute);
    }


    public function canViewCategory(FunctionalTester $I)
    {
        $category = $I->haveContent(['type' => 'category', 'isActive' => 1]);
        $content  = $I->haveContent(['type' => 'content', 'isActive' => 1, 'parentId' => $category->id]);
        $route    = '/' . $category->route->translations[0]['langCode'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('view category');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->see($category->translations[0]->title);
        $I->see($content->translations[0]->title);
    }


    public function canGoToArticleFromCategory(FunctionalTester $I)
    {
        $category      = $I->haveContent(['type' => 'category', 'isActive' => 1]);
        $content       = $I->haveContent(['type' => 'content', 'isActive' => 1, 'parentId' => $category->id]);
        $contentRoute  = '/' . $content->route->translations[0]['langCode'] . '/' . $content->route->translations[0]['url'];
        $categoryRoute = '/' . $category->route->translations[0]['langCode'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('read more');
        $I->amOnPage($categoryRoute);
        $I->seeResponseCodeIs(200);

        $I->click('Read more');
        $I->canSeeCurrentUrlEquals($contentRoute);
    }

    public function canSeeNotPublishedContentAsAdmin(FunctionalTester $I)
    {
        $category     = $I->haveContent(['type' => 'category', 'isActive' => 1]);
        $content      = $I->haveContent(['type' => 'content', 'isActive' => 0, 'parentId' => $category->id]);
        $contentRoute = '/' . $content->route->translations[0]['langCode'] . '/' . $content->route->translations[0]['url'];

        $I->wantTo('see not published content as admin user');
        $I->loginAsAdmin();
        $I->amOnPage($contentRoute);
        $I->seeResponseCodeIs(200);

        $I->see($content->translations[0]->title);
        $I->see('This content is not published.');
    }

    public function cantSeeNotPublishedContentAsRegularUser(FunctionalTester $I)
    {
        $content = $I->haveContent(['type' => 'content', 'isActive' => 0]);
        $route   = '/' . $content->route->translations[0]['langCode'] . '/' . $content->route->translations[0]['url'];

        $I->wantTo('try to see not published content as regular user');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(404);
    }

    public function seeStickyContentOnTopOfTheList(FunctionalTester $I)
    {
        $category         = $I->haveContent(['type' => 'category', 'isActive' => 1]);
        $stickyContent    = $I->haveContent(
            [
                'type'         => 'content',
                'isActive'     => 1,
                'isSticky'     => 1,
                'parentId'     => $category->id,
                'translations' => [
                    'langCode' => 'en',
                    'title'    => 'ZZZ',
                    'isActive'     => 1
                ]
            ]
        );
        $nonStickyContent = $I->haveContent(
            [
                'type'         => 'content',
                'isActive'     => 1,
                'isSticky'     => 0,
                'parentId'     => $category->id,
                'translations' => [
                    'langCode' => 'en',
                    'title'    => 'AAA',
                    'isActive'     => 1
                ]
            ]
        );
        $route            = '/' . $category->route->translations[0]['langCode'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('see sticky content on the top of the list');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->see($stickyContent->translations[0]->title, '(//h2)[1]');
    }


    public function seePromotedContentOnTopOfTheList(FunctionalTester $I)
    {
        $category           = $I->haveContent(['type' => 'category', 'isActive' => 1]);
        $promotedContent    = $I->haveContent(
            [
                'type'         => 'content',
                'isActive'     => 1,
                'isPromoted'   => 1,
                'parentId'     => $category->id,
                'translations' => [
                    'langCode' => 'en',
                    'title'    => 'ZZZ',
                    'isActive'     => 1
                ]
            ]
        );
        $nonPromotedContent = $I->haveContent(
            [
                'type'         => 'content',
                'isActive'     => 1,
                'isPromoted'   => 0,
                'parentId'     => $category->id,
                'translations' => [
                    'langCode' => 'en',
                    'title'    => 'AAA',
                    'isActive'     => 1
                ]
            ]
        );
        $route              = '/' . $category->route->translations[0]['langCode'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('see sticky content on the top of the list');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->see($promotedContent->translations[0]->title, '(//h2)[1]');
    }


    public function contentsAreOrderedByWeight(FunctionalTester $I)
    {
        $category = $I->haveContent(['type' => 'category', 'isActive' => 1]);
        $route    = '/' . $category->route->translations[0]['langCode'] . '/' . $category->route->translations[0]['url'];
        $counter  = 1;
        $contents = [];

        do {
            $contents[$counter] = $I->haveContent(
                [
                    'isActive' => 1,
                    'weight'   => $counter,
                    'parentId' => $category->id
                ]
            );
            $counter++;
        } while ($counter <= 10);

        $I->wantTo('check if heavier contents go to bottom');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $counter = 1;

        do {
            $I->see($contents[$counter]->translations[0]->title, "(//h2)[{$counter}]");
            $counter++;
        } while ($counter <= 10);
    }

    public function canSeeNotPublishedCategoryAsAdmin(FunctionalTester $I)
    {
        $category = $I->haveContent(['type' => 'category', 'isActive' => 0]);
        $route    = '/' . $category->route->translations[0]['langCode'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('see not published category as admin');
        $I->loginAsAdmin();
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->see($category->translations[0]->title);
        $I->see('This content is not published.');
    }


    public function canSeeArticleInNotPublishedCategoryAsAdmin(FunctionalTester $I)
    {
        $category     = $I->haveContent(['type' => 'category', 'isActive' => 1]);
        $content      = $I->haveContent(['type' => 'content', 'isActive' => 1, 'parentId' => $category->id]);
        $contentRoute = '/' . $content->route->translations[0]['langCode'] . '/' . $content->route->translations[0]['url'];

        $I->wantTo('see article in not published category as admin');
        $I->loginAsAdmin();
        $I->amOnPage($contentRoute);
        $I->seeResponseCodeIs(200);

        $I->see($content->translations[0]->title);
        $I->see('This content is not published.');
    }


    public function cantSeeNotPublishedCategoryAsUser(FunctionalTester $I)
    {
        $category = $I->haveContent(['type' => 'category', 'isActive' => 0]);
        $route    = '/' . $category->route->translations[0]['langCode'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('cant see unpublished category as user');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(404);
    }


    public function cantSeeArticleInNotPublishedCategoryAsRegularUser(FunctionalTester $I)
    {
        $category     = $I->haveContent(['type' => 'category', 'isActive' => 0]);
        $content      = $I->haveContent(['type' => 'content', 'isActive' => 1, 'parentId' => $category->id]);
        $contentRoute = '/' . $content->route->translations[0]['langCode'] . '/' . $content->route->translations[0]['url'];

        $I->wantTo('cant see article in not published category as regular user');
        $I->amOnPage($contentRoute);
        $I->seeResponseCodeIs(404);
    }

    public function canUsePagination(FunctionalTester $I)
    {
        $category = $I->haveContent(['type' => 'category', 'isActive' => 1]);
        $route    = '/' . $category->route->translations[0]['langCode'] . '/' . $category->route->translations[0]['url'];
        $counter  = 0;

        do {
            $I->haveContent(
                [
                    'isActive' => 1,
                    'parentId' => $category->id
                ]
            );
            $counter++;
        } while ($counter <= 40);

        $I->wantTo('use pagination on category view');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->click('2');
        $I->canSeeCurrentUrlEquals($route.'?page=2');
    }

}
