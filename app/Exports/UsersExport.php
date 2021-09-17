<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $collection = collect([]);
        $users = User::where('role','user')->get();
        foreach($users as $i => $user){
            $collection->add([
                $i+1,
                $user->name,
                $user->phone,
                $user->instance,
                $user->test_results->pluck('total')->sum().' point'
            ]);
        }
        return $collection;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'No Telp',
            'Instansi',
            'Nilai'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
