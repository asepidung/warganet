<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$b = App\Models\Bill::find(102);
if ($b) {
    $b->bill_total = 50000;
    $b->status = 'partial_payment';
    $b->save();
}

$makOcih = App\Models\Customer::where('name', 'like', '%OCIH%')->first();
if ($makOcih) {
    $b = $makOcih->bills()->orderBy('id', 'desc')->first();
    echo "Mak Ocih latest bill ID: {$b->id}, Total: {$b->bill_total}\n";
}
