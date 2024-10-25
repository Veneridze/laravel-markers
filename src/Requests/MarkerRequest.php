<?php
namespace Veneridze\LaravelMarker\Requests;


use Illuminate\Foundation\Http\FormRequest;

class MarkerRequest extends FormRequest
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
            'comment' => ['nullable', 'text', 'max:255'],
            'day' => ['requried', 'integer', 'min:1', 'max:31'],
            'month' => ['requried', 'integer', 'min:1', 'max:12'],
            'year' => ['requried', 'integer', 'min:2024', 'max:2030'],
        ];
    }
}
