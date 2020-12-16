# 💻 Gerenciador de finanças pessoais com PHP OO
>Sistema para controle de finanças pessoais, com gerenciamento de usuários,
>controle de conta a receber e a pagar, gráfico com demonstrativo dos gastos
>pagos e recebidos do usuário.

## Requisitos

 - PHP >= 7.1
 - MySQL >= 5.7
 - Composer

 ## O que foi utilizado?

 - Phinx
 - Migrations
 - Seeds
 - Faker
 - Pimple
 - Aura Router
 - Zend diactoros
 - Twig
 - Illuminate Laravel (Eloquent ORM)
 - Jasny Auth
 - Dotenv
 - PHPCodeSniffer

 #### Clone repositório
````
git clone https://github.com/ThalesA/Financas.git
````
Para baixar o zip: https://github.com/ThalesA/Financas/archive/master.zip

## Executando a aplicação

#### Na raiz do projeto, execute os comandos:
````
composer install
````
````
vendor/bin/phinx migrate
````
````
vendor/bin/phinx migrate ou php migrate-seed.php
````
#### Executar projeto no localhost
````
php -S localhost:8080 -t public public/index.php
````
````
Para acesso o sistema, use as seguintes credencias
Login: admin@user.com
Senha: 123456
````
## 📝 Licença
Esse projeto está sob a licença MIT. Veja aqui [MIT](LICENSE)
