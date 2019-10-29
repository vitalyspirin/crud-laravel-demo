<?php

class UserEditCest
{
    public function _before(FunctionalTester $I)
    {
        $I->login();

        $I->amOnPage('/users/2/edit');

        $I->see('Edit User', 'div');
    }

    public function failedValidation(FunctionalTester $I)
    {
        $I->fillField('user_lastname', '');

        $I->click('Submit');

        $I->see('The user lastname field is required.');
    }

    public function success(FunctionalTester $I)
    {
        $I->fillField('user_lastname', 'TestLastName');

        $I->fillField('user_contact[1][contact_type]', '_testContactType_');
        $I->fillField('user_contact[1][contact_value]', '_testContactValue_');

        $I->fillField('user_address[1][address_street]', '_testUserAddress_');

        $I->click('Submit');

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->see('TestLastName', 'td');
        $I->see('User ID', 'th');

        $I->amOnPage('/users/2/edit');
        $I->seeInField(['name' => 'user_contact[1][contact_type]'], '_testContactType_');
        $I->seeInField(['name' => 'user_contact[1][contact_value]'], '_testContactValue_');

        $I->seeInField(['name' => 'user_address[1][address_street]'], '_testUserAddress_');
    }
}
