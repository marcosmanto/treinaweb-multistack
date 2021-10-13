<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;
    /**
     * Define os campos que podem ser manipulados.
     *
     * @var array
     */
    protected $fillable = ['nome_completo', 'complemento', 'cpf', 'email', 'telefone', 'logradouro', 'numero', 'bairro', 'cidade', 'estado', 'cep', 'codigo_ibge', 'foto_usuario'];

    /**
     * Define os campos que serão serializados no output de dados do model.
     *
     * @var array
     */
    protected $visible = ['nome_completo', 'cidade', 'foto_usuario', 'reputacao'];

    /**
     * Adiciona campos virtuais na serialização
     *
     * @var array
     */
    protected $appends = ['reputacao'];

    /**
     * Monta a URL da imagem
     *
     * @param  mixed $valor
     * @return void
     */
    public function getFotoUsuarioAttribute(string $valor)
    {
        return config('app.url') . '/' . $valor;
    }

    /**
     * Retorna a reputação da diarista
     *
     * @param  mixed $valor
     * @return void
     */
    public function getReputacaoAttribute($valor)
    {
        return mt_rand(1, 5);
    }

    /**
     * Busca diaristas por código IBGE
     *
     * @param  int $codIbge
     * @return void
     */
    public static function buscaPorCodigoIbge(int $codIbge)
    {
        return self::where('codigo_ibge', $codIbge)->limit(6)->get();
    }

    /**
     * Retorna a quantidade de diaristas descontando as 6 primeiras posições se a quantidade de registros for superior a 6.
     *
     * @param  int $codIbge
     * @return void
     */
    public static function quantidadePorCodigoIbge(int $codIbge)
    {
        $quantidade = self::where('codigo_ibge', $codIbge)->count();

        return $quantidade > 6 ? $quantidade - 6 : $quantidade;
    }
}
