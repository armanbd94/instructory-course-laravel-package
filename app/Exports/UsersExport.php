<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    protected $data;
    protected $column_order = ['','users.id', '', 'users.name', 'users.role_id', 'users.email', 'users.mobile_no',
    'users.district_id', 'users.upazila_id', 'users.postal_code', 'users.email_verified_at', 'users.status', ''];

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function collection()
    {
        

        $query = User::with(['role:id,role_name', 'district:id,location_name', 'upazila:id,location_name']);
        if (!empty($this->data['column']) && !empty($this->data['dir'])) {
            $query->orderBy($this->column_order[$this->data['column']], $this->data['dir']);
        } else {
            $query->orderBy('users.id','desc');
        }
        if ($this->data['length'] != -1) {
            $query->offset($this->data['start'])->limit($this->data['length']);
        }
        $list =  $query->get();

        $data = [];

        foreach ($list as $value) {
            $row           = [];
            $row ['name']        = $value->name;
            $row ['role']        = $value->role->role_name;
            $row ['email']       = $value->email;
            $row ['phone']       = $value->mobile_no;
            $row ['district']    = $value->district->location_name;
            $row ['upazila']     = $value->upazila->location_name;
            $row ['postal_code'] = $value->postal_code;
            $row ['address']     = $value->address;
            $row ['status']      = $value->status == 1 ? 'Active' : 'Inactive';
            $data[]              = $row;
        }

        return collect($data);

    }

    public function headings(): array
    {
        return [
            'Name','Role','Email','Phone','District' ,'Upazila','Postal Code','Address','Status'
        ];
    }
}
