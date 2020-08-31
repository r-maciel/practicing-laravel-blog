<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPost extends FormRequest
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
    /* If you wanna keep your controller cleaner you can use a Form Request tomake the validations and other stuff 
    you make the Form request with
    >> php artisan make:request NameYouWish
    in the rule method you put the rules for validation*/
    public function rules()
    {
        return [
            'title' => ['required'],
            'content' => ['required'],
            'category_slug' => ['required', 'exists:categories,slug']
        ];
    }
}
