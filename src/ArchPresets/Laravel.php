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
            'exit',
        ])->not->toBeUsed();

        $this->expectations[] = expect('App\Http\Controllers')
            ->toHaveSuffix('Controller');

        $this->expectations[] = expect('App\Http\Middleware')
            ->toHaveMethod('handle');

        $this->expectations[] = expect('App\Models')
            ->not->toHaveSuffix('Model');

        $this->expectations[] = expect('App\Http\Requests')
            ->toHaveSuffix('Request')
            ->toExtend('Illuminate\Foundation\Http\FormRequest') // @phpstan-ignore-line
            ->toHaveMethod('rules');

        $this->expectations[] = expect('App\Console\Commands')
            ->toHaveSuffix('Command')
            ->toExtend('Illuminate\Console\Command') // @phpstan-ignore-line
            ->toHaveMethod('handle');

        $this->expectations[] = expect('App\Exceptions')
            ->toImplement('Throwable');

        $this->expectations[] = expect('App\Mail')
            ->toExtend('Illuminate\Mail\Mailable'); // @phpstan-ignore-line

        $this->expectations[] = expect('App\Jobs')
            ->toHaveMethod('handle');

        $this->expectations[] = expect('App\Listeners')
            ->toHaveMethod('handle');

        $this->expectations[] = expect('App\Notifications')
            ->toExtend('Illuminate\Notifications\Notification'); // @phpstan-ignore-line

        $this->expectations[] = expect('App\Providers') // @phpstan-ignore-line
            ->toHaveSuffix('ServiceProvider')
            ->toExtend('Illuminate\Support\ServiceProvider') // @phpstan-ignore-line
            ->not->toBeUsed();
    }
}