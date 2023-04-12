<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];
    
        if (request()->routeIs('user.store')) {      
            $rules += [
                'email' => 'required|string|email|unique:App/Models/User,email|max:255',
                'password' => 'required|min:8',
            ];
        }
        elseif(request()->routeIs('user.update') ){
            return [
                'name'          => 'required|string|max:255',
            ];
        }       
    }
}
