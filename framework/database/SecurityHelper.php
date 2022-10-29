<?php

class SecurityHelper
{
    static private function createToken(): string
    {
        $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < 15; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    static function CheckToken($data)
    {
        if (!empty($data['post'])) {
            if ($data['post']['csrf'] === $data['session']['csrf'])  { //не совершать действие
                $data['post'] = [];
                $data['message'] = 'Токены не совпадают. Ваши данные отклонены.';
            }
        } else {
            $data['session']['csrf'] = self::createToken();
        }
        return $data;
    }
}