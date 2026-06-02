<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Bill;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
use App\MoonShine\Resources\Bill\Pages\BillIndexPage;
use App\MoonShine\Resources\Bill\Pages\BillFormPage;
use App\MoonShine\Resources\Bill\Pages\BillDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Support\Enums\Action;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @extends ModelResource<Bill, BillIndexPage, BillFormPage, BillDetailPage>
 */
class BillResource extends ModelResource
{
    protected string $model = Bill::class;

    protected string $title = 'Bills';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            BillIndexPage::class,
            BillFormPage::class,
            BillDetailPage::class,
        ];
    }

    public function getActiveActions(): array
    {
        // Hilangkan semua tombol default (Create, View, Edit, Delete)
        return [];
    }

    public function modifyQueryBuilder(Builder $builder): Builder
    {
        return $builder
            ->join('customers', 'bills.customer_id', '=', 'customers.id')
            ->whereIn('bills.id', function ($query) {
                $query->selectRaw('MAX(id)')
                      ->from('bills')
                      ->groupBy('customer_id');
            })
            ->where('customers.is_active', true)
            ->orderBy('customers.name', 'asc')
            ->select('bills.*');
    }
}
