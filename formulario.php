<h1>Lista de contatos</h1>
	<form method="POST">
		<input type="hidden" name="id" 
		value="<?php echo $contato['id'];?>" />
		<fieldset>
			<legend>Novo contato</legend>
			<div class="container">
				<label>
					Nome:
					<?php if ($temErros && isset($errosValidacao['nome'])) :?>
							<span>
								<?php echo $errosValidacao['nome']; ?>
							</span>
						<?php endif; ?>
					<input type="text" name="nome" 
					value="<?php echo $contato['nome']; ?>" />
				</label>
				<label>
					Telefone:
					<input type="text" name="telefone" 
					value="<?php echo $contato['telefone']; ?>" />
				</label>
				<label>
					E-mail:
					<input type="email" name="email" 
					value="<?php echo $contato['email']; ?>" />
				</label>
				<label>
					Descrição:
					<textarea name="descricao"><?php echo $contato['descricao']; ?></textarea>
				</label>
			</div>
			<fieldset>
				<legend>Genero</legend>
				<input type="radio" name="sexo" value="0" <?php echo ($contato['sexo'] == 0) ? 'checked' : ''; ?> /> Masculino
				<input type="radio" name="sexo" value="1" <?php echo ($contato['sexo'] == 1) ? 'checked' : ''; ?> /> Feminino
			</fieldset>
			<div class="container">
			<label>
				Nascimento:
				<input type="date" name="nascimento"
				value="<?php echo $contato['nascimento']; ?>" />
			</label>
			</div>
			<label>
				Favorito:
				<input type="checkbox" name="favorito" value="1" <?php echo ($contato['favorito'] == 1) ? 'checked' : ''; ?> />
			</label>
			<input type="submit" value="<?php echo ($contato['id'] > 0 ) ? 'Atualizar' : 'Cadastrar'; ?> " />
		</fieldset>
	</form>