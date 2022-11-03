# Configurações especiais no projeto Laravel para rodar nos servidores Hsist
Ajustes e configuarações necessárias para rodar o projeto nos servidores Hsist. Com execeção do CRON e do Supervisord (config. para automatizar a inicialização do projeto) os demais detalhes são necessários por conta da configuração do Apache. 

## 1 - Raiz do projeto
Arquivo .htaccess e index.php

## 2 - Diretório public
Arquivo .htacess

## 3 - Assets
Incluir o diretório "public" (public/...) no ínicio da URL, exemplo: {{ asset('public/css/app.css') }}

## 4 - Diretório file
Criar esse diretório na raiz do projeto e incluir o arquivo .conf para ser utilizado na configuração do Supervisord.

## 5 - .env
Gerar o .env (config com o DB) copiando o .env.example, pois já está configurado para as bases Hsist.