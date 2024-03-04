<?php

namespace Garcia;

use Exception;

final class JWT
{
    /**
     * @var string $secret - The secret key used to sign the JWT
     */
    private string $secret;

    /**
     * @var string $algorithm - The algorithm used to sign the JWT
     */
    private string $algorithm;

    public function __construct(string $secret, string $algorithm = 'sha256')
    {
        $this->secret = $secret;
        $this->algorithm = $algorithm;
    }

    /**
     * Encodes the payload into a JSON Web Token
     *
     * @param array $payload - The payload to encode
     *
     * @return string - The encoded token
     */
    public function encode(array $payload): string
    {
        // Set the token expiration
        $expiration = time() + 60 * 60;

        // Create the token header and payload
        $header = $this->based64UrlEncode(json_encode(['typ' => 'JWT', 'alg' => $this->algorithm]));
        $payload = $this->based64UrlEncode(json_encode(['exp' => $expiration] + $payload));

        // Sign the token header and payload
        $signature = $this->based64UrlEncode(hash_hmac($this->algorithm, "$header.$payload", $this->secret, true));

        // Base64Url encode the signature
        return "$header.$payload.$signature";
    }

    /**
     * Decodes a JSON Web Token
     *
     * @param string $token - The token to decode
     *
     * @return object - The decoded payload
     * @throws Exception - If the token signature is invalid
     */
    public function decode(string $token): object
    {
        // Split the token into its respective parts
        [$header, $payload, $signature] = explode('.', $token);

        // Verify the token signature
        $verified = hash_hmac($this->algorithm, "$header.$payload", $this->secret, true);

        // If the signature is invalid, throw an exception
        if (!hash_equals($signature, $this->based64UrlEncode($verified))) {
            throw new Exception('Invalid token signature');
        }

        // Decode the payload
        return json_decode($this->based64UrlDecode($payload));
    }

    /**
     * Encodes the input using base64url.
     *
     * @param string $input - The input to encode
     *
     * @return string - The decoded payload
     */
    private function based64UrlEncode(string $input): string
    {
        return str_replace('=', '', strtr(base64_encode($input), '+/', '-_'));
    }

    /**
     * Decodes the input using base64url.
     *
     * @param string $input
     * @return string - The decoded payload
     */
    private function based64UrlDecode(string $input): string
    {
        return base64_decode(str_pad(strtr($input, '-_', '+/'), strlen($input) % 4, '=', STR_PAD_RIGHT));
    }
}
