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
use App\MoonShine\Resources\InitialBalance\InitialBalanceResource;

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
            \MoonShine\AssetManager\Css::make(asset('css/mobile.css')),
        ];
    }

    protected function menu(): array
    {
        $menus = [    MenuItem::make(InitialBalanceResource::class, 'InitialBalances'),
        ];
        // Hanya Full Admin (Role ID 1) yang bisa melihat menu System
        if (auth('moonshine')->user()?->moonshine_user_role_id === 1) {
            $menus = parent::menu();
        }

        return [
            ...$menus,
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

    protected function getFooterMenu(): array
    {
        return [];
    }

    protected function getFooterCopyright(): string
    {
        return '&copy; ' . now()->year . ' Asep Idung';
    }

    protected function getProfileComponent(): \MoonShine\Laravel\Components\Layout\Profile
    {
        return parent::getProfileComponent()->avatarPlaceholder(asset('img/warganetlogo.png'));
    }
}
