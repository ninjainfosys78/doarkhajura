<?php

namespace App\Http\Requests\VideoGallery;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVideoGalleryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        if(config('default.dual_language'))
        {
            return [
                'title' => ['required', 'string'],
                'title_en' => ['required', 'string'],
                'url' => ['required','url'],
                'research_unit_id' => ['nullable', Rule::exists('research_units', 'id')->withoutTrashed()],
            ];
        }
        else
        {
            return [
                'title' => ['required', 'string'],
                'url' => ['required','url'],
                'research_unit_id' => ['nullable', Rule::exists('research_units', 'id')->withoutTrashed()],
            ];
        }

    }
}
