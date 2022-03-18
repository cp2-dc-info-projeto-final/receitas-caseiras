# Documento de Casos de Uso

## Lista dos Casos de Uso

 - [CDU 01](#CDU-01): Cadastrar usuário.
 - [CDU 02](#CDU-02): Efetuar Login.
 - [CDU 03](#CDU-03): Exibir timeline.
 - [CDU 04](#CDU-04): Realizar busca por usuário.
 - [CDU 05](#CDU-05): Criar postagem. 
 - [CDU 07](#CDU-06): Curtir a postagem.
 - [CDU 08](#CDU-07): Curtir comentário da postagem.
 - [CDU 09](#CDU-08): Alterar cadastro.
 - [CDU 10](#CDU-09): Alterar postagem.
 - [CDU 11](#CDU-10): Alterar comentário.
 - [CDU 12](#CDU-11): Excluir postagem.
 - [CDU 13](#CDU-12): Excluir comentário.
 - [CDU 14](#CDU-13): Excluir cadastro.


## Lista dos Atores

 - Usuário.
 - Administrador.

## Diagrama de Casos de Uso

![diagrama de casos de uso](diagrama-casos.png)


## Descrição dos Casos de Uso

### CDU 01

Cadastrar Usuarios 

**Fluxo Principal**
 
1.	 O sistema apresenta um formulario com os campos nescessarios para se realizar o cadastro
 
2.	 O usuário insere nome,email, senha e um campo aonde se deve confirmar a senha

3.	 O usuário aperta no botão "Cadastrar"

4.	 O sistema armazena o usuário e redireciona o usuário a página de login 

	 


**Fluxo Alternativo A**

1.	 O sistema apresenta um formulario com os campos nescessarios para se realizar o cadastro
 
2.	 O usuário insere nome,email, senha e um campo aonde se deve confirmar a senha

3.	 O usuário aperta no botão "Cadastrar"

4. 	 O sistema informa que o campo nome não é válido

5. 	 O usuário corrige o nome e clica no botão "Inserir"

6.	 O sistema armazena o usuário e redireciona o usuário a página de login





**Fluxo Alternativo B**

1.	 O sistema apresenta um formulario com os campos nescessarios para se realizar o cadastro
 
2.	 O usuário insere nome,email, senha e um campo aonde se deve confirmar a senha

3.	 O usuário aperta no botão "Cadastrar"

4. 	 O sistema informa que o e-mail usado já foi cadastrado 

5. 	 O usuário insere um e-mail que não foi usado previamente e clica no botão "Inserir"

6.	 O sistema armazena o usuário e redireciona o usuário a página de login 

### CDU 02

Efetuar o login

**Fluxo Principal**

1.	O sistema apresenta um formulario com os campos email e senha

2.	O usuário acrescenta o e-mail e senha e clica no botão "Login"
	
3.	O sistema valida o email e a senha do usuário

4.	O sistema encaminha o usuário para o perfil.

**Fluxo Alternativo A**

1.	O sistema apresenta um formulario com os campos email e senha

2.	O usuário acrescenta o e-mail e senha e clica no botão "Login"

3.	O sistema informa que o e-mail está incorreto
	
4.	O usuário corrige o e-mail e clica no botão "Login"

5.	O sistema encaminha o usuário para o perfil.


**Fluxo Alternativo B**

1.	O sistema apresenta um formulario com os campos email e senha

2.	O usuário acrescenta o e-mail e senha e clica no botão "Login"

3.	O sistema informa que a senha está incorreta
	
4.	O usuário corrige a senha e clica no botão "Login"

5.	O sistema encaminha o usuário para o perfil.

**Fluxo Alternativo C**

1. 	O sistema apresenta um formulário com os campos login e senha
	
2. 	O usuário clica no botão “Cadastrar”
  	
3. 	O usuário informa nome, e-mail, senha e confirmar a senha através de um formulário e clica em “Cadastrar”

4. 	O sistema armazena o usuário e redireciona o usuário a página de login 

5. 	O sistema retorna ao inicio do caso de uso para incluir o novo usuário


### CDU 03

Exibir timeline do usuário

**Fluxo Principal**

1.	O usuário efetua o login 

2.	O sistema encaminha o usuario para seu perfil

3.	O sistema apresenta a timeline do usuário com as ultimas postagem e comentarios feitos pelo usuário e quem ele segue

**Fluxo Alternativo A**

1.	O usuário efetua o login 

2.	O sistema informa que as informações login e a senha não coincidem

3.	O usuário corrige as informações de login e senha e clica no botão "Entrar"

4.	O sistema encaminha o usuario para seu perfil

5.	O sistema apresenta a timeline do usuário com as ultimas postagem e comentarios feitos pelo usuário e quem ele segue



### CDU 04

Realizar Busca por usuários 

**Fluxo Principal**

1.	O sistema apresenta uma barra de busca aonde o usuário insere o nome desejado

2.	O usuário insere o nome da pessoa que ela deseja encontrar e apertar o botão de busca
	
3.	O sistema redireciona o usuário a uma página a todos os usuários com o nome semelhante ao buscado


**Fluxo Alternativo A**

1.	O sistema apresenta uma barra de busca aonde o usuário insere o nome desejado

2.	O usuário insere o nome da pessoa que ela deseja encontrar e apertar o botão de busca
	
3.	O sistema informa que não existe um nome semelhante ao inserido

4.	O usuário insere um nome valido para a buscar



### CDU 05

Realizar postagem 

**Fluxo Principal**

1.	O sistema apresenta um campo aonde deve ser adicionado uma foto e outro aonde deve ser adicionada a legenda da imagem

2.	O usuário faz upload de uma imagem 

3.	O usuário pode adicionar uma legenda na sua imagem

4.	O usuário clica no botão "publicar"

5.	O sistema salva e exibe a postagem na timeline


**Fluxo Alternativo A**


1.	O sistema apresenta um campo aonde deve ser adicionado uma foto e outro aonde deve ser adicionada a legenda da imagem

2.	O usuário faz upload de uma imagem 

3.	O usuário pode adicionar uma legenda na sua imagem

4.	O usuário clica no botão "publicar"

5.	O sistema informa que a imagem não é de uma extensão valida 

6.	O usuário faz upload de uma imagem em uma extensão valida

7.	O sistema salva e exibe a postagem na timeline


### CDU 06

Comentar na postagem 

**Fluxo Principal**

1.	O sistema apresenta uma barra aonde pode ser escrito um texto
	
2.	O usuário escreve um texto e,em seguida clicar no botão "enviar"
	
3.	O sistema salva e exibe o comentario na timeline


### CDU 07

Curtir a postagem

**Fluxo Principal**

1.	O usuário clica no ícone de "coração", presente na postagem que ele deseja curtir

2.	O sistema armazena a curtida 

3.	A curtida aparece na postagem

### CDU 08

Curtir comentário

**Fluxo Principal**

1.	O usuário seleciona a postagem que contém o comentário que ele deseja curtir 

2.	O usuário clica no ícone de "coração", presente na comentario que ele deseja curtir

3.	O sistema armazena a curtida 

4.	A curtida aparece no comentário

### CDU 09

Alterar cadastro

**Fluxo Principal**

1.	O usuário clica no botão "eu"

2.	O usuário clica em configurações de conta 
	
3.	O sistema redireciona o usuário para a página de alteração de cadastro.

4.	O sistema apresenta um fórmulario com os campos novo nome e confirmar nome desejado
	
5.	O usuario acrescenta o novo nome em ambos os campos

6.	O usuário clica no botão "salvar alterções"

7.	O sistema salva as alterações e redireciona o usuário para o perfil



**Fluxo Alternativo A**

1.	O usuário clica no botão "eu"

2.	O usuário clica em configurações de conta 
	
3.	O sistema redireciona o usuário para a página de alteração de cadastro.

4.	O sistema apresenta um fórmulario com os campos novo nome e confirmar nome desejado
	
5.	O usuario acrescenta o novo nome em ambos os campos

6.	O usuário clica no botão "salvar alterções"

7.	O sistema informa que o nome inserido já esta em uso

8.	O usuário insere um novo nome valido
	
9.	O sistema salva as alterações e redireciona o usuário para o perfil




**Fluxo Alternativo B**

1.	O usuário clica no botão "eu"

2.	O usuário clica em configurações de conta 
	
3.	O sistema redireciona o usuário para a página de alteração de cadastro.

4.	O sistema apresenta um fórmulario com os campos novo nome e confirmar nome 
	
5.	O usuario clica no botão "alterar senha"

6.	O sistema apresenta um fórmulario com os campos nova senha e confirmar senha

7.	O usuário insere a nova senha em ambos os campos e clica no botão "salvar alterções"

8.	O sistema salva as alterações e redireciona o usuário para o perfil



**Fluxo Alternativo C**

1.	O usuário clica no botão "eu"

2.	O usuário clica em configurações de conta 
	
3.	O sistema redireciona o usuário para a página de alteração de cadastro.

4.	O sistema apresenta um fórmulario com os campos novo nome e confirmar nome 
	
5.	O usuario clica no botão "alterar senha"

6.	O sistema apresenta um fórmulario com os campos nova senha e confirmar senha

7.	O usuário insere a nova senha em ambos os campos e clica no botão "salvar alterções"

8.	O sistema informa que as senhas não coincidem

9.	O usuário corrige as informações e clica em "salvar alterações"

8.	O sistema salva as alterações e redireciona o usuário para o perfil



### CDU 10

Alterar postagem 

**Fluxo Principal**


1.	O usuário clica no botão de opções ,localizado no canto superior direito do comentário,apertar o botão "editar comentário"

2. 	O sistema encaminha o usuário para a página de edição de comentário

3.	O sitema apresenta um formulário com um campo contendo a legenda atual

4.	O usuário edita a antiga postagem e clica no botão "enviar"

5.	O sistema salva a nova postagem e a exibe no lugar da postagem anterior na timeline 


### CDU 11

Alterar comentário 

**Fluxo Principal**


1.	O usuário clica no botão de opções ,localizado no canto superior direito do comentário,apertar o botão "editar comentário"

2. 	O sistema encaminha o usuário para a página de edição de comentário

3.	O sitema apresenta um formulário com um campo contendo a legenda atual

4.	O usuário edita o antigo comentário e clica no botão "enviar"

5.	O sistema salva o novo comentário e o exibe no lugar do cometário anterior na timeline 



### CDU 12

Deletar postagem 

**Fluxo Principal**

1.	O usuário clica no botão de opções ,localizado no canto superior direito do comentário, e ele aperta o botão "excluir postagem"

2. 	O sistema exclui a postagem da timeline e do banco de dados




### CDU 13

Deletar comentário

**Fluxo Principal**

1.	O usuário clica no botão de opções ,localizado no canto superior direito do comentário, e ele aperta o botão "excluir comentário"

2. 	O sistema exclui o comentário da timeline e do banco de dados



### CDU 14

Excluir Cadastro

**Fluxo Principal**

1.	O administrador clica no botão "adm" 

2.	O sistema redireciana o adiministrador a página de adiministração

3.	O sistema apresenta uma tabela com todos os usuários presentes no banco de dados

4.	O adiminstrador clica no botão "excluir cadastro" do perfil a ser excluido

5.	O sistema exclui o usuário selecionado e salva as alterações

	

