<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Resources\BarangResource;
use App\Filament\Resources\PeminjamanBarangResource;
use App\Filament\Resources\RuanganResource;
use App\Filament\Resources\PeminjamanRuanganResource;
use App\Filament\Resources\PermissionResource;
use App\Filament\Resources\UserResource;

use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            
            // ->font('Popins') Buat Font
            // ->favicon('https://jkt48.com/images/logo.svg') Buat Logo
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class, //Kalo mau ngilangin widget depan
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
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make());
            // ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                
            //     return $builder->groups([
            //         NavigationGroup::make()
            //             ->items([
            //                 NavigationItem::make('Dashboard')
            //                 ->icon('heroicon-o-home')
            //                 ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
            //                 ->url(fn (): string => Dashboard::getUrl()),
            //             ]),

            //         NavigationGroup::make('Data Barang dan Ruangan')
            //             ->items([
            //                 ...BarangResource::getNavigationItems(),
            //                 ...RuanganResource::getNavigationItems(),
            //             ]),
            //         NavigationGroup::make('Peminjaman Ruangan dan Barang')
            //             ->items([
            //                 ...PeminjamanBarangResource::getNavigationItems(),
            //                 ...PeminjamanRuanganResource::getNavigationItems(),
            //             ]),
            //         NavigationGroup::make('Settings')
            //             ->items([
            //                 ...UserResource::getNavigationItems(),
            //                 NavigationItem::make('Roles')
            //                 ->icon('heroicon-o-user-group')
            //                 ->isActiveWhen(fn():bool => request()->routeIs([
            //                     'filament.admin.resource.roles.index',
            //                     'filament.admin.resource.roles.create',
            //                     'filament.admin.resource.roles.view',
            //                     'filament.admin.resource.roles.edit'
            //                 ]))
            //                 ->url(fn(): string => '/admin/roles'),
            //                 NavigationItem::make('Permissions')
            //                 ->icon('heroicon-o-lock-closed')
            //                 ->isActiveWhen(fn():bool => request()->routeIs([
            //                     'filament.admin.resource.permissions.index',
            //                     'filament.admin.resource.permissions.create',
            //                     'filament.admin.resource.permissions.view',
            //                     'filament.admin.resource.permissions.edit'
            //                 ]))
            //                 ->url(fn(): string => '/admin/permissions'),
                            
            //             ]),
            //     ]);
            // });;
            
            
            
    }
    
}
