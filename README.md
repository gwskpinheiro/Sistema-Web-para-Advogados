🧑‍⚖️ Sistema Web para Escritório de Advocacia

Sistema completo de gestão jurídica desenvolvido para escritórios de advocacia. Permite o cadastro e controle de clientes, casos, processos, atividades e agenda colaborativa, oferecendo organização, produtividade e visão estratégica para os advogados.
🗂️ Sumário

    📌 Funcionalidades

    🛠 Tecnologias Utilizadas

    ⚙️ Instalação e Execução

    🧪 Casos de Uso Implementados

    🧬 Modelagem de Dados

    🚀 Funcionalidades Extras

    🧑‍💻 Autores

📌 Funcionalidades

✅ Cadastro de advogados com autenticação e controle de acesso
✅ Cadastro e gerenciamento de clientes
✅ Registro e acompanhamento de casos vinculados aos clientes
✅ Gerenciamento de processos judiciais com numeração única
✅ Agenda colaborativa entre advogados com filtros e visualização por dia
✅ Inserção de comentários por atividade/evento (comunicação interna)
✅ Gráficos com análise de casos e processos por cliente
✅ Design responsivo e interface refinada para uso profissional
🛠 Tecnologias Utilizadas

    PHP 8+ / Laravel 10

    MySQL – Banco de dados relacional

    Blade + Bootstrap 5 – Templates e layout responsivo

    Chart.js – Gráficos interativos

    Laravel Breeze – Autenticação leve e rápida

    Form Requests – Validações robustas

    Middleware personalizado – Controle de acesso

    SoftDeletes + timestamps – Auditoria e exclusão lógica

    Seeders e Migrations – Popular dados e estruturar banco

⚙️ Instalação e Execução

# 1. Clonar o repositório
git clone https://github.com/gwskpinheiro/Sistema-Web-para-Advogados.git
cd sistema-advocacia

# 2. Instalar dependências PHP e JS
composer install
npm install && npm run dev

# 3. Copiar o arquivo de ambiente e configurar
cp .env.example .env
# Edite o .env com as informações do seu banco de dados

# 4. Gerar chave da aplicação
php artisan key:generate

# 5. Rodar migrations e seeders
php artisan migrate --seed

# 6. Iniciar o servidor de desenvolvimento
php artisan serve

🧪 Casos de Uso Implementados
Caso de Uso	Descrição
Login/Registro de Advogados	Autenticação com controle de permissões e sessões
Gerenciar Clientes	CRUD com filtros, busca e validações
Gerenciar Casos	Casos vinculados a clientes, com título, status e descrição
Gerenciar Processos	Processos jurídicos com número, status e vínculo com cliente
Agenda do Escritório	Criação, visualização e filtro de compromissos por data, tipo e autor
Comentários em Atividades	Comunicação interna por evento/atividade
Gráfico por Cliente	Dashboard com gráficos de distribuição de casos e processos

🧬 Modelagem de Dados

    User (Advogado) – Com autenticação, permissões e agenda

    Cliente – Nome, contato e histórico de casos/processos

    Caso – Relacionado a um cliente (1:N)

    Processo – Relacionado a um cliente (1:N)

    Atividade – Data, título, responsável e tipo (evento/tarefa)

    Comentário – Ligado a uma atividade, com autor e conteúdo

Relacionamentos:
✔️ 1:1 e 1:N
✔️ SoftDeletes e Timestamps automáticos
✔️ Integridade garantida via foreign keys
🚀 Funcionalidades Extras

    🔄 Filtros dinâmicos na agenda (por tipo, status, responsável)

    📊 Gráficos interativos com Chart.js 

    💬 Comentários internos nas atividades

    🎨 Design profissional e responsivo com identidade visual jurídica

    👤 Controle de autoria e acompanhamento de designações

🧑‍💻 Autores

Desenvolvido por Gustavo Pinheiro
Disciplina: Desenvolvimento Web II
Professor: Luiz Efigênio
Instituto Federal do Paraná – Campus Paranaguá
