# Configuração do projeto
Instalação e configurações inciais do Painel de senhas em Laravel.

## 1 - Instalação do Laravel
Instalação do Laravel via Composer.
```
composer create-project laravel/laravel painel_senhas

ou

git clone https://github.com/danielbonatti/painel-senhas.git
```

## 2 - Editar .env
Altere o o arquivo .env, mas se o projeto foi clonado do repositório github copie/duplique o arquivo .env.example para .env (cp .env.example .env) e em seguida altere as credencias para conexão com o banco de dados. O arquivo .env fica na raiz da estrutura de pastas. 
```
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

## 3 - Instale as dependências do Laravel
```
composer install
```

## 4 - Gere a chave da aplicação/Laravel
```
php artisan key:generate
```

## 5 – Inserir registro(s) na tabela de setores
```
sudo mysql -u root -p

use painel_db;

insert into setores (codigo,espsim) values ('600148','C. CIRURGICO'),('600385','PEDIATRIA'),('600423','CLIN. MEDICA'),('600431','ALA B');

exit;
```

## 6 - Criar a(s) tabela(s) no banco de dados
```
php artisan migrate
```

## 7 - Reiniciar a vmbox se necessário
Se o Laravel exibir erros de conexão com o banco de dados tente reiniciar a maquina virtual, pois um período de ociosidade na vm pode cortar a conexão com a internet. 

## 8 - Rodar a aplicação 
Executar o comando abaixo na raiz do diretório do projeto criado.
```
php artisan serve
```
