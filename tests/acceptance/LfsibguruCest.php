<?php
use yii\helpers\Url;

class LfsibguruCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/page/index?id=1'));
        $I->see('История', 'h1');
    }
}
