# Sistema de Gestão - Grupos Econômicos

Este projeto é um sistema de gestão para grupos econômicos, com gerenciamento de bandeiras, unidades e colaboradores.
Desenvolvido em Laravel 12 com MySQL, utilizando Livewire para frontend dinâmico, Jobs para filas e TailwindCSS para estilização

# Requisitos

PHP 8.1 ou superior
Composer
Node.js e npm
Docker (para Laravel Sail)
MySQL 

# Instalação

1. Clone o repositório
`git clone https://github.com/seu-usuario/seu-repositorio.git`

2. Instale as dependências PHP via Composer
`composer install`
3. Instale as dependências JS via npm
`npm install`

4. Configure o arquivo .env

Configure as variáveis do banco MySQL
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```
5. Laravel Sail (Docker):

6. Inicialize o ambiente

`./vendor/bin/sail up -d `

7. Execute as migrations 

`./vendor/bin/sail artisan migrate `

8. Compile os assets (Tailwind CSS, JS)
Abra um terminal e rode:

`npm run dev`

9.Configure o arquivo .env para a conexao das filas de job

`QUEUE_CONNECTION=database`

10.abra um terminal e rode a fila de jobs 

`./vendor/bin/sail artisan queue:work`

11. abre um terminal e conecte a pasta storage com a pasta com a pasta public

`./vendor/bin/sail artisan storage:link`
