				<script language="JavaScript">
					function validate()
					{
						if (document.getElementById('nome').value =='' || document.getElementById('assunto').value =='' || document.getElementById('email').value =='' || document.getElementById('mensagem').value =='')
							{
							document.getElementById('alert_message').style.display='block';
							return false;
							}
						return true;
					}
				</script>
			
				<div class="container" id="alert_message" style=display:none;>
					<div class="alert alert-danger">
						Preencha todos os dados antes de prosseguir.
					</div>
				</div>
				
				<form method=post onSubmit="return validate();">
					Nome: <input type=text name=nome id=nome>
					<br>
					Assunto: <input type=text name=assunto id=assunto>
					<br>
					Email: <input type=text name=email id=email>
					<br>
					Mensagem: <input type=text name=mensagem id=mensagem>
					<input type=submit class="btn btn-default" value="Enviar">
				</form>
				
				<?php
						if ( isset($_POST['nome']) && isset($_POST['assunto']) && isset($_POST['email']) && isset($_POST['mensagem']) )
							{
							echo "<p>Dados enviados com sucesso, abaixo seguem os dados que voce enviou:</p>";
							echo "<p>Nome = " . $_POST['nome'] . "</p>";
							echo "<p>Assunto = " . $_POST['assunto'] . "</p>";
							echo "<p>Email = " . $_POST['email'] . "</p>";
							echo "<p>Mensagem = " . $_POST['mensagem'] . "</p>";
							}
				?> 