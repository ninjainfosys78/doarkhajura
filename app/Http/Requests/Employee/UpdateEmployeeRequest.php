<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if(config('default.dual_language'))
        {
            return [
                'name' => ['required'],
                'name_en' => ['required'],
                'photo' => ['nullable', 'image'],
                'department_id' => ['nullable', Rule::exists('departments', 'id')->withoutTrashed()],
                'designation_id' => ['required', Rule::exists('designations', 'id')->withoutTrashed()],
                'level' => ['nullable'],
                'level_en' => ['nullable'],
                'phone' => ['nullable'],
                'email' => ['nullable'],
                'address' => ['nullable'],
                'address_en' => ['nullable'],
                'position' => ['nullable', 'integer'],
                'acedamic_qualification'=>['nullable','string'],
                'current_office'=>['nullable', 'string'],
                'expertise'=>['nullable', 'string'],
                'experience_n_research'=>['nullable', 'string'],
                'fb_url'=>['nullable', 'string'],
                'insta_url'=>['nullable', 'string'],
                'twitter_url'=>['nullable', 'string'],
            ];
        }
        else
        {
            return [
                'name' => ['required'],
                'photo' => ['nullable', 'image'],
                'department_id' => ['nullable', Rule::exists('departments', 'id')->withoutTrashed()],
                'designation_id' => ['required', Rule::exists('designations', 'id')->withoutTrashed()],
                'level' => ['nullable'],
                'phone' => ['nullable'],
                'email' => ['nullable'],
                'address' => ['nullable'],
                'position' => ['nullable', 'integer'],
                'acedamic_qualification'=>['nullable','string'],
                'current_office'=>['nullable', 'string'],
                'expertise'=>['nullable', 'string'],
                'experience_n_research'=>['nullable', 'string'],
                'fb_url'=>['nullable', 'string'],
                'insta_url'=>['nullable', 'string'],
                'twitter_url'=>['nullable', 'string'],
            ];
        }

    }
}
