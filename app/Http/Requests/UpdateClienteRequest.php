<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:100',
            'cpf_cnpj' => 'required|string|max:20|unique:clientes,cpf_cnpj,' . $this->cliente->id,
            'email' => 'nullable|email|max:100',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string',
        ];
    }
}
