<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTVisualRequest extends FormRequest
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
            'judul' => 'required',
            'label' => 'required',
            'file_url' => 'mimes:csv,txt',
            'ref_jenis_visual_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul Tidak Boleh Kosong',
            'label.required' => 'Label Tidak Boleh Kosong',
            'file_url.mimes' => 'Silahkan upload file .csv',
            'ref_jenis_visual_id.required' => 'Jenis Visual Tidak Boleh Kosong'
        ];
    }
}
