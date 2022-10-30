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
            <label for="cep_start" class="form-label">CEP / CIDADE  de Inicio:</label>
            <input class='form-control' type="text" name='cep_start' value='<?=$order['cep_start']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Data de Inicio:</label>
            <input class='form-control' type="text" name='date' value='<?=$order['date_start']?>'>
        </div>
        
        <div class="mb-3">
            <label for="cep_start" class="form-label">Passageiros:</label>
            <input class='form-control' type="text" name='passengers' value='<?=$order['passengers']?>'>
        </div>
        
        <div class="mb-3">
            <label for="cep_start" class="form-label">cadeiras de crianca:</label>
            <input class='form-control' type="text" name='kids_seats' value='<?=$order['kids_seats']?>'>
        </div>
        
        <div class="mb-3">
            <label for="cep_start" class="form-label">Assento elevatorio:</label>
            <input class='form-control' type="text" name='booster_seats' value='<?=$order['booster_seats']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Observacao:</label>
            <input class='form-control' type="text" name='obs' value='<?=$order['obs']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Nome:</label>
            <input class='form-control' type="text" name='name' value='<?=$order['name']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Email:</label>
            <input class='form-control' type="text" name='email' value='<?=$order['email']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Telefone:</label>
            <input class='form-control' type="text" name='phone' value='<?=$order['phone']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">street_name:</label>
            <input class='form-control' type="text" name='street' value='<?=$order['street_name']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">CEP / CIDADE Final:</label>
            <input class='form-control' type="text" name='cep_end' value='<?=$order['cep_end']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Conection:</label>
            <input class='form-control' type="text"name='conection' value='<?=$order['conection']?>'>
        </div>

        <div class="mb-3">
            <label for="cep_start" class="form-label">Airport:</label>
            <input class='form-control' type="text" name='airport' value='<?=$order['airport']?>'>
        </div>
        <input class='btn btn-primary btn-lg' type="submit" value="Editar e Salvar">
        <a onclick="confirm('Tem certeza que deseja excluir o pedido?')" class="btn btn-danger btn-lg" href="<?=$base?>/excluir/<?=$order['id']?>/<?=$order['service_type']?>">Excluir</a>
    </form>
    </div>
</div>
</div>