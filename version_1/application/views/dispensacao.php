<!-- https://getbootstrap.com/docs/5.0/content/typography/ -->
<figure class="text-end" style="margin-right:30px;">
  <blockquote class="blockquote">
    <p></p>
  </blockquote>
  <figcaption class="blockquote-footer">
     <cite title="Source Title"></cite>
  </figcaption>
</figure>

<div class="container-fluid" style="margin-top:30px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Início</a>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Dispensação</a>
        </ol>
    </nav>
    <div class="shadow-lg p-3 mb-5 bg-body rounded">

        <h1 class="display-6">Lista de Dispensações</h1>

        <button type="button" style="margin-right:20px; margin-bottom:20px;" class="btn btn-primary float-end" 
            data-bs-toggle="modal" data-bs-target="#cadastro_modal">
            <i class="fa fa-plus"></i>
            Nova Dispensação
        </button>

        <!-- Início do código PHP -->
        <?php 
            echo '<table class="table">'; 
                echo '<tr>';
                    echo '<th>Nome Funcionário</th>';
                    echo '<th>Nome Cliente</th>';
                    echo '<th>Nome Medicamento</th>';
                    echo '<th>Data</th>';
                    echo '<th>Quantidade</th>';
                    echo '<th>Valor</th>';
                    echo '<th>Ações</th>';
                echo '</tr>';
                $i=0;
                foreach ($users as $user) {
                        echo '<td>'.$funs[$i]->nome.'</td>';
                        echo '<td>'.$clis[$i]->nome.'</td>';
                        echo '<td>'.$meds[$i]->nome.'</td>';
                        echo '<td>'.$user->date.'</td>';
                        echo '<td>'.$user->quantidade.'</td>';
                        echo '<td>'.$user->valor.'</td>';
                        echo '<td>';
                            echo '
                                <a href="#" data-bs-toggle="modal" data-bs-target="#visualizar_modal" data-bs-nome="'.$funs[$i]->nome.'"data-bs-nome_="'.$clis[$i]->nome.'" data-bs-nome="'.$meds[$i]->nome.'"data-bs-data="'.$user->date.'"data-bs-quantidade="'.$user->quantidade.'"data-bs-valor="'.$user->valor.'">
                                    <button type="button" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"></path>
                                        </svg>
                                    Visualizar
                                    </button>
                                </a>';
                            echo '
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editar_modal" data-bs-nome="'.$funs[$i]->nome.'"data-bs-nome="'.$clis[$i]->nome.'" data-bs-nome="'.$meds[$i]->nome.'"data-bs-data="'.$user->date.'"data-bs-quantidade="'.$user->quantidade.'"data-bs-valor="'.$user->valor.'"data-bs-id_dis="'.$user->id_dis.'">
                                    <button type="button" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                        </svg>
                                    Editar
                                    </button>
                                </a>';
                            echo '
                                <a href="'.base_url('dispensacao/apagarusuario/'.$user->id_dis).'">
                                    <button type="button" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                    Apagar
                                    </button>
                                </a>';
                        echo '</td>';
                    echo '</tr>';
                    $i++;
                }
                
            echo '</table>';
        ?>
        <!-- Fim do código PHP --> 

    </div>
</div>

<!-- Modal e Formulário
    https://getbootstrap.com/docs/5.1/components/modal/
    https://getbootstrap.com/docs/5.1/forms/overview/
-->
<div class="modal fade" id="cadastro_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nova Dispensação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" id="cadastro_form" action="#" autocomplete="off">
            <div class="mb-3">
                <label for="id_fun" class="form-label">ID Funcionário</label>
                <input type="number" class="form-control" id="id_fun" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="id_cli" class="form-label">ID Cliente</label>
                <input type="number" class="form-control" id="id_cli" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="id_med" class="form-label">ID Medicamento</label>
                <input type="number" class="form-control" id="nid_med" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" class="form-control" id="date" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" class="form-control" id="valor" value="&nbsp">
            </div>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="enviar" class="btn btn-primary" onclick="salvarCadastro()">Salvar</button>
      </div>
    </div>
  </div>
</div>

<script>

function salvarCadastro(){

    var id_fun = document.getElementById('id_fun').value;
    var id_cli = document.getElementById('id_cli').value;
    var id_med = document.getElementById('id_med').value;
    var date = document.getElementById('date').value;
    var quantidade = document.getElementById('quantidade').value;
    var valor = document.getElementById('valor').value;


    /* 
        $.post é uma função do JQuery que auxilia no envio de dados da nossa view para nosso controller backend php 
        $post(url, dados que serão enviados, função retorno);
    */
    $.post("<?php echo base_url("dispensacao/novousuario") ?>",               //url 
        {id_fun:id_fun,id_cli:id_cli,id_med:id_med,date:date,quantidade:quantidade,valor:valor}, //dados que serão enviados
        function(data) {                                                   // função retorno
            if (data == 'true') {
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'O funcionário foi cadastrado com sucesso.',
                    icon: 'success',
                    confirmButtonText: 'Ok!',
                }).then(function(){ 
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Contate o administrador do sistema!',
                    icon: 'error',
                    confirmButtonText: 'Ok!',
                }).then(function(){ 
                    location.reload();
                });
            }
        }
    );
}

