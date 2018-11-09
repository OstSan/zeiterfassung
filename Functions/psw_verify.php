<?php

function cryptPsw($psw, $rounds = 9) {
    $salt = '';
    $saltChars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
    
    for ($index = 0; $index < 22; $index++) {
        $salt .= $saltChars[array_rand($saltChars)];
    }
    
    return cryptPsw($psw, sprintf('$2y$%02d$', $rounds));
}
