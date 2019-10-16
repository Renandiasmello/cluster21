<?php 

define('DS', DIRECTORY_SEPARATOR);

include_once '..' . DS .'classes' . DS . 'EntradaTexto.php';


$obj_texto = new EntradaTexto();
$dados = $obj_texto->retornarValor();

$retorno_save = false;
if(isset($_POST['submit'])){
	$retorno_save = $obj_texto->adicionar($_POST['descricao']);
	$dados = $obj_texto->retornarValor();
}

$retorno_delete = false;
if(isset($_GET['id'])){
	$retorno_delete = $obj_texto->deletarValor($_GET['id']);
	$dados = $obj_texto->retornarValor();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Textos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css?v=1331501619"/>
    <style type="text/css"> .input1 { width: 385px!important; }</style>
</head>
<body><br>
	<div class="container">
		<div class="form-group">
			<form method="post" name="form">
				<fieldset>
			    <legend>Cadastro de textos</legend>
			    	<div class="control-group">
                        <label class="control-label">Descrição:</label>
                        <div class="controls">
                            <input type="text" class="form-control input1" name="descricao" id="descricao" aria-describedby="descricao" 
				    			placeholder="Preencha o texto" value="" maxlength="100" autocomplete="off" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>	
			    </fieldset><br>
			    <?php if(isset($_POST['submit']) && empty(trim($_POST['descricao']))): ?>
					<div class="alert alert-danger">Por favor, preencha a descrição.</div>
				<?php endif ?>

				<?php if(isset($_POST['submit']) && !empty(trim($_POST['descricao']))): ?>
					<?php if(!$retorno_save): ?>
						<div class="alert alert-danger">Não foi possível salvar a descrição :(</div>
						<?php header("refresh:2; url=index.php"); ?>
					<?php else: ?>
						<div class="alert alert-success">Registro salvo com sucesso.</div>
						<?php header("refresh:2; url=index.php"); ?>
					<?php endif ?>
				<?php endif ?>
				<?php if($retorno_delete): ?>
					<div class="alert alert-danger">Registo excluído com sucesso</div>
					<?php header("refresh:2; url=index.php"); ?>
				<?php endif ?>
			    <button type="submit" name="submit" class="btn btn-success">Enviar</button>
			    <a href="../index.php" class="btn btn-danger">Cancelar</a>
			</form>
		</div><br>
		<fieldset>
		<legend>Lista de textos</legend>
			<table class="table table-striped table-bordered table-hover">
	            <thead>
	            <tr>
	                <th class="col-sm-2">Código</th>
	                <th>Descrição</th>
	                <th class="col-sm-2">Tipo</th>
	                <th class="col-sm-1 text-center">Ações</th>
	            </tr>
	            </thead>
	            <tbody>
	            	<?php if(!empty($dados)):?>
	            	<?php foreach($dados as $d):?>
		            	<tr>
		            		<td><?php echo $d->id; ?></td>
		            		<td><?php echo $d->descricao; ?></td>
		            		<td><?php echo $d->is_text ? 'Texto' : 'Numérico'; ?></td>
		            		<td class="text-center"><a href="index.php?id=<?php echo $d->id ?>" onclick="return confirm('Deseja mesmo excluír o registro?');"><i class="fas fa-trash-alt"></i></a></td>
		            	</tr>
	            	<?php endforeach;?>
	            	<?php else: ?>
	            		<tr>
		            		<td colspan="4">Nenhum registro encontrado.</td>
		            	</tr>
	            	<?php endif;?>
	            </tbody>
	        </table>
	    </fieldset>
	</div>
</body>
</html>