</script>

<div class="modal fade" id="visualizar_modal" data-bs-backdrop="static" data-bs-keyboard="false" 
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Visualizar Dispensações</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" id="visualizar_form" action="#" autocomplete="off">
            <div class="mb-3">
                <label for="v_id_fun" class="form-label">ID Funcionário</label>
                <input type="number" class="form-control" id="v_id_fun" value="&nbsp" disabled>
            </div>
            <div class="mb-3">
                <label for="v_id_cli" class="form-label">ID Cliente</label>
                <input type="number" class="form-control" id="v_id_cli" value="&nbsp" disabled>
            </div>
            <div class="mb-3">
                <label for="v_id_med" class="form-label">ID Medicamento</label>
                <input type="number" class="form-control" id="v_id_med" value="&nbsp" disabled>
            </div>
            <div class="mb-3">
                <label for="v_date" class="form-label">Data</label>
                <input type="date" class="form-control" id="v_date" value="&nbsp" disabled>
            </div>
            <div class="mb-3">
                <label for="v_quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="v_quantidade" value="&nbsp" disabled>
            </div>
            <div class="mb-3">
                <label for="v_valor" class="form-label">Valor</label>
                <input type="number" class="form-control" id="v_valor" value="&nbsp" disabled>
            </div>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#visualizar_modal').on('show.bs.modal', function(e) {
    var id_fun = $(e.relatedTarget).data('bs-id_fun');
    var id_cli = $(e.relatedTarget).data('bs-id_cli');
    var id_med = $(e.relatedTarget).data('bs-id_med');
    var date = $(e.relatedTarget).data('bs-date');
    var quantidade = $(e.relatedTarget).data('bs-quantidade');
    var valor = $(e.relatedTarget).data('bs-valor');

    document.getElementById('v_id_fun').value = id_fun;
    document.getElementById('v_id_cli').value = id_cli;
    document.getElementById('v_id_med').value = id_med;
    document.getElementById('v_date').value = date;
    document.getElementById('v_quantidade').value = quantidade;
    document.getElementById('v_valor').value = valor;

})
</script>


<div class="modal fade" id="editar_modal" data-bs-backdrop="static" data-bs-keyboard="false" 
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar cadastro de Dispensação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" id="e_modal" action="#" autocomplete="off">

            <input type="text" style="display:none" id="e_id_dis">
            <div class="mb-3">
                <label for="e_id_fun" class="form-label">ID Funcionário</label>
                <input type="number" class="form-control" id="e_id_fun" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="e_id_cli" class="form-label">ID Cliente</label>
                <input type="number" class="form-control" id="e_id_cli" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="e_id_med" class="form-label">ID Medicamento</label>
                <input type="number" class="form-control" id="e_id_med" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="e_date" class="form-label">Data</label>
                <input type="date" class="form-control" id="e_date" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="e_quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="e_quantidade" value="&nbsp">
            </div>
            <div class="mb-3">
                <label for="e_valor" class="form-label">Valor</label>
                <input type="number" class="form-control" id="e_valor" value="&nbsp">
            </div>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="editarCadastro()">Salvar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#editar_modal').on('show.bs.modal', function(e) {
    var id_dis = $(e.relatedTarget).data('bs-id_dis');
    var id_fun = $(e.relatedTarget).data('bs-id_fun');
    var id_cli = $(e.relatedTarget).data('bs-id_cli');
    var id_med = $(e.relatedTarget).data('bs-id_med');
    var date = $(e.relatedTarget).data('bs-date');
    var quantidade = $(e.relatedTarget).data('bs-quantidade');
    var valor = $(e.relatedTarget).data('bs-valor');

    document.getElementById('e_id_dis').value = id_dis;
    document.getElementById('e_id_fun').value = id_fun;
    document.getElementById('e_id_cli').value = id_cli;
    document.getElementById('e_id_med').value = id_med;
    document.getElementById('e_date').value = date;
    document.getElementById('e_quantidade').value = quantidade;
    document.getElementById('e_valor').value = valor;

})

function editarCadastro(){
    var id_dis = document.getElementById('e_id_dis').value;
    var id_fun = document.getElementById('e_id_fun').value;
    var id_cli = document.getElementById('e_id_cli').value;
    var id_med = document.getElementById('e_id_med').value;
    var date = document.getElementById('e_date').value;
    var quantidade = document.getElementById('e_quantidade').value;
    var valor = document.getElementById('e_valor').value;


    $.post("<?php echo base_url("dispensacao/editarusuario") ?>",               
        {id_dis:id_dis,id_fun:id_fun,id_cli:id_cli,id_med:id_med,date:date,quantidade:quantidade,valor:valor}, 
        function(data) {                                                   
            if (data == 'true') {
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'O cadastro foi alterado com sucesso.',
                    icon: 'success',
                    confirmButtonText: 'Ok!',
                }).then(function(){ 
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Contate o administrador do sistema e informe o código: 1000',
                    icon: 'error',
                    confirmButtonText: 'Ok!',
                }).then(function(){ 
                    location.reload();
                });
            }
        }
    );

}
</script>  

