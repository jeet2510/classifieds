<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CategoryRequest extends FormRequest
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
            'title'  => 'required',
            'slug'   => 'required|max:255|unique:categories,slug,'.$this->id,
            'photo'  => [
                        'mimes:jpeg,jpg,png,svg',
                        Rule::requiredIf($this->id == null)
                ],
         ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        throw new ValidationException($validator, $response);
    }

}
