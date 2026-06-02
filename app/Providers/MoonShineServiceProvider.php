<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\MoonShineUser\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRole\MoonShineUserRoleResource;
use App\MoonShine\Resources\Customer\CustomerResource;
use App\MoonShine\Resources\Bill\BillResource;
use App\MoonShine\Resources\Payment\PaymentResource;
use App\MoonShine\Resources\Expense\ExpenseResource;
use App\MoonShine\Resources\Withdrawal\WithdrawalResource;
use App\MoonShine\Resources\SideIncome\SideIncomeResource;
use App\MoonShine\Resources\InitialBalance\InitialBalanceResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  CoreContract<MoonShineConfigurator>  $core
     */
    public function boot(CoreContract $core): void
    {
        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                CustomerResource::class,
                BillResource::class,
                PaymentResource::class,
                ExpenseResource::class,
                WithdrawalResource::class,
                SideIncomeResource::class,
                InitialBalanceResource::class,
            ])
            ->pages([
                ...$core->getConfig()->getPages(),
            ])
        ;
    }
}
