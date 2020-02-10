@extends('layouts.app')


@section('search')
<input class="form-control form-inline col-sm-3 mr-sm-2 " id="txtBusca" type="search" placeholder="Buscar contato" aria-label="Search">
@endsection

@section('content')

<h3 class="mt-2">Todos os contatos:</h3> 
<hr>

@component('components.table')
    
    @slot('head')
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th></th>
            <th></th>
        </tr>
    @endslot
    @slot('slot')
    @forelse ($contatos as $contato)
    <tr>
        <td>
          @if ($contato->foto)
            <img style="width:150px;height:100px;border-radius:20px" src="{{url('storage/contatos/'.$contato->foto)}}" alt="Foto">
          @else
          <img style="width:150px;height:100px;border-radius:20px" src="https://cdn1.valuegaia.com.br/gaiasite/641/media/e6ac677fdb241210d1995afb4cd1505c-avatar-icon-png-8.jpg" style="width: 250px; height: 200px;"> 
          @endif
        </td>    
        <td class="nome">{{$contato->nome}}</td>
        <td>{{$contato->email}}</td>
        <td>{{$contato->telefone}}</td>
        <td>{{date('d-m-Y', strtotime($contato->datanascimento))}}</td>
        <td><a href="{{ route('contatos.edit', $contato->id) }}" class="btn btn-outline-info">Editar</a></td>
        <td>         
        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-exclusao{{$contato->id}}">Excluir</button>
        </td>
        <!-- Modal -->
        <div class="modal fade" id="modal-exclusao{{$contato->id}}" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modal1">Confirmar Exlusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Você tem certeza que deseja excluir o {{$contato->nome}}?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                 <form action="{{route('contatos.destroy',$contato->id)}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-info">Excluir</button>
                </form> 
                </div>
            </div>
            </div>
        </div>
    </tr> 

  
    @empty
        <tr>
            <td>Nenhum registro encontrado</td>
        </tr>
    @endforelse
    @endslot
    @endcomponent
    {!!$contatos->links()!!}

@endsection

@push('scripts')
    <script>
        $('.modal').modal(options);

    

    </script>
@endpush