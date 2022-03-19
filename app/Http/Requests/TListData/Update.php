<?php

namespace App\Http\Requests\TListData;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\True_;

class Update extends FormRequest
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
            'id' => 'required',
            'ref_sub_kategori_id' => 'required',
            'ref_sumber_data_id' => 'required',
            'nama_data' => 'required',
            'url_data' => 'required'
        ];
    }

    public function messages()
    {
        return[
          'id.required' => 'ID tidak boleh kosong',
          'ref_sub_kategori_id.required' => 'Sub Kategori tidak boleh kosong',
          'ref_sumber_data_id.required' => 'Sumber Data tidak boleh kosong',
          'nama_data.required' => 'Nama Data tidak boleh kosong',
          'url_data' => 'Link tidak boleh kosong'
        ];
    }
}
