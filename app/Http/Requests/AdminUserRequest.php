<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserRequest extends FormRequest
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
        //确认编辑状态还是添加状态，有值就是编辑状态
        $adminuser = $this->route('adminuser');

        if($adminuser){
            $rules = [
                'username'=>[
                    'required',
                    //通过上面Validation里面的Rule类，调用unique确认用户名唯一性,现在编辑状态忽略此次id
                    Rule::unique('admin_users','username')->ignore($adminuser->id),
                ],
                'password'=>'same:password2'
            ];
        }else{
            $rules = [
                'username'=>[
                    'required',
                    Rule::unique('admin_users','username'),//通过上面Validation里面的Rule类，调用unique确认用户名唯一性
                ],
                'password'=>'required | same:password2'
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'password2' => '确认密码',
        ];
    }
}
