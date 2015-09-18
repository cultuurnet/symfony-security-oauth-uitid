<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 09/09/15
 * Time: 09:41
 */

namespace CultuurNet\SymfonySecurityOAuthUitid;

use CultuurNet\SymfonySecurityOAuth\Model\ConsumerInterface;
use CultuurNet\SymfonySecurityOAuth\Model\Provider\NonceProviderInterface;

class NonceProvider implements NonceProviderInterface
{
    /**
     * @param $nonce
     * @param $timestamp
     * @param  \CultuurNet\SymfonySecurityOAuth\Model\ConsumerInterface $consumer
     * @return boolean
     */
    public function registerNonceAndTimestamp($nonce, $timestamp, ConsumerInterface $consumer)
    {
        // TODO: Implement registerNonceAndTimestamp() method.
        // For now we'll just return true.
        return true;
    }
}
