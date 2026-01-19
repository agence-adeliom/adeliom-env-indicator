<?php

namespace Adeliom\EnvIndicator;

enum Environment: string
{
    case LOCAL = 'local';
    case DEV = 'dev';
    case DEVELOPMENT = 'development';
    case PREPROD = 'preprod';
    case STAGING = 'staging';
    case TEST = 'test';

    public function getLabel(): string
    {
        return match($this) {
            self::LOCAL => '🏠 [LOCAL] ',
            self::DEV, self::DEVELOPMENT => '⚙️ [DEV] ',
            self::PREPROD => '🧪 [PREPROD] ',
            self::STAGING => '🧪 [STAGING] ',
            self::TEST => '📝 [TEST] ',
        };
    }
}