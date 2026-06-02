<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Withdrawal\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Withdrawal\WithdrawalResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use Throwable;


/**
 * @extends FormPage<WithdrawalResource>
 */
class WithdrawalFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        $systemBalance = \App\Models\User::getTotalSystemBalance();
        $share = $systemBalance / 2;
        
        $users = \App\Models\User::all();
        $balancesText = [];
        foreach($users as $u) {
            $myWithdrawals = \App\Models\Withdrawal::where('user_id', $u->id)->sum('amount');
            $balance = number_format($share - $myWithdrawals, 0, '', ',');
            $balancesText[] = "Saldo {$u->name}: Rp $balance";
        }
        $balancesString = implode(' | ', $balancesText);

        $usersList = \App\Models\User::all()->pluck('name', 'id')->toArray();

        return [
            \MoonShine\UI\Components\Badge::make($balancesString, 'success'),
            \MoonShine\UI\Fields\Select::make('User', 'user_id')
                ->options($usersList)
                ->searchable()
                ->required(),
            \MoonShine\UI\Fields\Text::make('Amount', 'amount')
                ->required()
                ->customAttributes([
                    'onfocus' => "this.select()",
                    'onkeyup' => "this.value = this.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                ])
                ->onApply(fn($item, $value) => $item->amount = str_replace(',', '', $value)),
            \MoonShine\UI\Fields\Date::make('Withdrawal Date', 'withdrawal_date')
                ->format('Y-m-d')
                ->default(now()->format('Y-m-d'))
                ->required(),
            \MoonShine\UI\Fields\Textarea::make('Note', 'note'),
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
