<?php

namespace Exxtensio\SecretsExtension;

class SecretService
{
    public function getSecret($secretName)
    {
        $client = new \Aws\SecretsManager\SecretsManagerClient([
            'version' => 'latest',
            'region' => 'eu-central-1'
        ]);

        $result = $client->getSecretValue([
            'SecretId' => $secretName,
        ]);

        return json_decode($result['SecretString'], true);
    }
}
