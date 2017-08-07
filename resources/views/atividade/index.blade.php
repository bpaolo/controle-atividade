
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Controle de Atividade</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
    <body>        
        <div class="container">{{ Session::get('message') }}
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <h1>Lista de Controle de Atividades</h1>
        <table id="myTable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Data Início</th>
                        <th>Data Fim</th>
                        <th>Status</th>
                        <th>Situação</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($atividades as $atividade)
                    <tr @if ($atividade->status_id == 4) style="background-color:#90EE90;" @endif>

                        <td><a href="/controleAtividade/public/atividade/{{ $atividade->id }}">{{ $atividade->nome }}</td>
                        <td>{{ $atividade->descricao }}</td>
                        <td>{{ Carbon\Carbon::parse($atividade->data_inicio)->format('d/m/Y ')}}</td>
                        <td>{{ Carbon\Carbon::parse($atividade->data_fim)->format('d/m/Y ')}}</td>
                        <td>
                            @if ($atividade->status_id == 1)
                                Pendente
                            @endif
                            @if ($atividade->status_id == 2)
                                Em Desenvolvimento
                            @endif
                            @if ($atividade->status_id == 3)
                                Em Teste
                            @endif
                            @if ($atividade->status_id == 4)
                                Concluído
                            @endif 
                        </td>
                        <td>
                            @if ($atividade->situacao == 0)
                                Inativo
                            @endif
                            @if ($atividade->situacao == 1)
                                Ativo
                            @endif
                        </td>
                        <td><a href="/controleAtividade/public/atividade/{{ $atividade->id }}/edit">
                            @if ($atividade->status_id == 4)
                                Detalhe
                            @endif
                            @if ($atividade->status_id != 4)
                                Editar
                            @endif
                            </a>
                         </td>
                    </tr>
                @endforeach     
                </tbody>

            </table>
            <button type="button" class="btn btn-default btn-xs" onclick="window.location.href='http://localhost/controleAtividade/public/atividade/create'" >Cadastrar</button>
            <script src="{{ asset('assets/js/jquery.js') }}"></script>
            <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
            <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function(){
                    $('#myTable').DataTable();
                });
            </script>
        </div>
     </body>
</html>  