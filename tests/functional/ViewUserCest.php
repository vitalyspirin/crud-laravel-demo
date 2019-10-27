<?php

class ViewUserCest
{
    public function _before(FunctionalTester $I)
    {
        $I->login();

        $this->user = $I->grabRecord('App\User');
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage("/users/{$this->user->user_id}");

        $I->see('View User');

        $I->see('User Email');
        $I->see($this->user->user_email);

        $I->see('Home address (default)', 'dt');
        $I->see('Work address', 'dt');

        $I->see('Contact Email (default)', 'dt');
        $I->see('Contact Phone', 'dt');

        $I->see(\App\User::getAddressString($this->user->user_address[0]));
    }
}
