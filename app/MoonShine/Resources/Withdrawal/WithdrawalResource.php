<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Withdrawal;

use Illuminate\Database\Eloquent\Model;
use App\Models\Withdrawal;
use App\MoonShine\Resources\Withdrawal\Pages\WithdrawalIndexPage;
use App\MoonShine\Resources\Withdrawal\Pages\WithdrawalFormPage;
use App\MoonShine\Resources\Withdrawal\Pages\WithdrawalDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Withdrawal, WithdrawalIndexPage, WithdrawalFormPage, WithdrawalDetailPage>
 */
class WithdrawalResource extends ModelResource
{
    protected string $model = Withdrawal::class;

    protected string $title = 'Withdrawals';
    
    protected string $icon = 'arrow-down-tray';

    protected ?\MoonShine\Support\Enums\PageType $redirectAfterSave = \MoonShine\Support\Enums\PageType::INDEX;
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            WithdrawalIndexPage::class,
            WithdrawalFormPage::class,
            WithdrawalDetailPage::class,
        ];
    }

    public function modifyQueryBuilder(\Illuminate\Contracts\Database\Eloquent\Builder $builder): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return $builder->orderBy('withdrawal_date', 'desc');
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
