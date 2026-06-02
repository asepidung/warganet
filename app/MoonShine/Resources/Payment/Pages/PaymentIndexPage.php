<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Payment\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\QueryTags\QueryTag;
use MoonShine\UI\Components\Metrics\Wrapped\Metric;
use MoonShine\UI\Fields\ID;
use App\MoonShine\Resources\Payment\PaymentResource;
use MoonShine\Support\ListOf;
use Throwable;


/**
 * @extends IndexPage<PaymentResource>
 */
class PaymentIndexPage extends IndexPage
{
    protected bool $isLazy = true;

    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            \MoonShine\Laravel\Fields\Relationships\BelongsTo::make('Customer', 'customer', 'name'),
            \MoonShine\UI\Fields\Text::make('Payment', 'payment', fn($item) => number_format((float)$item->payment, 0, '', ',')),
            \MoonShine\UI\Fields\Text::make('Discount', 'discount', fn($item) => number_format((float)$item->discount, 0, '', ',')),
            \MoonShine\UI\Fields\Text::make('Status', 'status')
                ->badge(fn($status) => $status === 'waiting' ? 'info' : 'success'),
            \MoonShine\UI\Fields\Text::make('Paid At', 'paid_at', fn($item) => $item->paid_at ? \Carbon\Carbon::parse($item->paid_at)->format('d M Y H:i') : '-'),
            \MoonShine\UI\Fields\Text::make('Admin', 'user.name'),
        ];
    }

    /**
     * @return ListOf<ActionButtonContract>
     */
    protected function buttons(): ListOf
    {
        return parent::buttons()->add(
            \MoonShine\UI\Components\ActionButton::make('Approve', fn($item) => route('admin.payments.approve', $item->id))
                ->icon('check')
                ->success()
                ->canSee(fn($item) => $item->status === 'waiting' && auth('moonshine')->user()?->moonshine_user_role_id === 1)
        );
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
