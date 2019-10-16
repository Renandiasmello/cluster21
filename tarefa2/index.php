<?php 

include_once 'ClassPalindromo.php';

$ehPalindromo = false;
if(isset($_POST['submit'])){
	$verifica_palindromo = new ClassPalindromo($_POST['palindromo']);
	$ehPalindromo = $verifica_palindromo->ehPalindromo();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palíndromo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css"> .input1 { width: 385px!important; }</style>
</head>
<body><br>
	<div class="container">
		<div class="form-group">
			<form method="post" name="form">
				<fieldset>
			    <legend>Verificação de Palíndromos</legend>
			    	<div class="control-group">
                        <label class="control-label">Descrição:</label>
                        <div class="controls">
                            <input type="text" class="form-control input1" name="palindromo" id="palindromo" aria-describedby="palindromo" 
				    			placeholder="Ex.: Anna, 1235321" value="<?php echo isset($_POST['palindromo']) ? $_POST['palindromo'] : '' ?>" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>	
			    </fieldset><br>
			    <?php if(isset($_POST['submit']) && empty(trim($_POST['palindromo']))): ?>
					<div class="alert alert-danger">Por favor, preencha a descrição.</div>
				<?php endif ?>
				<?php if(isset($_POST['submit']) && !empty(trim($_POST['palindromo']))): ?>
					<?php if(!$ehPalindromo): ?>
						<div class="alert alert-danger">Não é palíndromo :(</div>
					<?php else: ?>
						<div class="alert alert-success">É palíndromo :)</div>
					<?php endif ?>
				<?php endif ?>
			    <button type="submit" name="submit" class="btn btn-success">Enviar</button>
			    <a href="index.php" class="btn btn-danger">Cancelar</a>
			</form>
		</div>
	</div>
</body>
</html>
