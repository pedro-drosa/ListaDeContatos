<table>
		<tr>
			<th>Nome</th>
			<th>Telefone</th>
			<th>E-mail</th>
			<th>Descrição</th>
			<th>Genero</th>
			<th>Nascimento</th>
			<th>Favorito</th>
			<th>Opções</th>
		</tr>
		<?php foreach ($listaContatos as $contato) : ?> 
			<tr>
				<td><?php echo $contato['nome']; ?></td>
				<td><?php echo $contato['telefone']; ?></td>
				<td><?php echo $contato['email']; ?></td>
				<td><?php echo $contato['descricao']; ?></td>
				<td><?php echo $contato['sexo']; ?></td>
				<td><?php echo traduz_data($contato['nascimento']); ?></td>
				<td><?php echo traduz_favorito($contato['favorito']); ?></td>
				<td>
					<a href="editar.php?id=<?php echo $contato['id'];?>"> Editar </a>
					<a href="remover.php?id=<?php echo $contato['id']; ?>">Remover</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>