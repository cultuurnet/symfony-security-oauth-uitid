<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 09/09/15
 * Time: 12:09
 */

namespace CultuurNet\SymfonySecurityOAuthUitid;

use CultuurNet\UitidCredentials\Entities\Consumer;
use CultuurNet\UitidCredentials\Entities\Token;
use CultuurNet\UitidCredentials\Entities\User;
use CultuurNet\UitidCredentials\UitidCredentialsFetcher;

class UitidCredentialsFetcherMock extends UitidCredentialsFetcher
{
    public function getConsumer($consumerKey)
    {
        return new Consumer('testConsumerKey', 'testConsumerSecret', 'consumerName');
    }

    public function getAccessToken($tokenKey)
    {
        $consumer = new Consumer('testConsumerKey', 'testConsumerSecret', 'consumerName');
        $user = new User('uid', 'nick', 'email@email.email');

        return new Token('testToken', 'testTokenSecret', $user, $consumer);
    }
}
