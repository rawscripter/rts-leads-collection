<?php

namespace App\Exports;

use App\Http\Resources\CustomerExportResource;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    private $feedback;

    public function __construct($feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function collection()
    {
        $customers = Customer::where('feedback', 'like', '%' . $this->feedback . '%')->get();
        return CustomerExportResource::collection($customers);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Shop / Company',
            'Phone',
            'Address',
            'Email',
            'Feedback',
            'Comment',
            'Created At',
        ];
    }


}
