<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 09/09/15
 * Time: 09:40
 */

namespace CultuurNet\SymfonySecurityOAuthUitid;

use CultuurNet\SymfonySecurityOAuth\Model\Consumer;
use CultuurNet\SymfonySecurityOAuth\Model\Provider\TokenProviderInterface;
use CultuurNet\SymfonySecurityOAuth\Model\Token;

class TokenProvider implements TokenProviderInterface
{
    /**
     * @var \CultuurNet\UitidCredentials\UitidCredentialsFetcher
     */
    private $fetcher;

    /**
     * @var \CultuurNet\SymfonySecurityOAuth\Model\TokenInterface
     */
    private $accessToken;

    public function __construct($fetcher)
    {
        $this->fetcher = $fetcher;
        $this->accessToken = new Token();
    }

    /**
     * @param $oauth_token
     * @return mixed
     */
    public function getAccessTokenByToken($oauth_token)
    {
        /** @var \CultuurNet\UitidCredentials\Entities\Token $uitid_token */
        $uitid_token = $this->fetcher->getAccessToken($oauth_token);

        /** @var \CultuurNet\UitidCredentials\Entities\Consumer $uitid_consumer */
        $uitid_consumer = $uitid_token->getConsumer();

        /** @var \CultuurNet\UitidCredentials\Entities\User $uitid_user */
        $uitid_user = $uitid_token->getUser();

        /** @var string $uitid_token_secret */
        $uitid_token_secret = $uitid_token->getTokenSecret();

        $consumer = new Consumer();
        $consumer->setName($uitid_consumer->getName());
        $consumer->setConsumerKey($uitid_consumer->getKey());
        $consumer->setConsumerSecret($uitid_consumer->getSecret());

        $user = new User($uitid_user->getUid(), $uitid_user->getNick(), $uitid_user->getEmail());

        $this->accessToken->setConsumer($consumer);
        $this->accessToken->setToken($uitid_token->getToken());
        $this->accessToken->setUser($user);
        $this->accessToken->setSecret($uitid_token_secret);

        return $this->accessToken;
    }
}
