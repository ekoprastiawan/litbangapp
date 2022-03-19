<?php

namespace App\Http\Requests\TListData;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ref_sub_kategori_id' => 'required',
            'ref_sumber_data_id' => 'required',
            'nama_data' => 'required',
            'url_data' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ref_sub_kategori_id.required' => 'Ref Sub Kategori Tidak Boleh Kosong',
            'ref_sumber_data_id.required' => 'Ref Sumber Data Tidak Boleh Kosong',
            'nama_data.required' => 'Nama Data Tidak Boleh Kosong',
            'url_data.required' => 'URL Data Tidak Boleh Kosong'
        ];
    }
}
