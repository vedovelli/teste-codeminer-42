Codeminer42 - Admission Test
============================

##Instruções de instalação

* Clonar o repositório: `git clone git@github.com:vedovelli/teste-codeminer-42`
* Acessar a pasta do projeto `cd teste-codeminer-42`
* `composer install`
* Acessar a pasta /public `cd public`
* `bower install` instalará dependências do frontend (apenas Bootstrap). Necessário ter o bower instalado
* Retornar à pasta principal `cd ../`
* Editar o `bootstrap/start.php` e adicionar o hostname de sua máquina na linha 29, substituindo o valor ved
* Editar o `config/local/database.php` e adicionar as credenciais de acesso ao banco de dados. Criar o banco se necessário.
* A partir da pasta raiz do proejeto, rodar `php artisan migrate` para gerar a estrutura do banco de dados
* Iniciar o listener para Queue `php artisan queue:listen`. A configuração do serviço iron.io está em `/config/queue.php`
* Em nova janela do terminal, iniciar o server `php artisan serve`
* No browser, acessar http://localhost:8000 e o sistema deverá estar pronto para uso. A planilha pronta para importação se encontra em `/public/assets/import`