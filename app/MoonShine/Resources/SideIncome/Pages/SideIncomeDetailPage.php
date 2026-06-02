<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\SideIncome\Pages;

use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use App\MoonShine\Resources\SideIncome\SideIncomeResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use Throwable;


/**
 * @extends DetailPage<SideIncomeResource>
 */
class SideIncomeDetailPage extends DetailPage
{
    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            \MoonShine\UI\Fields\ID::make(),
            \MoonShine\UI\Fields\Text::make('Date', 'date'),
            \MoonShine\UI\Fields\Number::make('Amount', 'amount'),
            \MoonShine\UI\Fields\Text::make('Description', 'description'),
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
