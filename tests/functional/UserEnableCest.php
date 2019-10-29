<?php

class UserEnableCest
{
    public function _before(FunctionalTester $I)
    {
        $I->login();
    }

    public function success(FunctionalTester $I)
    {
        $I->amOnPage('/users');

        $email = FunctionalTester::DISABLED_USER_EMAIL;

        $I->seeRecord('App\User', ['user_email' => $email, 'user_isenabled' => 0]);
        $user = $I->grabRecord('App\User', ['user_email' => $email]);

        $I->click("enable-button-for-user-id-{$user->user_id}");
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->dontseeRecord('App\User', ['user_email' => $email, 'user_isenabled' => 0]);
        $I->seeRecord('App\User', ['user_email' => $email, 'user_isenabled' => 1]);
    }
}
