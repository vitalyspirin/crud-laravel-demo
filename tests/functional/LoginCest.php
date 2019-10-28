<?php

class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function failedLoginWrongPassword(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('user_email', FunctionalTester::USER_EMAIL);
        $I->fillField('password', 'abc');

        $I->click('Login');

        $I->dontsee('Logout Vitaly');
        $I->see('These credentials do not match our records.');
    }

    public function failedLoginDisabledUser(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('user_email', FunctionalTester::DISABLED_USER_EMAIL);
        $I->fillField('password', FunctionalTester::DISABLED_USER_PASSWORD);

        $I->click('Login');

        $I->dontsee('Logout');
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
