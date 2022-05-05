<?php

namespace App\Exports;

//use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection, WithHeadings{
    public function headings(): array
    {
        return [
            'name',
            'email',
            'role',
        ];
    }
    public function collection()
    {
        $users = DB::table('users')->select('name', 'email')->get();
        return $users;
    }
}
