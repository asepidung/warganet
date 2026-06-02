<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Customer\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Customer\CustomerResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use Throwable;


/**
 * @extends FormPage<CustomerResource>
 */
class CustomerFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
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
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [];
    }

    /**
     * @param  FormBuilder  $component
     *
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
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
