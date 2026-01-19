<?php

declare(strict_types=1);

namespace Adeliom\EnvIndicator;

class EnvIndicator
{
    public static function listen(?string $currentEnv = null): void
    {
        $env = $currentEnv ?? (getenv('APP_ENV') ?: 'production');

        // Exclusion de la production
        if (in_array(strtolower($env), ['prod', 'production', 'live'], true)) {
            return;
        }

        // Utilisation d'une fonction fléchée PHP 8
        ob_start(fn(string $buffer): string => TitleManager::injectIndicator($buffer, $env));
    }
}