<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTVisualRequest extends FormRequest
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
            'file_url' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul Tidak Boleh Kosong',
            'file_url.required' => 'Embed URL Tidak Boleh Kosong'
        ];
    }
}
