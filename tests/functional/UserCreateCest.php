<?php

class UserCreateCest
{
    public function _before(FunctionalTester $I)
    {
        $I->login();

        $I->amOnPage('/users/create');
    }

    public function failedValidation(FunctionalTester $I)
    {
        $I->see('Create User', 'div');

        $I->fillField('user_firstname', 'TestFirstName');
        $I->fillField('user_lastname', 'TestLastName');
        $I->fillField('user_email', 'test@gmail.com');

        $I->click('Submit');

        $I->see('The password field is required when user id is not present.');
    }

    public function success(FunctionalTester $I)
    {
        $I->see('Create User', 'div');

        $I->fillField('user_firstname', 'TestFirstName');
        $I->fillField('user_lastname', 'TestLastName');
        $I->fillField('user_email', 'test@gmail.com');

        $I->fillField('password', 'abc123');
        $I->fillField('password_confirmation', 'abc123');

        $I->click('Submit');

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->see('TestFirstName', 'td');
        $I->see('TestLastName', 'td');
        $I->see('test@gmail.com', 'td');
    }
}
