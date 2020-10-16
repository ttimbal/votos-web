<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VotosStoreRequest extends FormRequest
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
            'mesa_recinto_id' => 'required|integer',
            'blanco' => 'required|integer',
            'nulo' => 'required|integer',
            'pre_mas' => 'required|integer',
            'dip_mas' => 'required|integer',
            'pre_cre' => 'required|integer',
            'dip_cre' => 'required|integer',
            'pre_com' => 'required|integer',
            'dip_com' => 'required|integer'
        ];
      /*  return [
            //
        ];*/
    }
}
