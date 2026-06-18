<?php

namespace App\Http\Requests\Admin\Tour;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTourRequest extends FormRequest
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
        $tourId = $this->route('tour_id');

        return [
            'title' => 'required|unique:tours,title,' . $tourId,
            'description' => 'required',
            'overview' => 'required',
            'category' => 'required|exists:categories,id',
            'featured_image' => 'nullable|mimes:jpeg,jpg,png|max:2050',
            'itinerary' => 'array',
            'itinerary.*.title' => 'required|string|max:255',
            // 'itinerary.*.content' => 'required|string',
            'costInclude' => 'required|array|max:255',
            'costExclude' => 'required|array|max:255',
        ];
    }
}
