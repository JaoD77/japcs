# Japcs

Sistema web de compra de hardware desenvolvido em PHP com banco de dados MariaDB. Projeto acadêmico que integra Banco de Dados e Programação Web.

## Funcionalidades

- Vitrine de peças e computadores.
- Cadastro de usuário e credenciais de acesso.
- Login e logout.
- Carrinho de compras mantido na sessão.
- Confirmação da compra e registro da venda.

## Estrutura do projeto

```text
japasta/
├── app/           # Configuração e função de acesso ao banco
├── css/           # Estilos da aplicação
├── img/           # Imagens dos produtos
├── index.php      # Vitrine e entrada da aplicação
├── produtos.php   # Catálogo utilizado pela vitrine
└── *.php          # Páginas e processamento de formulários
sql/
└── estrutura_banco.sql  # Estrutura e dados de exemplo
```

Os arquivos permanecem nos caminhos originais para preservar URLs, formulários e inclusões PHP.

## Organização dos fluxos

| Fluxo | Páginas | Processamento |
| --- | --- | --- |
| Cadastro | `cadastro1.php`, `cadastro2.php` | `salvar_usuario.php`, `salvar_login.php` |
| Acesso | `login.php` | `validar_login.php`, `sair.php` |
| Carrinho | `carrinho.php` | `adicionar_carrinho.php` |
| Compra | `confirmar.php`, `venda_confirmada.php` | `salvar_venda.php` |

A conexão é configurada em `japasta/app/cons.php`; a função de consulta está em `japasta/app/DLL.php`.

## Desenvolvimento local

Requisitos: PHP com a extensão `mysqli` e MariaDB. Não há dependências de Composer ou etapa de compilação.

A configuração atual usa o banco `japcs` em `localhost`, com usuário `root` e senha vazia. Essa configuração corresponde ao ambiente local de desenvolvimento.

Com um banco compatível já preparado, inicie o servidor na raiz do repositório:

```sh
php -S 127.0.0.1:8000 -t japasta
```

### Situação do esquema SQL

O arquivo `sql/estrutura_banco.sql` contém comandos `DROP TABLE`: sua importação apaga os dados das tabelas existentes. A tabela `login` se relaciona com `usuarios` por `IdUsuario`. O cadastro localiza o usuário pelo CPF e grava seu ID; o login usa esse ID para recuperar os dados do usuário.

O catálogo exibido na vitrine está em `japasta/produtos.php`; o carrinho é mantido na sessão PHP.

## Verificação de sintaxe

Na raiz do repositório, em um terminal com PHP disponível:

```sh
find japasta -name '*.php' -print0 | xargs -0 -n1 php -l
```

O repositório ainda não contém uma suíte automatizada. Para validar o comportamento, confira vitrine, cadastro, login, carrinho e confirmação de compra com um banco compatível.

## Modelagem do banco

### Modelo entidade relacionamento conceitual:

<img width="923" height="762" alt="Captura de tela 2026-09-19 010513" src="https://github.com/user-attachments/assets/58aa17f2-4444-468d-a7b5-3db52329bf46" />

### Modelo logico:

<img width="917" height="622" alt="Captura de tela 2026-09-19 010535" src="https://github.com/user-attachments/assets/bb2e9e6f-cbfd-4ab9-94fa-3292562a3547" />

