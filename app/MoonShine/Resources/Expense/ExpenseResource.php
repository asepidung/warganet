<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Expense;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expense;
use App\MoonShine\Resources\Expense\Pages\ExpenseIndexPage;
use App\MoonShine\Resources\Expense\Pages\ExpenseFormPage;
use App\MoonShine\Resources\Expense\Pages\ExpenseDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Expense, ExpenseIndexPage, ExpenseFormPage, ExpenseDetailPage>
 */
class ExpenseResource extends ModelResource
{
    protected string $model = Expense::class;

    protected string $title = 'Expenses';
    
    protected string $icon = 'banknotes';

    protected ?\MoonShine\Support\Enums\PageType $redirectAfterSave = \MoonShine\Support\Enums\PageType::INDEX;
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ExpenseIndexPage::class,
            ExpenseFormPage::class,
            ExpenseDetailPage::class,
        ];
    }

    public function modifyQueryBuilder(\Illuminate\Contracts\Database\Eloquent\Builder $builder): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }

    protected function isCan(\MoonShine\Support\Enums\Ability $ability): bool
    {
        $roleId = auth('moonshine')->user()?->moonshine_user_role_id;
        
        // Full Admin
        if ($roleId === 1) {
            return true;
        }

        // Admin Terbatas (Prima) & Lainnya
        return in_array($ability, [
            \MoonShine\Support\Enums\Ability::VIEW_ANY,
            \MoonShine\Support\Enums\Ability::VIEW,
        ]);
    }
}
