<?php namespace Platform;

class BlockCest {
    // tests
    public function canViewBlockInAllVisibleRegionsOnContent(FunctionalTester $I)
    {
        $user    = $I->haveUser();
        $content = $I->haveContent(['type' => 'content', 'is_active' => 1], $user);
        $route   = '/' . $content->route->translations[0]['lang_code'] . '/' . $content->route->translations[0]['url'];

        // HEADER REGION
        $headerBlock            = $I->haveBlock(['region' => 'header'], $user);
        $headerBlockTranslation = $headerBlock->translations[0];

        // FEATURED REGION
        $featuredBlock            = $I->haveBlock(['region' => 'featured'], $user);
        $featuredBlockTranslation = $featuredBlock->translations[0];

        // CONTENT HEADER REGION
        $contentHeaderBlock            = $I->haveBlock(['region' => 'contentHeader'], $user);
        $contentHeaderBlockTranslation = $contentHeaderBlock->translations[0];

        // CONTENT FOOTER REGION
        $contentFooterBlock            = $I->haveBlock(['region' => 'contentFooter'], $user);
        $contentFooterBlockTranslation = $contentFooterBlock->translations[0];

        // SIDEBAR LEFT REGION
        $sidebarLeftBlock            = $I->haveBlock(['region' => 'sidebarLeft'], $user);
        $sidebarLeftBlockTranslation = $sidebarLeftBlock->translations[0];

        // SIDEBAR RIGHT REGION
        $sidebarRightBlock            = $I->haveBlock(['region' => 'sidebarRight'], $user);
        $sidebarRightBlockTranslation = $sidebarRightBlock->translations[0];

        // FOOTER REGION
        $footerBlock            = $I->haveBlock(['region' => 'footer'], $user);
        $footerBlockTranslation = $footerBlock->translations[0];

        $I->wantTo('view block without filters on content in all visible regions');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        // HEADER REGION BLOCK
        $I->canSee($headerBlockTranslation->title);
        $I->canSee($headerBlockTranslation->body);

        // FEATURED REGION BLOCK
        $I->canSee($featuredBlockTranslation->title);
        $I->canSee($featuredBlockTranslation->body);

        // CONTENT HEADER REGION BLOCK
        $I->canSee($contentHeaderBlockTranslation->title);
        $I->canSee($contentHeaderBlockTranslation->body);

        // CONTENT FOOTER REGION BLOCK
        $I->canSee($contentFooterBlockTranslation->title);
        $I->canSee($contentFooterBlockTranslation->body);

        // SIDEBAR LEFT REGION BLOCK
        $I->canSee($sidebarLeftBlockTranslation->title);
        $I->canSee($sidebarLeftBlockTranslation->body);

        // SIDEBAR RIGHT REGION BLOCK
        $I->canSee($sidebarRightBlockTranslation->title);
        $I->canSee($sidebarRightBlockTranslation->body);

        // FOOTER REGION BLOCK
        $I->canSee($footerBlockTranslation->title);
        $I->canSee($footerBlockTranslation->body);
    }

    // tests
    public function canViewBlockInAllVisibleRegionsOnCategory(FunctionalTester $I)
    {
        $user    = $I->haveUser();
        $content = $I->haveContent(['type' => 'category', 'is_active' => 1], $user);
        $route   = '/' . $content->route->translations[0]['lang_code'] . '/' . $content->route->translations[0]['url'];

        // HEADER REGION
        $headerBlock            = $I->haveBlock(['region' => 'header'], $user);
        $headerBlockTranslation = $headerBlock->translations[0];

        // FEATURED REGION
        $featuredBlock            = $I->haveBlock(['region' => 'featured'], $user);
        $featuredBlockTranslation = $featuredBlock->translations[0];

        // CONTENT HEADER REGION
        $contentHeaderBlock            = $I->haveBlock(['region' => 'contentHeader'], $user);
        $contentHeaderBlockTranslation = $contentHeaderBlock->translations[0];

        // CONTENT FOOTER REGION
        $contentFooterBlock            = $I->haveBlock(['region' => 'contentFooter'], $user);
        $contentFooterBlockTranslation = $contentFooterBlock->translations[0];

        // SIDEBAR LEFT REGION
        $sidebarLeftBlock            = $I->haveBlock(['region' => 'sidebarLeft'], $user);
        $sidebarLeftBlockTranslation = $sidebarLeftBlock->translations[0];

        // SIDEBAR RIGHT REGION
        $sidebarRightBlock            = $I->haveBlock(['region' => 'sidebarRight'], $user);
        $sidebarRightBlockTranslation = $sidebarRightBlock->translations[0];

        // FOOTER REGION
        $footerBlock            = $I->haveBlock(['region' => 'footer'], $user);
        $footerBlockTranslation = $footerBlock->translations[0];

        $I->wantTo('view block without filters on category in all visible regions');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        // HEADER REGION BLOCK
        $I->canSee($headerBlockTranslation->title);
        $I->canSee($headerBlockTranslation->body);

        // FEATURED REGION BLOCK
        $I->canSee($featuredBlockTranslation->title);
        $I->canSee($featuredBlockTranslation->body);

        // CONTENT HEADER REGION BLOCK
        $I->canSee($contentHeaderBlockTranslation->title);
        $I->canSee($contentHeaderBlockTranslation->body);

        // CONTENT FOOTER REGION BLOCK
        $I->canSee($contentFooterBlockTranslation->title);
        $I->canSee($contentFooterBlockTranslation->body);

        // SIDEBAR LEFT REGION BLOCK
        $I->canSee($sidebarLeftBlockTranslation->title);
        $I->canSee($sidebarLeftBlockTranslation->body);

        // SIDEBAR RIGHT REGION BLOCK
        $I->canSee($sidebarRightBlockTranslation->title);
        $I->canSee($sidebarRightBlockTranslation->body);

        // FOOTER REGION BLOCK
        $I->canSee($footerBlockTranslation->title);
        $I->canSee($footerBlockTranslation->body);
    }

