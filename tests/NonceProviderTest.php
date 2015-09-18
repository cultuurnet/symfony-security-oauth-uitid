<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 18/09/15
 * Time: 13:22
 */

namespace CultuurNet\SymfonySecurityOAuthUitid;

use CultuurNet\SymfonySecurityOAuth\Model\Consumer;

class NonceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterNonceAndTimestamp()
    {
        $nonce = 'nonce';
        $timestamp = 500;
        $consumer = new Consumer();

        $nonceProvider = new NonceProvider();
        $hasRegistered = $nonceProvider->registerNonceAndTimestamp($nonce, $timestamp, $consumer);

        $this->assertEquals(true, $hasRegistered);
    }
}
