<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ViaCEP
{
    /**
     * Consulta CEP no ViaCep
     *
     * @param  string $cep
     * @return boolean|array
     */
    public function buscar(string $cep)
    {
        $url = sprintf('https://viacep.com.br/ws/%s/json/', $cep);

        $res = Http::get($url);

        if ($res->failed()) {
            return false;
        }

        $dados = $res->json();

        if (isset($dados['erro']) && $dados['erro'] === true) {
            return false;
        }

        return $dados;
    }
}
