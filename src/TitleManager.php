<?php

declare(strict_types=1);

namespace Adeliom\EnvIndicator;

class TitleManager
{
    public static function injectIndicator(string $html, string $envString): string
    {
        // On tente de mapper la string sur l'Enum
        $env = Environment::tryFrom(strtolower(trim($envString)));

        if (!$env || str_contains($html, '<title>') === false) {
            return $html;
        }

        $prefix = $env->getLabel();

        return preg_replace_callback(
            '/<title>(.*?)<\/title>/i',
            function (array $matches) use ($prefix): string {
                $currentTitle = $matches[1];
                // Évite l'injection multiple
                if (str_contains($currentTitle, trim($prefix))) {
                    return $matches[0];
                }
                return "<title>{$prefix}{$currentTitle}</title>";
            },
            $html,
            1
        ) ?? $html;
    }
}