<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
#[\MoonShine\MenuManager\Attributes\SkipMenu]

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle()
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
    {
        $totalSystemBalance = \App\Models\User::getTotalSystemBalance();
        
        $idung = \App\Models\User::where('email', 'asepsaidung@gmail.com')->first();
        $prima = \App\Models\User::where('email', 'primaprivate28@gmail.com')->first();
        
        $saldoIdung = $idung ? $idung->getShareBalance() : 0;
        $saldoPrima = $prima ? $prima->getShareBalance() : 0;
        
        $totalWithdrawals = \App\Models\Withdrawal::sum('amount');
        $kas = $totalSystemBalance - $totalWithdrawals;
        
        $totalPayments = \App\Models\Payment::where('status', 'confirmed')->sum('payment');
        $totalExpenses = \App\Models\Expense::sum('amount');
        $totalSideIncomes = \App\Models\SideIncome::sum('amount');
        
        $paymentWaiting = \App\Models\Payment::where('status', 'waiting')->sum('payment');
        
        return [
            \MoonShine\UI\Components\Layout\Grid::make([
                \MoonShine\UI\Components\Layout\Column::make([
                    \MoonShine\UI\Components\Metrics\Wrapped\ValueMetric::make('KAS (Sisa Uang Fisik)')
                        ->value('Rp ' . number_format((float) $kas, 0, '', ','))
                        ->icon('banknotes')
                ])->columnSpan(3),
                
                \MoonShine\UI\Components\Layout\Column::make([
                    \MoonShine\UI\Components\Metrics\Wrapped\ValueMetric::make('Total Payments')
                        ->value('Rp ' . number_format((float) $totalPayments, 0, '', ','))
                        ->icon('currency-dollar')
                ])->columnSpan(3),
                
                \MoonShine\UI\Components\Layout\Column::make([
                    \MoonShine\UI\Components\Metrics\Wrapped\ValueMetric::make('Total Expenses')
                        ->value('Rp ' . number_format((float) $totalExpenses, 0, '', ','))
                        ->icon('shopping-cart')
                ])->columnSpan(3),
                
                \MoonShine\UI\Components\Layout\Column::make([
                    \MoonShine\UI\Components\Metrics\Wrapped\ValueMetric::make('Total Withdrawals')
                        ->value('Rp ' . number_format((float) $totalWithdrawals, 0, '', ','))
                        ->icon('arrow-down-tray')
                ])->columnSpan(3),
            ]),
            
            \MoonShine\UI\Components\Layout\Grid::make([
                \MoonShine\UI\Components\Layout\Column::make([
                    \MoonShine\UI\Components\Metrics\Wrapped\ValueMetric::make('Saldo Hak Idung')
                        ->value('Rp ' . number_format((float) $saldoIdung, 0, '', ','))
                        ->icon('user')
                ])->columnSpan(3),
                
                \MoonShine\UI\Components\Layout\Column::make([
                    \MoonShine\UI\Components\Metrics\Wrapped\ValueMetric::make('Saldo Hak Prima')
                        ->value('Rp ' . number_format((float) $saldoPrima, 0, '', ','))
                        ->icon('user')
                ])->columnSpan(3),
                
                \MoonShine\UI\Components\Layout\Column::make([
                    \MoonShine\UI\Components\Metrics\Wrapped\ValueMetric::make('Total Side Incomes')
                        ->value('Rp ' . number_format((float) $totalSideIncomes, 0, '', ','))
                        ->icon('plus-circle')
                ])->columnSpan(3),
                
                \MoonShine\UI\Components\Layout\Column::make([
                    \MoonShine\UI\Components\Metrics\Wrapped\ValueMetric::make('Total Payment Waiting')
                        ->value('Rp ' . number_format((float) $paymentWaiting, 0, '', ','))
                        ->icon('clock')
                ])->columnSpan(3),
            ]),
        ];
    }
}
