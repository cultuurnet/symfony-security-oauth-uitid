<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 09/09/15
 * Time: 09:25
 */

namespace CultuurNet\SymfonySecurityOAuthUitid;

use CultuurNet\SymfonySecurityOAuth\Model\ConsumerInterface;
use CultuurNet\SymfonySecurityOAuth\Model\Provider\ConsumerProviderInterface;

class ConsumerProvider implements ConsumerProviderInterface
{

    /**
     * @param $consumerKey
     * @return \CultuurNet\SymfonySecurityOAuth\Model\ConsumerInterface
     */
    public function getConsumerByKey($consumerKey)
    {
        // TODO: Implement getConsumerByKey() method.
    }
}
