<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Summary of FormRequest
 */
class ClientRequest extends FormRequest
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
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'images' => "required|",
      'name' => 'required|string|max:15',
      'email' => 'required|unique:clients,email',
      'phone' => 'required|max:15',
      'budget' => 'required|numeric',
    ];
  }
}