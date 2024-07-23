<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaiVietRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tieu_de' => 'required|string|max:255',
            'ngay_dang' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'tieu_de.required' => 'tieu de la bat buoc',
            'tieu_de.max' => 'tieu de khong vuot qua 255 ky tu',
            'ngay_dang.required' => 'ngay dang la bat buoc',
            'ngay_dang.date' => 'ngay dang phai la kieu ngay hop le',
        ];
    }
}
