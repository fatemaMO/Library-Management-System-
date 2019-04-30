<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserRequest extends FormRequest
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
        
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'username' => 'required|string|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'phone' =>  'numeric',
                    'national_id' => 'numeric',
                 
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users,email,'.$this->get('id'),
                    'username' => 'required|string|max:255|unique:users,username,'.$this->get('id'),
                    'phone' =>  'numeric',
                    'national_id' => 'numeric',
                    
                  
                ];
            }
            default:break;
        }
    
    }
}
