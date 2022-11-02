<?php

class SecurityHelper
{
    static private function createToken(): string
    {
        $chars
            = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < 15; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    static function sessionToken(
        string $sessionToken,
        string $requestToken
    ): string {
        if ($sessionToken === $requestToken) {
            $sessionToken = self::createToken();
        } else {
            throw new Exception("Токены не совпадают. Ваши данные отклонены.");
        }
        return $sessionToken;
    }
}