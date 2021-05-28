<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PackageRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $package_id = isset($this->package) ? $this->package->package_id : null;

        $rules = [
            'name' => [
                        'required',
                        'max:255',
                        Rule::unique('packages')->ignore($package_id, 'package_id'),
                    ],
            'slug' => [
                        'required',
                        'max:255',
                        Rule::unique('packages')->ignore($package_id, 'package_id'),
                    ],
            'description' => 'required',
            'price' => 'required|numeric',
            'cover' => ['required', 'image'],
        ];

        if (isset($this->package)) {
            $rules['cover'] = ['image'];
        }

        return $rules;
    }
    
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
