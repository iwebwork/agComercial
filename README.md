Sistema
 - Precisa ser feito uma ficha cadastral com todas as informações do proprietario e seu animal de estimação: OK
 - Fazer uma busca pelo CPF - OK
- Fazer uma busca pelo nome - OK
 - busca pelo nome e ordem alfabetica: OK
 - Deletar o dono: OK
 - Deletar o pet: OK
 -Alterar o dono: OK
 -Alterar o pet: OK
 OBS: - Não ter limites de informações adicionais do pet.: OK

 - fazer um formulario para preenchimento de informações, com opção de impressão.
 - O calendario será usado para avisar sobre as vacinas e eventos de banho e tosa.
 	OBS: O sistema deve avisar a cliente sobre os eventos de antemão, assim ela terá um controle maior.


Dados do pets: OK
	id_pet , nome_pet, especie,raça, sexo, idade, peso, informações_add, id_proprietario,

Dados dos proprietario: OK
	id_propri, CPF, Nome_propri, pais, estado,cidade, rua, numero , e tel

Dados das vacinas:
	id_vaci, id_pet, data_vaci, hora_vaci, informacoes_add_vaci

Dados banho e tosa
	id_bt, id_pet, data_bt, hora_bt, informacoe_add_bt

Dados dos Eventos
id_evento, titulo, color (Se for: 1 = Vacina. 2 = Banho e tosa), dia/mes/ano hora_inicio,dia/mes/ano hora_termino(Opcional), info_add,
status(0 = aberto, 1 = finalizado) ,pet

Agenda
- Eventos
	Tipo: 1 = Todo o dia , 2 = Longo, comum, 3 = Repetitivo
	Se o evento tiver so data ele pertence ao dia todo, todo_dia = 1

	Todo o dia
		- Titulo
		- Data

	Longo, comum
		- Titulo
		- Data de inicio
		-Data de termino

	Repetitivo
		- idEventoRepetitivo
		- Titulo
		- Data e hora de termino



- 18/11/2018 Projeto preparado, banco de dados pronto, falta implementar com php a inserção,remoção e alteração de dados no banco.
- 06/12/2018 - retorno de dados do banco de dados funcionando perfeitamente, agora e fazer a inserção de eventos.
- 07/12/2018 - Site organizado com sucesso, foi ajustado o calendario, proximo passo, inserir os eventos usando o modal criado.
- 10/12/2018 - Tudo funcionou, e preciso agora organizar a função insert na classe.
- 11/12/2018 - mudança de planos, agora foi finalizado o login de usuario, proximo passo e o cadastro de clientes.
- 13/12/2018 - Tabela do proprietario pronta
- Criação do banco finalizado, proximo passo, imprementar a inserção de clientes, logo em seguida, o seus pets.
- 05/01/2019 - A inserção no banco não esta funcionando utilizando as funções gets, talvez usarei outro metodo
- 08/01/2019 - O cadastro de pets e proprietario está completo.
- 13/01/2019 - Finalizado toda a parte de cadaastro, busca, ficha dos pets e proprietarios, proxima parte e cuidar da aparencia.
- 18/01/2019 - Busca por nome finalizada e corrigido os bugs, aparencia tambem melhorada, agora e vazer ajuste no menu.
- 23/01/2019 - Busca por ordem alfabetica finalizada, e busca pelo nome melhorada, agora a cliente pode digitar apenas uma letra que ja busca todos os proprietarios que possuem aquela letra, tambem pode digitar somente uma silaba ou mais caso não saiba o nome todo do cliente.
- 25/01/2019 - O delete do proprietario e pet foi concluido com sucesso.
- 28/01/2019 - Update do proprietario foi finalizado.
- 28/01/2019 - Updade do pet foi finalizado.
- 28/01/2019 - Foi testado no servidor, e esta funcionando sem problemas, e todas as atualizações ja estão no servidor externo.
- 04/02/2019 - Banco de dados atualizado, agora com o novo campo "raca" do tipo varchar.
- 04/02/2019 - O tipo de dados do campo info_add da tabela pets foi alterado para LONGTEXT para ser virtualmente infinito.
- 05/02/2019 - Adicionar um novo pet para o proprietario finalizado em todos os tipos de buscas.
- 05/02/2019 - Melhora concluida na exibição das informações adicionais do pet.
			   Proximo passo conversar com a marli sobre a parte de eventos.

- 08/04/2019 - Base para a ficha finalizada.
- 12/04/2019 - Listagem de eventos do pet finalizado.
- 12/04/2019 - Encerrar o evento finalizado.
- 14/05/2019 - Filtro de eventos encerrado, lista todos os eventos abertos, fechados e ambos.

PROXIMOS PASSOS
- Fazer para a cliente ter total controle do cliente: doses de vacinas e vernifugo:
- Controle de caixa: Olhar para ver quanto vai ficar mais completo: 
- Enviar o aviso tb por email para o cliente: OK
- Alterar info adcionais para: Historico clinico do animal: OK
