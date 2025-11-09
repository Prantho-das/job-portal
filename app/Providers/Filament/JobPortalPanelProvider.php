<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Support\Enums\Width;
use Illuminate\Support\Facades\Artisan;
use Filament\Actions\Action;
use Filament\Navigation\NavigationItem;
use Filament\Notifications\Notification;
use App\Services\SettingsService; // Import the SettingsService
class JobPortalPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $settingsService = app(SettingsService::class);
        $site_logo = $settingsService->get('site_logo');
        return $panel
            ->default()
            ->id('job-portal')
            ->path('job-portal')
            ->login()
            ->brandLogo(function () use ($site_logo) {
                if (!empty($site_logo)) {
                    $logoUrl = asset('storage/' . $site_logo);
                    return new \Illuminate\Support\HtmlString(
                        '<img src="' . e($logoUrl) . '" alt="Site Logo" class="w-auto h-10 transition-transform duration-200 rounded-lg shadow-sm hover:scale-105">'
                    );
                }

                return new \Illuminate\Support\HtmlString('
                    <div class="flex items-center justify-center w-10 h-10 text-lg font-bold text-white bg-red-600 rounded-lg">
                        B
                    </div>
                ');
            })
            ->profile()
            ->maxContentWidth(Width::Full)
            ->sidebarWidth("12rem")
            ->spa()
            ->colors([
                'primary' => Color::Red,
            ])
            ->navigationItems([
               

                NavigationItem::make()
                    ->label('Clear Cache')
                    ->icon('heroicon-o-trash')
                    ->url(url: url('clear-cache'))
                    ->sort(999),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
               
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                // AccountWidget::class,
                // FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}