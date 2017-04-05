<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanitizeFormRequest extends FormRequest
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

        $this->sanitize();

        return [
            'billAmount' => 'required|numeric',
        ];
    }

    /**
     * Sanitize input before validating it
     * from: http://www.easylaravelbook.com/blog/2015/02/09/creating-a-contact-form-in-laravel-5-using-the-form-request-feature/
     *  and: http://www.easylaravelbook.com/blog/2015/03/31/sanitizing-input-using-laravel-5-form-requests/
     */
    public function sanitize()
    {
        $input = $this->all();

        $input['billAmount'] = filter_var($input['billAmount'], FILTER_SANITIZE_STRING);

        $this->replace($input);
    }

}
