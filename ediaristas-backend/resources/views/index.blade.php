@extends('app')
@section('titulo', 'Página inicial')
@section('conteudo')
<h1>Lista de diaristas</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($diaristas as $diarista)
    <tr>
      <th scope="row">{{$diarista->id}}</th>
      <td>{{$diarista->nome_completo}}</td>
      <td>{{$diarista->telefone}}</td>
      <td>
        <a href="{{ route('diaristas.edit', $diarista) }}" class="btn btn-primary">Editar</a>
        <form style="display: inline-block" action="{{ route('diaristas.destroy', $diarista) }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" value="Excluir" class="btn btn-danger"
            onclick="return confirm('Tem certeza que deseja exluir');" />
        </form>
      </td>
    </tr>
    @empty
    <tr>
      <th scope="row" colspan="4" style="text-align: center">Nenhum registro encontrado.</th>
    </tr>
    @endforelse
  </tbody>
</table>
<a href="{{ route('diaristas.create') }}" class="btn btn-success">Nova Diarista</a>
@endsection