<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'user_id' => 'required|integer',
            'number_of_members' => 'required|integer',
            'competition_id' => 'required|integer',
            'number_of_robots_but1' => 'nullable|integer',
            'number_of_robots_but2' => 'nullable|integer',
            'number_of_robots_but3' => 'nullable|integer',
            'number_of_teachers' => 'nullable|integer',
        ];
    }
}
