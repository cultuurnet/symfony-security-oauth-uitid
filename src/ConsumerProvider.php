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
     * @var \CultuurNet\SymfonySecurityOAuth\Model\Consumer
     */
    private $consumer;

    /**
     * @param $consumerKey
     * @return \CultuurNet\SymfonySecurityOAuth\Service\
     */
    public function getConsumerByKey($consumerKey)
    {
        $uitid_consumer = $this->fetcher->getConsumer($consumerKey);
        $this->consumer = new Consumer(
            $uitid_consumer->getKey(),
            $uitid_consumer->getName(),
            $uitid_consumer->getName()
        );
        return $this->consumer;
    }
}
