<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\SideIncome;

use Illuminate\Database\Eloquent\Model;
use App\Models\SideIncome;
use App\MoonShine\Resources\SideIncome\Pages\SideIncomeIndexPage;
use App\MoonShine\Resources\SideIncome\Pages\SideIncomeFormPage;
use App\MoonShine\Resources\SideIncome\Pages\SideIncomeDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<SideIncome, SideIncomeIndexPage, SideIncomeFormPage, SideIncomeDetailPage>
 */
class SideIncomeResource extends ModelResource
{
    protected string $model = SideIncome::class;

    protected string $title = 'Side Incomes';
    
    protected string $icon = 'arrow-up-tray';

    protected ?\MoonShine\Support\Enums\PageType $redirectAfterSave = \MoonShine\Support\Enums\PageType::INDEX;
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            SideIncomeIndexPage::class,
            SideIncomeFormPage::class,
            SideIncomeDetailPage::class,
        ];
    }

    public function modifyQueryBuilder(\Illuminate\Contracts\Database\Eloquent\Builder $builder): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return $builder->orderBy('date', 'desc');
    }
}
