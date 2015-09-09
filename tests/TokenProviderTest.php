<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 09/09/15
 * Time: 11:22
 */

namespace CultuurNet\SymfonySecurityOAuthUitid;

use CultuurNet\Auth\ConsumerCredentials;
use CultuurNet\SymfonySecurityOAuth\Model\Consumer;
use CultuurNet\SymfonySecurityOAuth\Model\Token;

class TokenProviderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \CultuurNet\UitidCredentials\UitidCredentialsFetcher
     */
    protected $fetcher;

    /**
     * @var \CultuurNet\SymfonySecurityOAuthUitid\TokenProvider
     */
    protected $tokenProvider;

    public function setUp()
    {
        $this->fetcher = new UitidCredentialsFetcherMock('baseUrl', new ConsumerCredentials());
        $this->tokenProvider = new TokenProvider($this->fetcher);
    }

    public function testGetAccessTokenByToken()
    {
        $accessToken = $this->tokenProvider->getAccessTokenByToken('test');

        $consumerReference = new Consumer();
        $consumerReference->setConsumerKey('testConsumerKey');
        $consumerReference->setConsumerSecret('testConsumerSecret');
        $consumerReference->setName('consumerName');

        $userReference = new User('uid', 'nick', 'email@email.email');

        $accessTokenReference = new Token();
        $accessTokenReference->setToken('testToken');
        $accessTokenReference->setSecret('testTokenSecret');
        $accessTokenReference->setConsumer($consumerReference);
        $accessTokenReference->setUser($userReference);

        $this->assertEquals($accessTokenReference, $accessToken);
    }
}
