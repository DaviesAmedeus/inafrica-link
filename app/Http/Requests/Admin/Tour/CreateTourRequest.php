<?php

namespace App\Http\Requests\Admin\Tour;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTourRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:tours,title',
            'description' => 'required',
            'overview' => 'required',
            'category' => 'required|exists:categories,id',
            'featured_image' => 'required|mimes:png,jpg,jpeg|max:2050',
            'itinerary' => 'required|array',
            'itinerary.*.title' => 'required|string|max:255',
            // 'itinerary.*.content' => 'required|string',
            'costInclude' => 'required|array|max:255',
            'costExclude' => 'required|array|max:255',
        ];
    }
}
