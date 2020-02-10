@extends('layouts.app')

    


@section('content')

<h3 class="mt-2">Cadastre um novo contato:</h3> 
<hr>

@include('includes.alerts')

<form class="form" action="{{ route('contatos.store') }}" method="post" enctype="multipart/form-data">
        
    @csrf
    
  <div class="form-row">
   <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome" value="{{ old('nome') }}">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Data de Nascimento">Data de Nascimento</label>
      <input type="text" name="datanascimento" class="form-control" id="Data de Nascimento" placeholder="10-02-1990" value="{{ old('datanascimento') }}">
    </div>

    <div class="form-group col-md-6">
      <label for="telefone">Telefone</label>
      <input type="text" name="telefone"class="form-control" id="telefone" placeholder="(92)99892-1021" value="{{ old('telefone') }}">
    </div>
   </div> 
   
    <div class="form-group col-md-12  row justify-content-center">
      <div class="evento-banner" >
        <h4>Possui uma foto dele?</h4>
       <p>Clique na foto abaixo para adicionar</p>
       <input id="arquivo"  class="" style="cursor:pointer;" type="file" name="foto" type="file" value="{{ old('foto') }}">
       
    <img id="imagem" src="https://cdn1.valuegaia.com.br/gaiasite/641/media/e6ac677fdb241210d1995afb4cd1505c-avatar-icon-png-8.jpg" style="width: 250px; height: 200px;"> 
     </div>
    </div>

    <div class="form-group  row justify-content-center">
    <button type="submit" class="col-md-8 btn btn-primary">Cadastrar</button>
    </div>
  </form>

@endsection


@push('scripts')
    
<script>
    $(document).ready(function(){
    CarregarImagem('arquivo'); 
    });
</script>

@endpush

