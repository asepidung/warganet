<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\Palettes\PurplePalette;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\ColorManager\PaletteContract;
use App\MoonShine\Resources\Customer\CustomerResource;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\Bill\BillResource;
use App\MoonShine\Resources\Payment\PaymentResource;
use App\MoonShine\Resources\Expense\ExpenseResource;
use App\MoonShine\Resources\Withdrawal\WithdrawalResource;
use App\MoonShine\Resources\SideIncome\SideIncomeResource;

final class MoonShineLayout extends AppLayout
{
    /**
     * @var null|class-string<PaletteContract>
     */
    protected ?string $palette = PurplePalette::class;

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuItem::make(CustomerResource::class, 'Customers')->icon('users'),
            MenuItem::make(BillResource::class, 'Bills')->icon('document-text'),
            MenuItem::make(PaymentResource::class, 'Payments')->icon('currency-dollar'),
            MenuItem::make(ExpenseResource::class, 'Expenses')->icon('shopping-cart'),
            MenuItem::make(WithdrawalResource::class, 'Withdrawals')->icon('banknotes'),
            MenuItem::make(SideIncomeResource::class, 'Side Incomes')->icon('currency-dollar'),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }
}
