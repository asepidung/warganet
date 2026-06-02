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
            \MoonShine\UI\Fields\Fieldset::make('General Information', [
                \MoonShine\UI\Fields\ID::make(),
                \MoonShine\UI\Fields\Text::make('Name', 'name')->required(),
                \MoonShine\UI\Fields\Switcher::make('Status Aktif', 'is_active'),
                \MoonShine\UI\Fields\Number::make('Monthly Fee', 'monthly_fee')->required(),
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
