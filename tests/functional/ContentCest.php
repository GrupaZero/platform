<?php namespace platform;

class ContentCest {

    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function canViewArticle(FunctionalTester $I)
    {
        $I->wantTo('view article');
        $I->amOnPage('/en/news/and-she-heard-every-moment-alice');
        $I->seeResponseCodeIs(200);

        $I->canSee('And she heard every moment Alice.');
        $I->canSee('Gryphon is, look at me like a tunnel for some way, and then I\'ll tell you his history');
        $I->canSee('Posted by Vern Lind');
        $I->canSee('26-11-2015');
    }

    public function canUseArticleBreadcrumbs(FunctionalTester $I)
    {
        $I->wantTo('use breadcrumbs to go back to category view from article');
        $I->amOnPage('/en/news/and-she-heard-every-moment-alice');
        $I->seeResponseCodeIs(200);

        $I->seeLink('News', '/en/news');
        $I->seeLink('Start', '/en');
        $I->click('News');
        $I->canSeeCurrentUrlEquals('/en/news');
    }

    public function canViewCategory(FunctionalTester $I)
    {
        $I->wantTo('view category');
        $I->amOnPage('/en/news');
        $I->seeResponseCodeIs(200);

        $I->canSee('News');
        $I->see('They all wash the rest her arm, with.');
        $I->see('You see, Miss, we\'re doing out.');
    }

    public function canGoToArticleFromCategory(FunctionalTester $I)
    {
        $I->wantTo('read more');
        $I->amOnPage('/en/news');
        $I->seeResponseCodeIs(200);

        $I->click('Read more');
        $I->canSeeCurrentUrlEquals('/en/news/they-all-wash-the-rest-her-arm-with');
    }

    public function canSeeNotPublishedContentAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('see not published content as admin user');
        $I->loginAsAdmin();
        $I->amOnPage('/en/offer/half-past-one-but-it-vanished');
        $I->seeResponseCodeIs(200);

        $I->see('Half-past one, but it vanished.');
        $I->see('This content is not published.');
    }

    public function cantSeeNotPublishedContent(FunctionalTester $I)
    {
        $I->wantTo('try to see not published content as regular user');
        $I->amOnPage('/en/offer/half-past-one-but-it-vanished');
        $I->seeResponseCodeIs(404);
    }

    public function seeStickyContentOnTopOfTheList(FunctionalTester $I)
    {
        $I->wantTo('see sticky content on the top of the list');
        $I->amOnPage('/en/offer');
        $I->seeResponseCodeIs(200);

        $I->see('And took them attempted to be a few.', '(//h2)[1]');
    }

    public function seePromotedContentOnTopOfTheList(FunctionalTester $I)
    {
        $I->wantTo('see promoted content on the top of the list');
        $I->amOnPage('/en/offer');
        $I->seeResponseCodeIs(200);

        $I->see('I\'m mad.\' \'I haven\'t the Cheshire.', '(//h2)[2]');
    }

    public function contentsAreOrderedByWeight(FunctionalTester $I)
    {
        $I->wantTo('check if heavier contents go to bottom');
        $I->amOnPage('/en/offer');
        $I->seeResponseCodeIs(200);

        $I->see('YOU manage?\' Alice thought she.', '(//h2)[4]');
        $I->see('Alice had been of an offended tone..', '(//h2)[5]');
    }

    public function canSeeSubcategory(FunctionalTester $I)
    {
        $I->wantTo('see subcategory');
        $I->amOnPage('/en/news/lorem');
        $I->seeResponseCodeIs(200);

        $I->see('Lorem');
        $I->see('Phosfluorescently');
    }

    public function canSeeArticleFromSubcategory(FunctionalTester $I)
    {
        $I->wantTo('see article from subcategory');
        $I->amOnPage('/en/news/lorem');
        $I->seeResponseCodeIs(200);

        $I->see('Phosfluorescently');
    }

    public function canSeeNotPublishedCategoryAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('see not published category as admin');
        $I->loginAsAdmin();
        $I->amOnPage('/en/news/ipsum');
        $I->seeResponseCodeIs(200);

        $I->see('Ipsum');
        $I->see('This content is not published.');
    }
    /*
    public function canSeeArticleInNotPublishedCategoryAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('see article in not published category as admin');
        $I->loginAsAdmin();
        $I->amOnPage('/en/news/ipsum/test');
        $I->seeResponseCodeIs(200);

        $I->see('Test');
        $I->see('This content is not published.');
    }
    */
    public function cantSeeNotPublishedCategoryAsUser(FunctionalTester $I)
    {
        $I->wantTo('cant see unpublished category as user');
        $I->amOnPage('/en/news/ipsum');
        $I->seeResponseCodeIs(404);
    }
    /*
    public function cantSeeArticleInNotPublishedCategoryAsUser(FunctionalTester $I)
    {
        $I->wantTo('cant see article in not published category as user');
        $I->amOnPage('/en/news/ipsum/test');
        $I->seeResponseCodeIs(404);
    }
    */
    public function canUsePagination(FunctionalTester $I)
    {
        $I->wantTo('use pagination on category view');
        $I->amOnPage('/en/news/');
        $I->seeResponseCodeIs(200);
        $I->see('And she heard every moment Alice.');

        $I->click('2');
        $I->canSeeCurrentUrlEquals('/en/news?page=2');
        $I->see('They were quite follow it to rest.');
    }

}

