<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerPostRequest extends FormRequest
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
          'title.*' => 'required|max:511',
          'description.*' => 'max:511',
          'keywords.*' => 'max:511',
          'content.*' => 'max:65535',
          'status' => 'required|in:active,passive',
      ];
    }
}
