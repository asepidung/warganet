<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use File;

class UpdateMoonshineFields extends Command
{
    protected $signature = 'moonshine:fix-fields';
    protected $description = 'Populate MoonShine pages with actual database columns';

    public function handle()
    {
        $resources = [
            'Customer' => 'customers',
            'Bill' => 'bills',
            'Payment' => 'payments',
            'Expense' => 'expenses',
            'Withdrawal' => 'withdrawals',
            'SideIncome' => 'sideincomes',
        ];

        foreach ($resources as $resource => $table) {
            $columns = Schema::getColumnListing($table);
            
            $types = ['IndexPage', 'FormPage', 'DetailPage'];
            foreach ($types as $type) {
                $fieldsCode = [];
                foreach ($columns as $column) {
                    if ($column === 'id') {
                        if ($type !== 'IndexPage') {
                            $fieldsCode[] = "            \MoonShine\UI\Fields\ID::make(),";
                        }
                        continue;
                    }

                    // Hide timestamps and user_id in IndexPage
                    if ($type === 'IndexPage' && in_array($column, ['created_at', 'updated_at', 'deleted_at', 'user_id', 'moonshine_user_role_id', 'remember_token', 'password'])) {
                        continue;
                    }
                    
                    // Hide timestamps in FormPage
                    if ($type === 'FormPage' && in_array($column, ['created_at', 'updated_at', 'deleted_at'])) {
                        continue;
                    }

                    $label = Str::title(str_replace('_', ' ', $column));
                    $isCurrency = in_array($column, ['amount', 'payment', 'discount', 'total_amount', 'balance', 'price', 'monthly_fee', 'bill_total']);
                    
                    if ($column === 'customer_id') {
                        $fieldsCode[] = "            \MoonShine\Laravel\Fields\Relationships\BelongsTo::make('Customer', 'customer', 'name'),";
                    } elseif ($column === 'bill_id') {
                        $fieldsCode[] = "            \MoonShine\Laravel\Fields\Relationships\BelongsTo::make('Bill', 'bill', 'period'),";
                    } elseif ($column === 'user_id' && $type !== 'IndexPage') {
                        $fieldsCode[] = "            \MoonShine\Laravel\Fields\Relationships\BelongsTo::make('User', 'user', 'name'),";
                    } elseif ($isCurrency && $type === 'IndexPage') {
                        $fieldsCode[] = "            \MoonShine\UI\Fields\Text::make('$label', '$column', fn(\$item) => number_format((float)\$item->$column, 2, '.', ',')),";
                    } elseif ($isCurrency) {
                        $fieldsCode[] = "            \MoonShine\UI\Fields\Number::make('$label', '$column'),";
                    } else {
                        $fieldsCode[] = "            \MoonShine\UI\Fields\Text::make('$label', '$column'),";
                    }
                }
                
                $fieldsString = implode("\n", $fieldsCode);
                $path = app_path("MoonShine/Resources/{$resource}/Pages/{$resource}{$type}.php");
                if (File::exists($path)) {
                    $content = File::get($path);
                    
                    // Regex to replace everything inside fields() method
                    $content = preg_replace(
                        '/protected function fields\(\): iterable\s*\{\s*return \[.*?\];\s*\}/s',
                        "protected function fields(): iterable\n    {\n        return [\n$fieldsString\n        ];\n    }",
                        $content
                    );

                    File::put($path, $content);
                    $this->info("Updated $path");
                }
            }
        }
    }
}
