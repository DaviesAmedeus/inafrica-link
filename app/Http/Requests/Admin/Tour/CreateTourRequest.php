<?php

namespace App\Http\Requests\Admin\Tour;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

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

            'pricing' => 'required|array',
            'pricing.*.people' => 'required|string|max:255',
            'pricing.*.price' => 'required|string|max:255',

            'costInclude' => 'required|array|min:1',
            'costInclude.*' => 'required|string|max:255',

            'costExclude' => 'required|array|min:1',
            'costExclude.*' => 'required|string|max:255',
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'itinerary.*.title' => 'A least the title is required!',

            'pricing.*.people.required' => 'At least one group of people is required.',
            'pricing.*.price.required' => 'A price is required for each group.',

            'costInclude.required' => 'At least one cost include item is required.',
            'costInclude.min' => 'At least one cost include item is required.',
            'costInclude.*.required' => 'Cost include item cannot be empty.',
            'costInclude.*.string' => 'Cost include item must be valid text.',
            'costInclude.*.max' => 'Cost include item cannot exceed 255 characters.',

            'costExclude.required' => 'At least one cost include item is required.',
            'costExclude.min' => 'At least one cost include item is required.',
            'costExclude.*.required' => 'Cost include item cannot be empty.',
            'costExclude.*.string' => 'Cost include item must be valid text.',
            'costExclude.*.max' => 'Cost include item cannot exceed 255 characters.',
        ];
    }
}