    // tests
    public function canViewBlockInAllVisibleRegionsOnHomepage(FunctionalTester $I)
    {
        $user = $I->haveUser();

        // HOMEPAGE REGION
        $homepageBlock            = $I->haveBlock(['region' => 'homepage'], $user);
        $homepageBlockTranslation = $homepageBlock->translations[0];

        // HEADER REGION
        $headerBlock            = $I->haveBlock(['region' => 'header'], $user);
        $headerBlockTranslation = $headerBlock->translations[0];

        // FEATURED REGION
        $featuredBlock            = $I->haveBlock(['region' => 'featured'], $user);
        $featuredBlockTranslation = $featuredBlock->translations[0];

        // CONTENT HEADER REGION
        $contentHeaderBlock            = $I->haveBlock(['region' => 'contentHeader'], $user);
        $contentHeaderBlockTranslation = $contentHeaderBlock->translations[0];

        // CONTENT FOOTER REGION
        $contentFooterBlock            = $I->haveBlock(['region' => 'contentFooter'], $user);
        $contentFooterBlockTranslation = $contentFooterBlock->translations[0];

        // SIDEBAR LEFT REGION
        $sidebarLeftBlock            = $I->haveBlock(['region' => 'sidebarLeft'], $user);
        $sidebarLeftBlockTranslation = $sidebarLeftBlock->translations[0];

        // SIDEBAR RIGHT REGION
        $sidebarRightBlock            = $I->haveBlock(['region' => 'sidebarRight'], $user);
        $sidebarRightBlockTranslation = $sidebarRightBlock->translations[0];

        // FOOTER REGION
        $footerBlock            = $I->haveBlock(['region' => 'footer'], $user);
        $footerBlockTranslation = $footerBlock->translations[0];

        $I->wantTo('view block without filters on homepage in all visible regions');
        $I->amOnPage('/en');
        $I->seeResponseCodeIs(200);

        // HOMEPAGE REGION BLOCK
        $I->canSee($homepageBlockTranslation->title);
        $I->canSee($homepageBlockTranslation->body);

        // HEADER REGION BLOCK
        $I->canSee($headerBlockTranslation->title);
        $I->canSee($headerBlockTranslation->body);

        // FEATURED REGION BLOCK
        $I->canSee($featuredBlockTranslation->title);
        $I->canSee($featuredBlockTranslation->body);

        // CONTENT HEADER REGION BLOCK
        $I->canSee($contentHeaderBlockTranslation->title);
        $I->canSee($contentHeaderBlockTranslation->body);

        // CONTENT FOOTER REGION BLOCK
        $I->canSee($contentFooterBlockTranslation->title);
        $I->canSee($contentFooterBlockTranslation->body);

        // SIDEBAR LEFT REGION BLOCK
        $I->canSee($sidebarLeftBlockTranslation->title);
        $I->canSee($sidebarLeftBlockTranslation->body);

        // SIDEBAR RIGHT REGION BLOCK
        $I->canSee($sidebarRightBlockTranslation->title);
        $I->canSee($sidebarRightBlockTranslation->body);

        // FOOTER REGION BLOCK
        $I->canSee($footerBlockTranslation->title);
        $I->canSee($footerBlockTranslation->body);
    }

