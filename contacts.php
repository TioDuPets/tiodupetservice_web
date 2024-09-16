<?php defined('CONTROL') or die('Acesso inválido.') ?>
<div class="container-fluid p-3 bg-secondary text-white">
    <div class="row my-5">
        <div class="col text-center">
            <h1>Adicionar seu contato:</h1>
            <main>
             <?php if (isset($error)): ?>
             <p class="error"><?php echo htmlspecialchars($error); ?></p>
             <?php endif; ?>
              <form method="POST" action="add_pet.php">
               <br></br>
               <label for="nomesobrenome">Nome e Sobrenome</label>
				<input type="text" id="nomesobrenome" class="input-padrao" required>

				<label for="email">Email</label>
				<input type="email" id="email" class="input-padrao" required placeholder="seuemail@email.com">

				<label for="telefone">Telefone</label>
				<input type="tel" id="telefone" class="input-padrao" required placeholder="(XX)XXXXX-XXXX">
                <br></br>
				<textarea cols="70" rows="10" id="mensagem" class="input-padrao" required></textarea>

				<fieldset>

					<legend>Como prefere nosso contato?</legend>

					<label for="radio-email"><input type="radio" name="contato" value="email" id="radio-email">Email</label>

					<label for="radio-telefone"><input type="radio" name="contato" value="telefone" id="radio-telefone">Telefone</label>

					<label for="radio-whatsapp"><input type="radio" name="contato" value="whatsapp" id="radio-whatsapp" checked>Whatsapp</label>

				</fieldset>
				<fieldset>
					<legend>Qual horário prefere receber nosso contato?</legend>
					<select>
						<option>Manhã</option>
						<option>tarde</option>
						<option>noite</option>
					</select>
				</fieldset>
				<label class="checkbox"><input type="checkbox" checked>Gostaria de receber nossas novidades por email?</label>
                <br></br>
				<input type="submit" value="Enviar formulário" class="enviar">
			</form>
            </main>
        </div>
    </div>
</div>