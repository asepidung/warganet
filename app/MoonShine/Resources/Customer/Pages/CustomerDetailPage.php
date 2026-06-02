<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Customer\Pages;

use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use App\MoonShine\Resources\Customer\CustomerResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use Throwable;


/**
 * @extends DetailPage<CustomerResource>
 */
class CustomerDetailPage extends DetailPage
{
    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            \MoonShine\UI\Fields\Fieldset::make('General Information', [
                \MoonShine\UI\Fields\ID::make(),
                \MoonShine\UI\Fields\Text::make('Name', 'name'),
                \MoonShine\UI\Fields\Switcher::make('Status Aktif', 'is_active')->disabled(),
                \MoonShine\UI\Fields\Text::make('Monthly Fee', 'monthly_fee', fn($item) => 'Rp ' . number_format((float)$item->monthly_fee, 0, ',', '.')),
                \MoonShine\UI\Fields\Text::make('Created At', 'created_at'),
                \MoonShine\UI\Fields\Text::make('Updated At', 'updated_at'),
            ]),
            
            \MoonShine\UI\Fields\Fieldset::make('Router Information', [
                \MoonShine\UI\Fields\Text::make('IP Router', 'ip_router'),
                \MoonShine\UI\Fields\Text::make('User Router', 'user_router'),
                \MoonShine\UI\Fields\Text::make('Pass Router', 'pass_router'),
            ]),
            
            \MoonShine\UI\Fields\Fieldset::make('PPPoE & Remote', [
                \MoonShine\UI\Fields\Text::make('User PPPoE', 'user_pppoe'),
                \MoonShine\UI\Fields\Text::make('Pass PPPoE', 'pass_pppoe'),
                \MoonShine\UI\Fields\Text::make('Remote Address', 'remote_address'),
            ]),

            \MoonShine\UI\Fields\Fieldset::make('WiFi Credentials', [
                \MoonShine\UI\Fields\Text::make('SSID WiFi', 'ssid'),
                \MoonShine\UI\Fields\Text::make('Pass WiFi', 'pass_wifi'),
            ]),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    /**
     * @param  TableBuilder  $component
     *
     * @return TableBuilder
     */
    protected function modifyDetailComponent(ComponentContract $component): ComponentContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
