<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpg,svg,png|max:256', // 256 KB Max
            'title' => 'required|max:255|unique:blogs,title,'.  $this->blog->id,
            'body' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => 'صورة المقال',
            'title' => 'عنوان المقال',
            'body' => 'محتوي المقال',
        ];
    }
}
