$(document).ready(function(){

	$("form[name='voluntario']").submit(function(e){

		e.preventDefault();

		var nome = $('input[name="nome"]').val();
		var cpf = $('input[name="cpf"]').val();
		var sexo = $('input[name="sexo"]:checked').val();
		var nascimento = $('input[name="nascimento"]').val();
		var endereco = $('input[name="endereco"]').val();
		var cidade = $('input[name="cidade"]').val();
		var telefone = $('input[name="telefone"]').val();
		var celular = $('input[name="celular"]').val();
		var tempo = $('input[name="tempo"]').val();
		var dias = $('input[name="dias"]:checked').val();
		var email = $('input[name="email"]').val();
		var desejo = $('input[name="optin"]:checked').val();
		

		//console.log(nome+email+mensagem);

		if(nome && email && cpf){

			var bodyMsg = '<div style="font-size:18px;">'
				bodyMsg += 'Um usuários mandou uma mensagem atráves do formulário do site.<br/> Seguem os dados abaixo: <br/>';
				bodyMsg += '<br/><b>Nome:</b> '+nome;
				bodyMsg += '<br/><b>CPF:</b> '+cpf;
				bodyMsg += '<br/><b>Sexo:</b> '+sexo;
				bodyMsg += '<br/><b>Nascimento:</b> '+nascimento;
				bodyMsg += '<br/><b>Endereço:</b> '+endereco;
				bodyMsg += '<br/><b>Cidade:</b> '+cidade;
				bodyMsg += '<br/><b>Telefone:</b> '+telefone;
				bodyMsg += '<br/><b>Celular:</b> '+celular;
				bodyMsg += '<br/><b>Tempo disponível:</b> '+tempo;
				bodyMsg += '<br/><b>Dias para voluntariado:</b> '+dias;
				bodyMsg += '<br/><b>E-mail:</b> '+email;
				bodyMsg += '<br/><b>Deseja receber notícias do CEAP?:</b> '+desejo;
				bodyMsg += '</div>';

			$.ajax({
			  type: "POST",
			  url: "https://mandrillapp.com/api/1.0/messages/send.json",
			  data: {
			    'key': 'KUMvIZPPREIJDmykpEcwow',
			    'message': {
			      'from_email': 'contato@pedreira.org',
			      'to': [
			          {
			            //'email': 'jorgeants@gmail.com',
			            'email': 'contato@pedreira.org',
			            //'name': 'RECIPIENT NAME (OPTIONAL)',
			            'type': 'to'
			          }
			        ],
			      'autotext': 'true',
			      'subject': 'Colaborador - Voluntários',
			      'html': bodyMsg
			    }
			  }
			 }).done(function(response) {
			   //console.log(response); // if you're into that sorta thing
			   alert("Mensagem enviada com sucesso!");
			   $("form[name='contact']")[0].reset();
			 });

		}else{

			alert("Verifique se algum campo ficou em branco. Todos os campos são obrigatórios!");

		}

	});

	$("form[name='contact-juridico']").submit(function(e){

		e.preventDefault();

		var razao = $('input[name="razao"]').val();
		var cnpj = $('input[name="cnpj"]').val();
		var nome = $('input[name="nome"]').val();
		var cep = $('input[name="cep"]').val();
		var endereco = $('input[name="endereco"]').val();
		var cidade = $('input[name="cidade"]').val();
		var telefone = $('input[name="telefone"]').val();
		var valor = $('input[name="valor"]').val();
		var modo = $('input[name="pag"]:checked').val();
		var dia = $('input[name="dia-doacao"]').val();
		var frequencia = $('input[name="frequencia"]:checked').val();
		var email = $('input[name="email"]').val();
		var desejo = $('input[name="optin"]:checked').val();

		//console.log(nome+email+mensagem);

		if(nome && email && razao){

			var bodyMsg = '<div style="font-size:18px;">'
				bodyMsg += 'Um usuários mandou uma mensagem atráves do formulário do site.<br/> Seguem os dados abaixo: <br/>';
				bodyMsg += '<br/><b>Razão Social:</b> '+razao;
				bodyMsg += '<br/><b>CNPJ:</b> '+cnpj;
				bodyMsg += '<br/><b>Nome:</b> '+nome;
				bodyMsg += '<br/><b>CEP:</b> '+cep;
				bodyMsg += '<br/><b>Endereço:</b> '+endereco;
				bodyMsg += '<br/><b>Cidade:</b> '+cidade;
				bodyMsg += '<br/><b>Telefone:</b> '+telefone;
				bodyMsg += '<br/><b>Valor:</b> '+valor;
				bodyMsg += '<br/><b>Modo:</b> '+modo;
				bodyMsg += '<br/><b>Dia:</b> '+dia;
				bodyMsg += '<br/><b>Frequência:</b> '+frequencia;
				bodyMsg += '<br/><b>E-mail:</b> '+email;
				bodyMsg += '<br/><b>Deseja receber notícias do CEAP?:</b> '+desejo;
				bodyMsg += '</div>';

			$.ajax({
			  type: "POST",
			  url: "https://mandrillapp.com/api/1.0/messages/send.json",
			  data: {
			    'key': 'KUMvIZPPREIJDmykpEcwow',
			    'message': {
			      'from_email': 'contato@pedreira.org',
			      'to': [
			          {
                                    'email': 'contato@pedreira.org',
			            //'name': 'RECIPIENT NAME (OPTIONAL)',
			            'type': 'to'
			          }
			        ], //Vou voltar com um assunto polêmico que falamos hoje de manhã. =P Ia falar disso só amanhã 
			      'autotext': 'true',
			      'subject': 'Colaborador - Pessoa Jurídica',
			      'html': bodyMsg
			    }
			  }
			 }).done(function(response) {
			   //console.log(response); // if you're into that sorta thing
			   alert("Mensagem enviada com sucesso!");
			   $("form[name='contact']")[0].reset();
			 });
			
			if (modo == "TRANSFERÊNCIA VIA PAG SEGURO") {
				window.location.href = "pag-seguro.php";
			}
		}else{

			alert("Verifique se algum campo ficou em branco. Todos os campos são obrigatórios!");

		}

	});

	$("form[name='contact-fisica']").submit(function(e){

		e.preventDefault();

		var nome = $('input[name="nome"]').val();
		var cpf = $('input[name="cpf"]').val();
		var sexo = $('input[name="sexo"]:checked').val();
		var nascimento = $('input[name="nascimento"]').val();
		var endereco = $('input[name="endereco"]').val();
		var cidade = $('input[name="cidade"]').val();
		var telefone = $('input[name="telefone"]').val();
		var celular = $('input[name="celular"]').val();
		var valor = $('input[name="valor"]').val();
		var modo = $('input[name="pag"]:checked').val();
		var dia = $('input[name="dia-doacao"]').val();
		var frequencia = $('input[name="frequencia"]:checked').val();
		var email = $('input[name="email"]').val();
		var desejo = $('input[name="optin"]:checked').val();

		//console.log(nome+email+mensagem);

		if(nome && email && cpf){

			var bodyMsg = '<div style="font-size:18px;">'
				bodyMsg += 'Um usuários mandou uma mensagem atráves do formulário do site.<br/> Seguem os dados abaixo: <br/>';
				bodyMsg += '<br/><b>Nome:</b> '+nome;
				bodyMsg += '<br/><b>CPF:</b> '+cpf;
				bodyMsg += '<br/><b>Sexo:</b> '+sexo;
				bodyMsg += '<br/><b>Nascimento:</b> '+nascimento;
				bodyMsg += '<br/><b>Endereço:</b> '+endereco;
				bodyMsg += '<br/><b>Cidade:</b> '+cidade;
				bodyMsg += '<br/><b>Telefone:</b> '+telefone;
				bodyMsg += '<br/><b>Celular:</b> '+celular;
				bodyMsg += '<br/><b>Valor:</b> '+valor;
				bodyMsg += '<br/><b>Modo:</b> '+modo;
				bodyMsg += '<br/><b>Dia:</b> '+dia;
				bodyMsg += '<br/><b>Frequência:</b> '+frequencia;
				bodyMsg += '<br/><b>E-mail:</b> '+email;
				bodyMsg += '<br/><b>Deseja receber notícias do CEAP?:</b> '+desejo;
				bodyMsg += '</div>';

			$.ajax({
			  type: "POST",
			  url: "https://mandrillapp.com/api/1.0/messages/send.json",
			  data: {
			    'key': 'KUMvIZPPREIJDmykpEcwow',
			    'message': {
			      'from_email': 'contato@pedreira.org',
			      'to': [
				{
			            'email': 'contato@pedreira.org',
			            //'name': 'RECIPIENT NAME (OPTIONAL)',
			            'type': 'to'
			          }
			        ], //Vou voltar com um assunto polêmico que falamos hoje de manhã. =P Ia falar disso só amanhã 
			      'autotext': 'true',
			      'subject': 'Colaborador - Pessoa Física',
			      'html': bodyMsg
			    }
			  }
			 }).done(function(response) {
			   //console.log(response); // if you're into that sorta thing
			   alert("Mensagem enviada com sucesso!");
			   $("form[name='contact']")[0].reset();
			 });

			if (modo == "TRANSFERÊNCIA VIA PAG SEGURO") {
                                window.location.href = "pag-seguro.php";
                        }

		}else{

			alert("Verifique se algum campo ficou em branco. Todos os campos são obrigatórios!");

		}

	});

	$("form[name='contact']").submit(function(e){

		e.preventDefault();

		var nome = $('input[name="nome"]').val();
		var email = $('[name="email"]').val();
		var desejo = $('input[name="optin"]').val();
		var mensagem = $('[name="mensagem"]').val();

		//console.log(nome+email+mensagem);

		if(nome && email && mensagem){

			var bodyMsg = '<div style="font-size:18px;">';
				bodyMsg += 'Um usuário enviou uma mensagem atráves do formulário do site.<br/> Seguem os dados abaixo: <br/>';
				bodyMsg += '<br/><b>Nome:</b> '+nome;
				bodyMsg += '<br/><b>E-mail:</b> '+email;
				bodyMsg += '<br/><b>Mensagem:</b> '+mensagem;
				bodyMsg += '<br/><b>Deseja receber notícias do CEAP?:</b> '+desejo;
				bodyMsg += '</div>';

			$.ajax({
			  type: "POST",
			  url: "https://mandrillapp.com/api/1.0/messages/send.json",
			  data: {
			    'key': 'KUMvIZPPREIJDmykpEcwow',
			    'message': {
			      'from_email': 'contato@pedreira.org',
			      'to': [
			          {
			            //'email': 'jorgeants@gmail.com',
			            'email': 'contato@pedreira.org',
			            //'name': 'RECIPIENT NAME (OPTIONAL)',
			            'type': 'to'
			          }
			        ], //Vou voltar com um assunto polêmico que falamos hoje de manhã. =P Ia falar disso só amanhã 
			      'autotext': 'true',
			      'subject': 'Mensagem a partir do formulário de contato',
			      'html': bodyMsg
			    }
			  }
			 }).done(function(response) {
			   //console.log(response); // if you're into that sorta thing
			   alert("Mensagem enviada com sucesso!");
			   $("form[name='contact']")[0].reset();
			 });

		}else{

			alert("Verifique se algum campo ficou em branco. Todos os campos são obrigatórios!");

		}

	});

});
