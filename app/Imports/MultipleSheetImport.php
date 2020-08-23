<?php

namespace App\Imports;

use App\Imports\RolesImport;
use App\Imports\UsersImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class MultipleSheetImport implements WithMultipleSheets
{

    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'role_sheet' => new RolesImport(),
            'user_sheet' => new UsersImport(),
        ];
    }
}
