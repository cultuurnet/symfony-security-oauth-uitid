<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 09.09.15
 * Time: 12:31
 */

namespace CultuurNet\SymfonySecurityOAuthUitid;

use CultuurNet\Auth\ConsumerCredentials;
use CultuurNet\SymfonySecurityOAuth\Model\Consumer;

class ConsumerProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \CultuurNet\UitidCredentials\UitidCredentialsFetcher
     */
    protected $fetcher;

    /**
     * @var \CultuurNet\SymfonySecurityOAuthUitid\ConsumerProvider
     */
    protected $consumerProvider;

    public function setUp()
    {
        $this->fetcher = new UitidCredentialsFetcherMock('baseUrl', new ConsumerCredentials());
        $this->consumerProvider = new ConsumerProvider($this->fetcher);
    }

    public function testGetAccessTokenByToken()
    {
        $accessConsumer = $this->consumerProvider->getConsumerByKey('test');

        $consumerReference = new Consumer();
        $consumerReference->setConsumerKey('testConsumerKey');
        $consumerReference->setConsumerSecret('testConsumerSecret');
        $consumerReference->setName('consumerName');

        $this->assertEquals($consumerReference, $accessConsumer);
    }
}
