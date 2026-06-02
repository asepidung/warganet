<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Customer\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\QueryTags\QueryTag;
use MoonShine\UI\Components\Metrics\Wrapped\Metric;
use MoonShine\UI\Fields\ID;
use App\MoonShine\Resources\Customer\CustomerResource;
use MoonShine\Support\ListOf;
use Throwable;


/**
 * @extends IndexPage<CustomerResource>
 */
class CustomerIndexPage extends IndexPage
{
    protected bool $isLazy = true;

    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            \MoonShine\UI\Fields\Text::make('Name', 'name'),
            \MoonShine\UI\Fields\Text::make('Ssid', 'ssid'),
            \MoonShine\UI\Fields\Text::make('Pass Wifi', 'pass_wifi'),
            \MoonShine\UI\Fields\Text::make('Ip Router', 'ip_router'),
            \MoonShine\UI\Fields\Text::make('User Router', 'user_router'),
            \MoonShine\UI\Fields\Text::make('Pass Router', 'pass_router'),
            \MoonShine\UI\Fields\Text::make('User Pppoe', 'user_pppoe'),
            \MoonShine\UI\Fields\Text::make('Pass Pppoe', 'pass_pppoe'),
            \MoonShine\UI\Fields\Text::make('Remote Address', 'remote_address'),
            \MoonShine\UI\Fields\Text::make('Monthly Fee', 'monthly_fee', fn($item) => number_format((float)$item->monthly_fee, 2, '.', ',')),
        ];
    }

    /**
     * @return ListOf<ActionButtonContract>
     */
    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    /**
     * @return list<FieldContract>
     */
    protected function filters(): iterable
    {
        return [];
    }

    /**
     * @return list<QueryTag>
     */
    protected function queryTags(): array
    {
        return [];
    }

    /**
     * @return list<Metric>
     */
    protected function metrics(): array
    {
        return [];
    }

    /**
     * @param  TableBuilder  $component
     *
     * @return TableBuilder
     */
    protected function modifyListComponent(ComponentContract $component): ComponentContract
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
