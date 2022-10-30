<div class="col-lg-7 mb-lg-0 mb-4 col-sm-9">
    <div class="card z-index-2 h-100">
    <div class="card-header pb-0 pt-3 bg-transparent">
    <h6 class="text-capitalize">Informacões do pedido</h6>
    <p class="text-sm mb-0">
        Confira e edite as informacoes do pedido
    </p>
    </div>
    <div class="card-body p-3">
    <form action="<?=$base?>/edit/<?=$order['id']?>/<?=$order['service_type']?>" method="post">
        <div class="mb-3">
            <label for="cep_start" class="form-label">Data de Inicio:</label>
            <input name='date' class='form-control' type="text" value='<?=$order['date']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Rua inicio:</label>
            <input name='street' class='form-control' type="text" value='<?=$order['street']?>'>
        </div>
        
        <div class="mb-3">
            <label for="cep_start" class="form-label">CEP / CIDADE:</label>
            <input name='cep_start' class='form-control' type="text" value='<?=$order['cep_start']?>'>
        </div>
        
        <div class="mb-3">
            <label for="cep_start" class="form-label">Passengers:</label>
            <input name='passengers' class='form-control' type="text" value='<?=$order['passengers']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Observation:</label>
            <input name='obs' class='form-control' type="text" value='<?=$order['obs']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">How:</label>
            <input name='how' class='form-control' type="text" value='<?=$order['how']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">name:</label>
            <input name='name' class='form-control' type="text" value='<?=$order['name']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Email:</label>
            <input name='email' class='form-control' type="text" value='<?=$order['email']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Telefone:</label>
            <input name='phone' class='form-control' type="text" value='<?=$order['phone']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Service Type:</label>
            <input class='form-control' type="text" value='<?=$order['service_type']?>'>
        </div>
        <input class='btn btn-primary btn-lg' type="submit" value="Editar e Salvar">
        <a onclick="confirm('Tem certeza que deseja excluir o pedido?')" class="btn btn-danger btn-lg" href="<?=$base?>/excluir/<?=$order['id']?>/<?=$order['service_type']?>">Excluir</a>
    </form>
    </div>
</div>
</div>