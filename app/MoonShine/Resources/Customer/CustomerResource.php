<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Customer;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\MoonShine\Resources\Customer\Pages\CustomerIndexPage;
use App\MoonShine\Resources\Customer\Pages\CustomerFormPage;
use App\MoonShine\Resources\Customer\Pages\CustomerDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Support\Enums\Action;

/**
 * @extends ModelResource<Customer, CustomerIndexPage, CustomerFormPage, CustomerDetailPage>
 */
class CustomerResource extends ModelResource
{
    protected string $model = Customer::class;

    protected string $title = 'Customers';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            CustomerIndexPage::class,
            CustomerFormPage::class,
            CustomerDetailPage::class,
        ];
    }

    public function getActiveActions(): array
    {
        return [Action::CREATE, Action::VIEW, Action::UPDATE];
    }
}
