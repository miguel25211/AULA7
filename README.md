# 🚀 Aula 7 - Projeto MVC em PHP

Projeto desenvolvido durante as aulas de PHP utilizando a arquitetura **MVC**, **PDO**, **MySQL** e **Composer**.

---

## 🛠️ Tecnologias

- 🐘 PHP 8.2+
- 🗄️ MySQL
- 🔌 PDO
- 📦 Composer
- 🏗️ MVC
- 🔄 PSR-4 Autoload

---

## 📁 Estrutura do projeto

```text
aula7/
├── public/
│   ├── index.php
│   ├── layout.php
│   ├── footer.php
│   └── teste.php
│
├── src/
│   ├── Config/
│   ├── Controller/
│   │   └── HomeController.php
│   ├── DAO/
│   ├── Model/
│   ├── View/
│   └── Database.php
│
├── vendor/
├── composer.json
├── composer.lock
├── bkp.cmd
└── README.md
```

---

## 🏗️ Arquitetura MVC

```text
Navegador
    |
    v
public/index.php
    |
    v
Controller
    |
    v
Model
    |
    v
Database / MySQL
    |
    v
View
    |
    v
Navegador
```

---

## 🗄️ Banco de dados

Banco utilizado: **aula6**

A conexão com o banco de dados utiliza **PDO**.

---

## 📦 Composer

O projeto utiliza Composer para gerenciamento de dependências e autoload PSR-4.

```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}
```

Para atualizar o autoload:

```bash
composer dump-autoload
```

---

## ▶️ Executando o projeto

Instale as dependências:

```bash
composer install
```

Inicie o servidor PHP:

```bash
php -S localhost:8000 -t public
```

Acesse:

http://localhost:8000

---

## 📚 Conteúdo estudado

- [x] Estrutura MVC
- [x] Composer
- [x] PSR-4
- [x] Namespaces
- [x] PDO
- [x] MySQL
- [x] Conexão com banco de dados
- [x] Controllers
- [x] Models
- [ ] DAO
- [ ] CRUD

---

## 🔗 Repositório

https://github.com/miguel25211/aulagit

---

## 👨‍💻 Projeto de estudos

Projeto desenvolvido para praticar **PHP**, **MVC**, **MySQL**, **PDO** e **Composer**.

🚀 Aula 7
