# Desafio-Tecnico
Neste desafio você deve criar uma pequena aplicação para facilitar o gerenciamento de
horários de uma clínica! Ela deve satisfazer as seguintes necessidades:
 Cadastrar regras de horários para atendimento
 Apagar regra de horário para atendimento
 Listar regras de horários para atendimento
 Listar horários disponíveis dentro de um intervalo
Features
Cadastro de regra de atendimento
O cadastro de regras de horário para atendimento deve possibilitar que se disponibilize
intervalos de horário para consulta, possibilitando regras para:
 Um dia especifico, por exemplo: estará disponível para atender dia 25/01/2021 nos
intervalos de 9:30 até 10:20 e de 10:30 até as 11:00
 Diariamente, por exemplo: estará disponível para atender todos os dias das 9:30 até
as 10:10
 Semanalmente, por exemplo: estará disponível para atender todas segundas e
quartas das 14:00 até as 14:30
Apagar regra
Esta feature deve ser capaz de apagar uma regra específica criada pela ferramenta
descrita em "Cadastro de regra de atendimento".
Listar regras
A ferramenta de listar deve exibir todas as regras de atendimento criadas pela feature
descrita em "Cadastro de regra de atendimento".
Horários disponíveis
Esta função deve exibir os horários disponíveis, baseado nas regras criadas anteriormente,
considerando um intervalo de datas informadas. O retorno deve seguir o formato
exemplificado abaixo. Por exemplo, se o intervalo solicitado for 25/01/2021 e 29/01/2021
teremos o seguinte modelo de resultado:
Dia: 25/01/2021
Horários: Das 14:00 às 15:00, Das 15:10 às 15:30
Dia: 26/01/2021
Horários: Das 14:00 às 15:00
Dia: 29/01/2021
Horários: Das 09:00 às 12:00, Das 14:00 às 15:00,
Frontend
O candidato pode optar por montar a interface da aplicação com CSS próprio ou utilizar
bibliotecas prontas como Bootstrap, Materialize, PureCss, Skeleton, etc.
Requisitos
A entrega deverá ser realizada via GitHub. O candidato deverá criar um repositório no
GitHub para realizar a entrega do projeto (enviar o link ao final do desenvolvimento).
É necessário persistir as informações em alguma base de dados, de preferência MySql ou
SQLite. Sendo necessário nos enviar o schema do seu banco junto com o código fonte.
Se você fizer será um diferencial
 Utilizar Laravel
 Validar cadastro de regras para evitar conflito de horários
Análise
Serão avaliados os seguintes pontos:
1 Solução do problema proposto
2 Usabilidade
3 Legibilidade do código
