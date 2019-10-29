<?php

class UserDeleteCest
{
    public function _before(FunctionalTester $I)
    {
        $I->login();
    }

    public function success(FunctionalTester $I)
    {
        $I->amOnPage('/users');

        $email = FunctionalTester::DISABLED_USER_EMAIL;

        $I->seeRecord('App\User', ['user_email' => $email]);
        $user = $I->grabRecord('App\User', ['user_email' => $email]);

        $I->click("delete-button-for-user-id-{$user->user_id}");
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->dontSeeRecord('App\User', ['user_email' => $email]);
    }
}
