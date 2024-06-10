<?php

declare(strict_types=1);

namespace Pest\ArchPresets;

/**
 * @internal
 */
final class Laravel extends AbstractPreset
{
    /**
     * Executes the arch preset.
     */
    public function execute(): void
    {
        $this->expectations[] = expect([
            'env',
        ])->not->toBeUsed();

        $this->expectations[] = expect([
            'exit',
        ])->not->toBeUsed();

        $this->expectations[] = expect('App\Http\Controllers')
            ->toHaveSuffix('Controller');

        $this->expectations[] = expect('App\Models')
            ->not->toHaveSuffix('Model');

        $this->expectations[] = expect('App\Http\Requests')
            ->toHaveSuffix('Request');

        $this->expectations[] = expect('App\Console\Commands')
            ->toHaveSuffix('Command');
    }
}
