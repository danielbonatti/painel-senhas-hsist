# Processo para habilitar o Git no Ubuntu
Processo necessário para subir commits no Github pelo Ubuntu

## 1 - Github
Acesse as seguintes opções:
```
 Settings -> <> Developer settings -> Personal access tokens -> Tokens (classic) -> Generate new token
```
Ao final marque todas as opções e clique em gerar, copie a chave/token, pois ela será utilizada no parte a seguir.

## 2 - Terminal
Ao executar o comando "git push origin main", por exemplo, será solicitado a identificação do usuário no github e em seguida o password, é nessa hora que a chave/token deve ser colado.
