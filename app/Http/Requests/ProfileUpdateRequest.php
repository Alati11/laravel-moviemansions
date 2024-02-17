<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'surname' => ['required', 'string', 'max:255'],
            'profile_pic' => [
                "nullable",
                "mimes:jpeg,png,jpg,gif,webp",
                File::image()
                    ->min('1kb')
                    ->max('10mb')
                ],
            'date_of_birth' => ['required', 'date_format:Y-m-d', 'after:'. date('Y-m-d', strtotime('-100 years')), 'before:' . date('Y-m-d', strtotime('-16 years'))],
        ];
    }
}
