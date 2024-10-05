<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return User::all();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ];
    }
}
