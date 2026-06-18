# 🍽️ Buffet Premium - Sistema de Gerenciamento

Sistema web desenvolvido em **Laravel** para gerenciamento completo de um buffet de eventos.

O projeto possui uma área pública para clientes e um painel administrativo para controle de todo conteúdo do site.

---

# 🚀 Tecnologias

* PHP 8+
* Laravel 11
* MySQL
* Blade
* Bootstrap 5
* Font Awesome
* HTML5
* CSS3
* JavaScript

---

# 📌 Funcionalidades

## Área do Cliente

O visitante pode acessar:

### Página inicial

* Apresentação do buffet
* Serviços
* Destaques
* Chamadas para orçamento

---

## Eventos

Página dinâmica gerenciada pelo administrador.

Possui:

* Título principal
* Subtítulo
* Casamentos
* Aniversários
* Formaturas
* Eventos corporativos
* Galeria de imagens
* Diferenciais
* Chamada final

Todos os textos podem ser alterados pelo painel administrativo.

---

## Galeria

Sistema de imagens:

* Cadastro de imagens
* Título
* Descrição
* Visualização em cards
* Exclusão de imagens

---

## Reservas

Clientes podem solicitar eventos.

Fluxo:

```
Cliente
   ↓
Cadastro da reserva
   ↓
Painel Administrativo
   ↓
Análise do evento
   ↓
Atualização do status
```

---

# 🔐 Painel Administrativo

Área restrita:

```
/admin/dashboard
```

---

## Recursos do Admin

### Cardápio

Gerenciamento:

* Nome
* Descrição
* Categoria
* Preço
* Imagem
* Estoque

---

### Categorias

CRUD completo:

* Criar
* Editar
* Excluir

---

### Eventos

Controle dos eventos recebidos:

* Dados do cliente
* Data
* Valor
* Observações
* Status

---

### Página Eventos

Gerenciamento da página:

Tabela:

```
pagina_eventos
```

Campos:

```
titulo
subtitulo

casamento_titulo
casamento_texto

aniversario_titulo
aniversario_texto

formatura_titulo
formatura_texto

corporativo_titulo
corporativo_texto

galeria_titulo
galeria_descricao

foto1
foto2
foto3
foto4

diferenciais_titulo

diferencial_1
diferencial_2
diferencial_3
diferencial_4

cta_titulo
cta_texto
cta_botao
```

---

# 🖼️ Imagens

As imagens utilizam o sistema padrão do Laravel Storage.

Criar link:

```bash
php artisan storage:link
```

Diretório:

```
storage/app/public
```

---

# ⚙️ Instalação

## 1 - Instalar dependências

```bash
composer install
```

---

## 2 - Configurar ambiente

Copiar:

```bash
cp .env.example .env
```

Gerar chave:

```bash
php artisan key:generate
```

---

# Banco de dados

Editar:

```
.env
```

Exemplo:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=buffet
DB_USERNAME=root
DB_PASSWORD=
```

---

Criar tabelas:

```bash
php artisan migrate
```

---

Popular dados:

```bash
php artisan db:seed
```

Seeders:

```
PaginaEventoSeeder
```

---

# Criar usuário administrador

Exemplo:

```php
User::create([
'name'=>'Administrador',
'email'=>'admin@email.com',
'password'=>bcrypt('123456'),
'admin'=>1
]);
```

---

# Executar projeto

```bash
php artisan serve
```

Acessar: http://127.0.0.1:8000
```

# Rotas principais

## Públicas

```
/
 
/eventos

/galeria

/reservas

/cardapio
```

---

## Administrativas

```
/admin/dashboard

/admin/categorias

/admin/eventos

/admin/galerias

/admin/configuracoes

/admin/pagina-eventos
```

---
# Estrutura do projeto

```
app

 ├── Models

 └── Http
      └── Controllers


resources

 ├── views

 │    ├── admin

 │    └── layouts


database

 ├── migrations

 └── seeders


routes

 └── web.php
```

---

# Limpeza de cache

Quando alterar arquivos:

```bash
php artisan optimize:clear
```

---

# Problemas comuns

## Imagem não aparece

Executar:

```bash
php artisan storage:link
```

---
## Erro de migration

Recriar banco:

```bash
php artisan migrate:fresh --seed
```
⚠️ Apaga os dados existentes.

---
# Desenvolvimento

Servidor:

```bash
php artisan serve
```

Logs:

```
storage/logs
```

---

# Projeto

Sistema desenvolvido para gerenciamento profissional de buffet.

Laravel + Bootstrap + Painel Administrativo.
