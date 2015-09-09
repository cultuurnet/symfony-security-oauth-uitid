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
use CultuurNet\UitidCredentials\UitidCredentialsService;

class TokenProvider implements TokenProviderInterface
{
    /**
     * @var \CultuurNet\UitidCredentials\UitidCredentialsService
     */
    private $fetcher;

    public function __construct(UitidCredentialsService $fetcher)
    {
        $this->fetcher = $fetcher;
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
        $accessToken = new Token();
        $accessToken->setConsumer($consumer);
        $accessToken->setToken($uitid_token->getToken());
        $accessToken->setUser($user);
        $accessToken->setSecret($uitid_token_secret);

        return $accessToken;
    }
}
