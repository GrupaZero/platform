<?php namespace Platform;

class ContentCest {

    public function canViewArticle(FunctionalTester $I)
    {
        $user        = $I->haveUser();
        $content     = $I->haveContent(['type' => 'content', 'is_active' => 1], $user);
        $route       = '/' . $content->route->translations[0]['lang_code'] . '/' . $content->route->translations[0]['url'];
        $translation = $content->translations[0];

        $I->wantTo('view article ' . $content->id);
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->canSee($translation->title);
        $I->canSee($translation->body);
        $I->canSee($user->nick);
        $I->canSee($content->published_at);
    }


    public function canUseArticleBreadcrumbs(FunctionalTester $I)
    {
        $user     = $I->haveUser();
        $category = $I->haveContent(
            [
                'type'         => 'category',
                'is_active'    => 1,
                'translations' => [
                    'title'     => 'Przykładowa kategoria.',
                    'lang_code' => 'en',
                    'is_active' => 1
                ]
            ],
            $user
        );
        $content  = $I->haveContent(['type' => 'content', 'is_active' => 1, 'parent_id' => $category->id], $user);

        $contentRoute  = '/' . $content->route->translations[0]['lang_code'] . '/' . $content->route->translations[0]['url'];
        $categoryRoute = '/' . $category->route->translations[0]['lang_code'] . '/' . $category->route->translations[0]['url'];
        $linkName      = $category->translations[0]->title;

        $I->wantTo('use breadcrumbs to go back to category view from article');
        $I->amOnPage($contentRoute);
        $I->seeResponseCodeIs(200);

        $I->seeLink($linkName, $categoryRoute);
        $I->seeLink('Home', '/en');
        $I->click($linkName);
        $I->canSeeCurrentUrlEquals($categoryRoute);
    }


