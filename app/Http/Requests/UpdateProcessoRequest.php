<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProcessoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'numero_processo' => 'required|string|max:50|unique:processos,numero_processo,' . $this->processo->id,
            'descricao' => 'nullable|string',
            'cliente_id' => 'required|exists:clientes,id',
        ];
    }
}