    // tests
    public function canViewVisibleBlocksOnContent(FunctionalTester $I)
    {
        $user     = $I->haveUser();
        $content1 = $I->haveContent(['type' => 'category', 'is_active' => 1], $user);
        $content2 = $I->haveContent(['type' => 'category', 'is_active' => 1, 'parent_id' => $content1->id], $user);
        $content3 = $I->haveContent(['type' => 'category', 'is_active' => 1, 'parent_id' => $content2->id], $user);
        $content4 = $I->haveContent(['type' => 'category', 'is_active' => 1, 'parent_id' => $content3->id], $user);
        $content5 = $I->haveContent(['type' => 'category', 'is_active' => 1, 'parent_id' => $content4->id], $user);
        $content6 = $I->haveContent(['type' => 'content', 'is_active' => 1, 'parent_id' => $content5->id], $user);
        $route    = '/' . $content6->route->translations[0]['lang_code'] . '/' . $content6->route->translations[0]['url'];

        // Block visible on all pages
        $block1            = $I->haveBlock(['filter' => []], $user);
        $block1Translation = $block1->translations[0];
        // Block visible on all root children's pages
        $block2            = $I->haveBlock(['filter' => ['+' => [$content1->id . '/*']]], $user);
        $block2Translation = $block2->translations[0];
        // Block hidden on all root children's pages
        $block3            = $I->haveBlock(['filter' => ['-' => [$content1->id . '/*']]], $user);
        $block3Translation = $block3->translations[0];
        // Block visible only on that content
        $block4            = $I->haveBlock(['filter' => ['+' => [$content6->path]]], $user);
        $block4Translation = $block4->translations[0];
        // Block hidden only on that content
        $block5            = $I->haveBlock(['filter' => ['-' => [$content6->path]]], $user);
        $block5Translation = $block5->translations[0];
        // Block visible for all content parents children's
        $block6            = $I->haveBlock(['filter' => ['+' => [$content3->path . '*']]], $user);
        $block6Translation = $block6->translations[0];
        // Block hidden for all content parents children's
        $block7            = $I->haveBlock(['filter' => ['-' => [$content3->path . '*']]], $user);
        $block7Translation = $block7->translations[0];

        $I->wantTo('view blocks visible on content in header region');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        // Block visible on all pages
        $I->canSee($block1Translation->title);
        $I->canSee($block1Translation->body);
        // Block visible on all root children's pages
        $I->canSee($block2Translation->title);
        $I->canSee($block2Translation->body);
        // Block hidden on all root children's pages
        $I->cantSee($block3Translation->title);
        $I->cantSee($block3Translation->body);
        // Block visible only on that content
        $I->canSee($block4Translation->title);
        $I->canSee($block4Translation->body);
        // Block hidden only on that content
        $I->cantSee($block5Translation->title);
        $I->cantSee($block5Translation->body);
        // Block visible for all content parents children's
        $I->canSee($block6Translation->title);
        $I->canSee($block6Translation->body);
        // Block hidden for all content parents children's
        $I->cantSee($block7Translation->title);
        $I->cantSee($block7Translation->body);
    }

    // tests
    public function canViewVisibleBlocksOnHomepage(FunctionalTester $I)
    {
        $user     = $I->haveUser();
        $content1 = $I->haveContent(['type' => 'category', 'is_active' => 1], $user);
        $content2 = $I->haveContent(['type' => 'category', 'is_active' => 1, 'parent_id' => $content1->id], $user);
        $content3 = $I->haveContent(['type' => 'category', 'is_active' => 1, 'parent_id' => $content2->id], $user);
        $content4 = $I->haveContent(['type' => 'category', 'is_active' => 1, 'parent_id' => $content3->id], $user);
        $content5 = $I->haveContent(['type' => 'category', 'is_active' => 1, 'parent_id' => $content4->id], $user);
        $route    = '/en';

        // Block visible on all pages
        $block1            = $I->haveBlock(['filter' => []], $user);
        $block1Translation = $block1->translations[0];
        // Block visible on all root children's pages
        $block2            = $I->haveBlock(['filter' => ['+' => [$content1->id . '/*']]], $user);
        $block2Translation = $block2->translations[0];
        // Block hidden on all root children's pages
        $block3            = $I->haveBlock(['filter' => ['-' => [$content1->id . '/*']]], $user);
        $block3Translation = $block3->translations[0];
        // Block visible only on homepage
        $block4            = $I->haveBlock(['filter' => ['+' => ['home']]], $user);
        $block4Translation = $block4->translations[0];
        // Block hidden only on homepage
        $block5            = $I->haveBlock(['filter' => ['-' => ['home']]], $user);
        $block5Translation = $block5->translations[0];
        // Block visible for all content parents children's
        $block6            = $I->haveBlock(['filter' => ['+' => [$content3->path . '*']]], $user);
        $block6Translation = $block6->translations[0];
        // Block hidden for all content parents children's
        $block7            = $I->haveBlock(['filter' => ['-' => [$content3->path . '*']]], $user);
        $block7Translation = $block7->translations[0];

        $I->wantTo('view blocks visible on homepage in header region');
        $I->amOnPage($route);
        $I->seeResponseCodeIs(200);

        // Block visible on all pages
        $I->canSee($block1Translation->title);
        $I->canSee($block1Translation->body);
        // Block visible on all root children's pages
        $I->cantSee($block2Translation->title);
        $I->cantSee($block2Translation->body);
        // Block hidden on all root children's pages
        $I->cantSee($block3Translation->title);
        $I->cantSee($block3Translation->body);
        // Block visible only on homepage
        $I->canSee($block4Translation->title);
        $I->canSee($block4Translation->body);
        // Block hidden only on homepage
        $I->cantSee($block5Translation->title);
        $I->cantSee($block5Translation->body);
        // Block visible for all content parents children's
        $I->cantSee($block6Translation->title);
        $I->cantSee($block6Translation->body);
        // Block hidden for all content parents children's
        $I->cantSee($block7Translation->title);
        $I->cantSee($block7Translation->body);
    }
}
