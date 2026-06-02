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
            \MoonShine\UI\Fields\ID::make(),
            \MoonShine\UI\Fields\Text::make('Name', 'name'),
            \MoonShine\UI\Fields\Text::make('Ssid', 'ssid'),
            \MoonShine\UI\Fields\Text::make('Pass Wifi', 'pass_wifi'),
            \MoonShine\UI\Fields\Text::make('Ip Router', 'ip_router'),
            \MoonShine\UI\Fields\Text::make('User Router', 'user_router'),
            \MoonShine\UI\Fields\Text::make('Pass Router', 'pass_router'),
            \MoonShine\UI\Fields\Text::make('User Pppoe', 'user_pppoe'),
            \MoonShine\UI\Fields\Text::make('Pass Pppoe', 'pass_pppoe'),
            \MoonShine\UI\Fields\Text::make('Remote Address', 'remote_address'),
            \MoonShine\UI\Fields\Number::make('Monthly Fee', 'monthly_fee'),
            \MoonShine\UI\Fields\Text::make('Created At', 'created_at'),
            \MoonShine\UI\Fields\Text::make('Updated At', 'updated_at'),
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
