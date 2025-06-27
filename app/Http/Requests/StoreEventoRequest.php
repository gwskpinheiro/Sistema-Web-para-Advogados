<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:100',
            'descricao' => 'nullable|string',
            'data_hora' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'caso_id' => 'nullable|exists:casos,id',
            'processo_id' => 'nullable|exists:processos,id',
        ];
    }
}
