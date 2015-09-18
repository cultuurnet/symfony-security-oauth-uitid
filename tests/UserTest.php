<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 18/09/15
 * Time: 13:14
 */

namespace CultuurNet\SymfonySecurityOAuthUitid;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testUserProperties()
    {
        $uid = '123';
        $nick = 'test';
        $email = 'test@test.test';
        $user = new User($uid, $nick, $email);

        $this->assertEquals($nick, $user->getUsername());
        $this->assertEquals(null, $user->getSalt());
        $this->assertEquals(array('ROLE_USER'), $user->getRoles());
        $this->assertEquals('', $user->getPassword());
    }
}
