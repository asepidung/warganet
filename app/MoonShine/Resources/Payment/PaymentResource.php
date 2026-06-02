<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Payment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use App\MoonShine\Resources\Payment\Pages\PaymentIndexPage;
use App\MoonShine\Resources\Payment\Pages\PaymentFormPage;
use App\MoonShine\Resources\Payment\Pages\PaymentDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Payment, PaymentIndexPage, PaymentFormPage, PaymentDetailPage>
 */
class PaymentResource extends ModelResource
{
    protected string $model = Payment::class;

    protected string $title = 'Payments';
    
    protected string $icon = 'currency-dollar';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            PaymentIndexPage::class,
            PaymentFormPage::class,
            PaymentDetailPage::class,
        ];
    }

    public function getActiveActions(): array
    {
        return [];
    }

    public function modifyQueryBuilder(\Illuminate\Contracts\Database\Eloquent\Builder $builder): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return $builder
            ->join('customers', 'payments.customer_id', '=', 'customers.id')
            ->whereIn('payments.id', function ($query) {
                $query->selectRaw('MAX(id)')
                      ->from('payments')
                      ->groupBy('customer_id');
            })
            ->where('customers.is_active', true)
            ->orderBy('customers.name', 'asc')
            ->select('payments.*');
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
