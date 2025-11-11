<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProdutosExport implements FromCollection
{
    public function collection()
    {
        return DB::table('vw_produtos_com_precos')->get();
    }
}
