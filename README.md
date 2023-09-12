# WordPress Challenge
Este repositório contém um tema WordPress personalizado, desenvolvido como parte do processo seletivo para a vaga de WordPress Senior Engineer na Bliss Application. O tema inclui funcionalidades como uma página de pesquisa otimizada, listagem de eventos e design responsivo.

# Requisitos Funcionais

Elaborei este projeto seguindo os requisitos funcionais fornecidos pela Bliss Aplication, conforme especificado no arquivo PDF anexo. As ações realizadas foram:

1 - Criei uma homepage que inclui cabeçalho, hero (background), rodapé e dois blocos editáveis via Gutenberg.

2 - Desenvolvi um bloco com um slider completamente editável pelo backoffice.

3 - Implementei um bloco que apresenta título, descrição e uma lista de 6 artigos, todos personalizáveis. Cada artigo inclui uma imagem, um título, um resumo (com limite de 20 palavras) e um botão de acesso.

4 - Tornei possível a leitura completa dos artigos ao clicar neles.

5 - Incluí um item no menu superior que leva à página de pesquisa, que apresenta tanto a lista de artigos quanto um campo de pesquisa. Isso otimizou o código e evitou a necessidade de plugins adicionais.

6 - Criei um tipo de postagem personalizado para eventos, com sua própria página de arquivo e opções de configuração para determinar a quantidade de eventos exibidos.

No primeiro momento, o foco foi atender aos requisitos funcionais. Como o prazo de entrega não foi discutido, e admito que não o questionei, minha atenção foi voltada para garantir que todas as funcionalidades estivessem em ordem. Com mais tempo, meu objetivo seria aprimorar a estética e a organização do tema.

# Requisitos Técnicos

Para a realização deste projeto, segui cuidadosamente as diretrizes técnicas fornecidas, garantindo uma implementação eficaz e otimizada. As ações principais realizadas foram:

1 - Optei pela utilização de apenas dois plugins, mantendo o projeto enxuto e funcional.
2 - Utilizei o plugin ACF para agregar mais flexibilidade aos campos do backoffice e o All-in-One WP Migration para garantir a segurança através de backups regulares.
3 - Assegurei que o tema fosse completamente responsivo, adaptando-se a diversos tamanhos de tela.
4 - Escolhi o Bootstrap 5 como meu framework de UI, para um layout mais moderno e eficiente.
5 - Incluí comentários no código para esclarecer as funções das linhas que considero mais relevantes para o entendimento da estrutura do tema.

# Tecnologias Utilizadas

Abaixo estão as tecnologias e ferramentas que utilizei:

1 - Wamp: Essencial para simular um ambiente de servidor local e gerenciar o banco de dados.
2 - WordPress: Escolhido como o CMS para estruturar e gerenciar o conteúdo.
3 - ACF (Advanced Custom Fields): Utilizado para criar campos personalizados, adicionando mais flexibilidade ao backoffice.
4 - All In One WP Migration: Imprescindível para realizar backups de segurança e garantir a integridade do projeto.
5 - VS Code: Foi minha escolha como editor de código para manipular os arquivos PHP.
6 - PHP 7.4.33: A linguagem nativa do WordPress e a espinha dorsal do projeto.
7 - ChatGPT: Um recurso valioso que me auxiliou nas dúvidas, depuração de código e otimização de tempo.
8 - Leonardo AI: Utilizado para gerar as imagens s eventos e artigos.
9 - Bootstrap 5: A escolha para o framework de UI, responsável pela elaboração do layout e por assegurar sua responsividade.

# Passo a Passo para Instalação do Tema WordPress

Pré-requisitos:

Ter o WAMP ou um software similar instalado no seu computador.
Um arquivo de backup recente do projeto disponível no repositório Git.
Instruções:

Iniciar Servidor Local:

Abra o WAMP (ou software similar) para criar um servidor local no seu computador.
Criação do Banco de Dados:

É necessário criar um novo banco de dados, mesmo que ele seja substituído posteriormente. Esta etapa é obrigatória para a instalação do WordPress.
Instalação do WordPress:

Faça o download e instale o WordPress seguindo o tradicional passo a passo de 5 minutos.
Instalação do Plugin All-in-One WP Migration:

Após instalar o WordPress, instale o plugin All-in-One WP Migration pelo painel administrativo.
Configuração do php.ini:

Antes de prosseguir, verifique se o limite de upload está configurado para mais de 50MB no arquivo php.ini. Se necessário, ajuste esse valor.
Upload do Arquivo de Backup:

Faça o upload do arquivo zipado de backup localhost-wptheme-20230912-193835-el4ydd.wpress usando o plugin All-in-One WP Migration.
Finalização e Acesso:

Ao concluir o upload, saia do painel administrativo e efetue o login novamente utilizando as seguintes credenciais:
Usuário: teste.bliss
Senha: 123mudar456