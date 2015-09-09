<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 09/09/15
 * Time: 09:40
 */

namespace CultuurNet\SymfonySecurityOAuthUitid;

use CultuurNet\SymfonySecurityOAuth\Model\Provider\TokenProviderInterface;

class TokenProvider implements TokenProviderInterface
{

    /**
     * @param $oauth_token
     * @return mixed
     */
    public function getAccessTokenByToken($oauth_token)
    {
        // TODO: Implement getAccessTokenByToken() method.
    }
}
