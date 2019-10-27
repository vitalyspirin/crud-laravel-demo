<?php

/**
 * Inherited Methods.
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
 */
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

    const USER_EMAIL = 'vitaly.spirin@gmail.com';
    const USER_PASSWORD = 'vitaly';

    /**
     * Define custom actions here.
     */
    public function login()
    {
        $I = $this;
        $I->amOnPage('/login');
        $I->submitForm('#login-form', [
            'user_email' => self::USER_EMAIL,
            'password' => self::USER_PASSWORD,
        ]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->dontSee('Login');
        $I->see('Logout');
    }
}
