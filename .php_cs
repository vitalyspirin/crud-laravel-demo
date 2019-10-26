<?php

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules(
        [
            'phpdoc_to_comment' => false,
        ]

        +

        (require __DIR__.'/vendor/arubacao/php-cs-fixer-config/laravel.php_cs')->getRules()
    );