# Sistema de Gestão - Grupos Econômicos

Este projeto é um sistema de gestão para grupos econômicos, com gerenciamento de bandeiras, unidades e colaboradores.
Desenvolvido em Laravel 12 com MySQL, utilizando Livewire para frontend dinâmico, Jobs para filas e TailwindCSS para estilização

# Requisitos

PHP 8.2 ou superior,
Composer,
Node.js e npm,
Docker (para Laravel Sail),
MySQL 

# Instalação

1. Clone o repositório
`git clone https://github.com/Murilo1501/Voch.git`

2. Acesse o diretório
`cd diretorio  `
3. Copiar arquivo .env.example
`cp .env.example .env`

4. Configure as variáveis do banco de dados no arquivo .env

Configure as variáveis do banco MySQL
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario/root
DB_PASSWORD=senha/vazio
```
5. Instalar pacotes via composer:
   `composer install `

6. Instalar pacotes javaScript:
   `npm install`

7. Inicialize o ambiente 

`./vendor/bin/sail up -d `

8. Gerar chave da aplicacao 
`./vendor/bin/sail artisan key:generate`


9. Gerar estrutura do banco de dados 

`./vendor/bin/sail artisan migrate `

10. Compile os assets (Tailwind CSS, JS)
Abra um terminal e rode:

`npm run dev`

11.Rodar filas de jobs 

`./vendor/bin/sail artisan storage:link`

`./vendor/bin/sail artisan queue:work`

12. Acessar aplicação
`localhost/login`
