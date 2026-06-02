<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\InitialBalance;

use Illuminate\Database\Eloquent\Model;
use App\Models\InitialBalance;
use App\MoonShine\Resources\InitialBalance\Pages\InitialBalanceIndexPage;
use App\MoonShine\Resources\InitialBalance\Pages\InitialBalanceFormPage;
use App\MoonShine\Resources\InitialBalance\Pages\InitialBalanceDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<InitialBalance, InitialBalanceIndexPage, InitialBalanceFormPage, InitialBalanceDetailPage>
 */
class InitialBalanceResource extends ModelResource
{
    protected string $model = InitialBalance::class;

    protected string $title = 'InitialBalances';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            InitialBalanceIndexPage::class,
            InitialBalanceFormPage::class,
            InitialBalanceDetailPage::class,
        ];
    }
}
