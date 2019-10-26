<?php

class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests

    public function failedLogin(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('user_email', 'vitaly.spirin@gmail.com');
        $I->fillField('password', 'abc');

        $I->click('Login');

        $I->dontsee('Logout Vitaly');
        $I->see('These credentials do not match our records.');
    }

    public function successfulLogin(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('user_email', 'vitaly.spirin@gmail.com');
        $I->fillField('password', 'vitaly');

        $I->click('Login');

        $I->see('Logout Vitaly');
    }
}
