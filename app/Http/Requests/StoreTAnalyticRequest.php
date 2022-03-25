<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTAnalyticRequest extends FormRequest
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
            'uraian' => 'required',
            'img_url' => 'required',
            'file_url' => 'required|mimes:csv,txt',
            'dashboard_url' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul Tidak Boleh Kosong',
            'uraian.required' => 'Uraian Tidak Boleh Kosong',
            'img_url.required' => 'File Gambar Tidak Boleh Kosong',
            'file_url.required' => 'File Tidak Boleh Kosong',
            'dashboard_url.required' => 'link Dashboard Tidak Boleh Kosong'
        ];
    }
}