    public function canViewCategory(FunctionalTester $I)
    {
        $category = $I->haveContent(['type' => 'category', 'is_active' => 1]);
        $content  = $I->haveContent(['type' => 'content', 'is_active' => 1, 'parent_id' => $category->id]);
        $route    = '/' . $category->route->translations[0]['lang_code'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('view category');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->see($category->translations[0]->title);
        $I->see($content->translations[0]->title);
    }


    public function canGoToArticleFromCategory(FunctionalTester $I)
    {
        $category      = $I->haveContent(['type' => 'category', 'is_active' => 1]);
        $content       = $I->haveContent(['type' => 'content', 'is_active' => 1, 'parent_id' => $category->id]);
        $contentRoute  = '/' . $content->route->translations[0]['lang_code'] . '/' . $content->route->translations[0]['url'];
        $categoryRoute = '/' . $category->route->translations[0]['lang_code'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('read more');
        $I->amOnPage($categoryRoute);
        $I->seeResponseCodeIs(200);

        $I->click('Read more');
        $I->canSeeCurrentUrlEquals($contentRoute);
    }

    public function canSeeNotPublishedContentAsAdmin(FunctionalTester $I)
    {
        $user         = $I->haveUser();
        $category     = $I->haveContent(['type' => 'category', 'is_active' => 1], $user);
        $content      = $I->haveContent(['type' => 'content', 'is_active' => 0, 'parent_id' => $category->id], $user);
        $contentRoute = '/' . $content->route->translations[0]['lang_code'] . '/' . $content->route->translations[0]['url'];

        $I->wantTo('see not published content as admin user');
        $I->loginAsAdmin();
        $I->amOnPage($contentRoute);
        $I->seeResponseCodeIs(200);

        $I->see($content->translations[0]->title);
        $I->see('This content is not published.');
    }

    public function cantSeeNotPublishedContentAsRegularUser(FunctionalTester $I)
    {
        $user      = $I->haveUser(['email' => 'user@example.com', 'password' => bcrypt('test123')]);
        $otherUser = $I->haveUser();
        $content   = $I->haveContent(['type' => 'content', 'is_active' => 0], $otherUser);
        $route     = '/' . $content->route->translations[0]['lang_code'] . '/' . $content->route->translations[0]['url'];

        $I->wantTo('try to see not published content as regular user');
        $I->login('user@example.com', 'test123');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(404);
    }

    public function canSeeNotPublishedContentAsAuthor(FunctionalTester $I)
    {
        $user         = $I->haveUser(['email' => 'user@example.com', 'password' => bcrypt('test123')]);
        $content      = $I->haveContent(['type' => 'content', 'is_active' => 0], $user);
        $contentRoute = '/' . $content->route->translations[0]['lang_code'] . '/' . $content->route->translations[0]['url'];

        $I->wantTo('see not published content as author');
        $I->login('user@example.com', 'test123');
        $I->amOnPage($contentRoute);
        $I->seeResponseCodeIs(200);

        $I->see($content->translations[0]->title);
        $I->see('This content is not published.');
    }

    public function seeStickyContentOnTopOfTheList(FunctionalTester $I)
    {
        $category          = $I->haveContent(['type' => 'category', 'is_active' => 1]);
        $nonStickyContent1 = $I->haveContent(
            [
                'type'         => 'content',
                'is_active'    => 1,
                'is_sticky'    => 0,
                'parent_id'    => $category->id,
                'translations' => [
                    'lang_code' => 'en',
                    'title'     => 'And this is not.',
                    'is_active' => 1
                ]
            ]
        );
        $nonStickyContent2 = $I->haveContent(
            [
                'type'         => 'content',
                'is_active'    => 1,
                'is_sticky'    => 0,
                'parent_id'    => $category->id,
                'translations' => [
                    'lang_code' => 'en',
                    'title'     => 'And this is not. #2',
                    'is_active' => 1
                ]
            ]
        );
        $stickyContent1    = $I->haveContent(
            [
                'type'         => 'content',
                'is_active'    => 0,
                'is_sticky'    => 1,
                'parent_id'    => $category->id,
                'translations' => [
                    'lang_code' => 'en',
                    'title'     => 'This content is sticky but not active.',
                    'is_active' => 0
                ]
            ]
        );
        $stickyContent2    = $I->haveContent(
            [
                'type'         => 'content',
                'is_active'    => 1,
                'is_sticky'    => 1,
                'parent_id'    => $category->id,
                'translations' => [
                    'lang_code' => 'en',
                    'title'     => 'This content is sticky.',
                    'is_active' => 1
                ]
            ]
        );

        $route = '/' . $category->route->translations[0]['lang_code'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('see sticky content on the top of the list');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->see($stickyContent2->translations[0]->title, '(//h2)[1]');
    }


    public function seePromotedContentOnTopOfTheList(FunctionalTester $I)
    {
        $category            = $I->haveContent(['type' => 'category', 'is_active' => 1]);
        $nonPromotedContent1 = $I->haveContent(
            [
                'type'         => 'content',
                'is_active'    => 1,
                'is_promoted'  => 0,
                'parent_id'    => $category->id,
                'translations' => [
                    'lang_code' => 'en',
                    'title'     => 'And this is not',
                    'is_active' => 1
                ]
            ]
        );
        $nonPromotedContent2 = $I->haveContent(
            [
                'type'         => 'content',
                'is_active'    => 1,
                'is_promoted'  => 0,
                'parent_id'    => $category->id,
                'translations' => [
                    'lang_code' => 'en',
                    'title'     => 'And this is not #2',
                    'is_active' => 1
                ]
            ]
        );
        $promotedContent1    = $I->haveContent(
            [
                'type'         => 'content',
                'is_active'    => 0,
                'is_promoted'  => 1,
                'parent_id'    => $category->id,
                'translations' => [
                    'lang_code' => 'en',
                    'title'     => 'This content is promoted but not active',
                    'is_active' => 0
                ]
            ]
        );
        $promotedContent2    = $I->haveContent(
            [
                'type'         => 'content',
                'is_active'    => 1,
                'is_promoted'  => 1,
                'parent_id'    => $category->id,
                'translations' => [
                    'lang_code' => 'en',
                    'title'     => 'This content is promoted.',
                    'is_active' => 1
                ]
            ]
        );

        $route = '/' . $category->route->translations[0]['lang_code'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('see promoted content on the top of the list');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->see($promotedContent2->translations[0]->title, '(//h2)[1]');
    }

    public function canSeeNotPublishedCategoryAsAdmin(FunctionalTester $I)
    {
        $category = $I->haveContent(['type' => 'category', 'is_active' => 0]);
        $route    = '/' . $category->route->translations[0]['lang_code'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('see not published category as admin');
        $I->loginAsAdmin();
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->see($category->translations[0]->title);
        $I->see('This content is not published.');
    }

    public function cantSeeNotPublishedCategoryAsUser(FunctionalTester $I)
    {
        $category = $I->haveContent(['type' => 'category', 'is_active' => 0]);
        $route    = '/' . $category->route->translations[0]['lang_code'] . '/' . $category->route->translations[0]['url'];

        $I->wantTo('cant see unpublished category as user');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(404);
    }

    public function canUsePagination(FunctionalTester $I)
    {
        $category = $I->haveContent(['type' => 'category', 'is_active' => 1]);
        $route    = '/' . $category->route->translations[0]['lang_code'] . '/' . $category->route->translations[0]['url'];
        $counter  = 0;

        do {
            $I->haveContent(
                [
                    'is_active' => 1,
                    'parent_id' => $category->id
                ]
            );
            $counter++;
        } while ($counter <= 40);

        $I->wantTo('use pagination on category view');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        $I->click('2');
        $I->canSeeCurrentUrlEquals($route . '?page=2');
    }

    public function canNotSetPageNumberToValueOtherThanInteger(FunctionalTester $I)
    {
        $I->wantTo('can set page number to integer values only, otherwise set it to 1');

        $category = $I->haveContent(['type' => 'category', 'is_active' => 1]);
        $route    = '/' . $category->route->translations[0]['lang_code'] . '/' . $category->route->translations[0]['url'];

        $user = $I->haveUser();
        for ($i = 1; $i <= 30; $i++) {
            $I->haveContent([
                'type' => 'content',
                'is_active' => 1,
                'parent_id' => $category->id
            ], $user);
        }

        $I->stopFollowingRedirects();
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');

        // page number can be set if value is type of integer
        $I->stopFollowingRedirects();
        $I->amOnPage($route . '?page=2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>2</span></li>');
        $I->stopFollowingRedirects();
        $I->amOnPage($route . '?page=6');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>6</span></li>');

        // page number is set to 1 when it is set to non integer value, prevents sql injections
        $I->stopFollowingRedirects();
        $I->amOnPage($route . '?page=2%25%27+UNION+ALL+SELECT+NULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%23');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');
        $I->stopFollowingRedirects();
        $I->amOnPage($route . '?page=6%2F');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');
        $I->stopFollowingRedirects();
        $I->amOnPage($route . '?page=44%2F');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');
        $I->stopFollowingRedirects();
        $I->amOnPage($route . '?page=asd');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');

        // set page number to 1 when it is empty
        $I->stopFollowingRedirects();
        $I->amOnPage($route . '?page=');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');
    }
}
