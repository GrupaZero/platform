<?php namespace Platform;

class SEOCest {

    /**
     * @param FunctionalTester $I
     */
    public function canSee301Redirect(FunctionalTester $I)
    {
        $I->wantTo('see 301 redirect from home page without lang');
        $I->stopFollowingRedirects();
        $I->amOnPage('/');
        $I->seeResponseCodeIs(301);
    }

    /**
     * @param FunctionalTester $I
     */
    public function canSeeCorrectPaginationLinks(FunctionalTester $I)
    {
        $I->wantTo('can see correct pagination links');

        $user = $I->haveUser();
        for ($i = 1; $i <= 30; $i++) {
            $I->haveContent(
                [
                    'type'       => 'content',
                    'is_active'  => 1,
                    'is_on_home' => 1
                ],
                $user
            );
        }

        $I->stopFollowingRedirects();
        $I->amOnPage('/en');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost/en"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost/en?page=2"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost/en?page=2"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost/en"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost/en?page=3"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/en?test=32&page=2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost/en?page=2"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost/en"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost/en?page=3"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/en?test=32&page=2&nextParam=true');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost/en?page=2"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost/en"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost/en?page=3"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=2&nextParam=true');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost/en?page=2"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost/en"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost/en?page=3"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=3');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost/en?page=3"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost/en?page=2"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost/en?page=4"/>');
    }

    /**
     * @env ml_disabled
     *
     * @param FunctionalTester $I
     */
    public function canSeeCorrectPaginationLinksWithMlDisabled(FunctionalTester $I)
    {
        $I->wantTo('can see correct pagination links with ml disabled');

        $user = $I->haveUser();
        for ($i = 1; $i <= 30; $i++) {
            $I->haveContent(
                [
                    'type'       => 'content',
                    'is_active'  => 1,
                    'is_on_home' => 1
                ],
                $user
            );
        }

        $I->stopFollowingRedirects();
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost?page=2"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/?page=2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost?page=2"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost?page=3"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/?test=32&page=2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost?page=2"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost?page=3"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/?test=32&page=2&nextParam=true');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost?page=2"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost?page=3"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/?page=2&nextParam=true');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost?page=2"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost?page=3"/>');

        $I->stopFollowingRedirects();
        $I->amOnPage('/?page=3');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<link rel="canonical" href="http://localhost?page=3"/>');
        $I->seeResponseContains('<link rel="prev" href="http://localhost?page=2"/>');
        $I->seeResponseContains('<link rel="next" href="http://localhost?page=4"/>');
    }
}

