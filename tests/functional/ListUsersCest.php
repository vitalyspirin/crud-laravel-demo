<?php

class ListUsersCest
{
    public function _before(FunctionalTester $I)
    {
        $I->login();
    }

    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage('/users');

        $I->see('Create User', 'a');
        $I->see('Action');

        $I->see(FunctionalTester::USER_EMAIL);
    }
}
