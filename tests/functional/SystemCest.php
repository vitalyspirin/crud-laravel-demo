<?php

class SystemCest
{
    public function _before(FunctionalTester $I)
    {
        $I->login();
    }

    public function success(FunctionalTester $I)
    {
        $I->amOnPage('/system');

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->see('MySql version');
    }
}
