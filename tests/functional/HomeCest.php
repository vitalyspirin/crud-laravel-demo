<?php

class HomeCest
{
    public function _before(FunctionalTester $I)
    {
        $I->login();
    }

    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage('/');

        $I->see('Logout Vitaly');
        $I->see('Home');

        $I->dontsee('User ID');
    }
}
