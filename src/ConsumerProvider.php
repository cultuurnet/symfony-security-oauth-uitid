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
use CultuurNet\UitidCredentials\Command\GetConsumerCommand;
use CultuurNet\UitidCredentials\Entities\Consumer;
use CultuurNet\UitidCredentials\UitidCredentialsFetcher;

class ConsumerProvider implements ConsumerProviderInterface
{

    /**
     * @var \CultuurNet\UitidCredentials\UitidCredentialsFetcher
     */
    private $fetcher;

    /**
     * ConsumerProvider constructor.
     * @param UitidCredentialsFetcher $fetcher
     */
    public function __construct(UitidCredentialsFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }


    /**
     * @param $consumerKey
     * @return \CultuurNet\SymfonySecurityOAuth\Service\
     */
    public function getConsumerByKey($consumerKey)
    {
        $uitid_consumer = $this->fetcher->getConsumer($consumerKey);
        return $uitid_consumer;

        // TODO: Implement getConsumerByKey() method.
    }
}
