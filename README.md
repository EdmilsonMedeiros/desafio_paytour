# 🚀 Sistema de Gestão de Candidaturas

Sistema  para gerenciamento de candidaturas, desenvolvido com Laravel, Vue.js e Bootstrap.

## 🛠 Tecnologias Utilizadas

### Backend
- **Laravel 12.X** - Framework PHP para desenvolvimento web
- **PHP 8.2** - Linguagem de programação
- **MySQL** - Banco de dados relacional
- **Laravel Mail** - Sistema de envio de emails
- **Laravel Queue** - Sistema de filas para jobs assíncronos
- **PHPUnit** - Framework de testes unitários

### Frontend
- **Vue.js 3** - Framework JavaScript reativo
- **Inertia.js** - Conecta Laravel e Vue.js sem API
- **Bootstrap 5** - Framework CSS responsivo
- **Bootstrap Icons** - Biblioteca de ícones
- **Vite** - Build tool e bundler moderno
- **Axios** - Cliente HTTP para requisições

### Ferramentas de Desenvolvimento
- **Composer** - Gerenciador de dependências PHP
- **NPM** - Gerenciador de pacotes JavaScript
- **Laravel Artisan** - Interface de linha de comando

## ✨ Funcionalidades

### 🎯 Para Candidatos
- ✅ **Formulário de Candidatura Elegante**
  - Campos: Nome, Email, Telefone, Cargo Desejado, Escolaridade, Observações
  - Upload de currículo (PDF, DOC, DOCX até 1MB)
  - Validação completa no frontend e backend
  - Interface responsiva
  - Feedback visual em tempo real

- ✅ **Experiência do Usuário**
  - Área de upload drag & drop
  - Estados de loading nos botões
  - Alertas de sucesso/erro
  - Limpeza automática do formulário após envio

### 🔐 Para Administradores
- ✅ **Sistema de Autenticação**
  - Login seguro com validação
  - Proteção de rotas administrativas
  - Interface de login

- ✅ **Dashboard Administrativo**
  - Listagem de todas as candidaturas
  - Campo de busca em tempo real
  - Paginação responsiva

### 📧 Sistema de Notificações
- ✅ **Email Automático**
  - Envio automático via queue/job
  - Template HTML responsivo
  - Dados completos do candidato
  - Informações técnicas (IP, data/hora)

### 🧪 Qualidade e Testes
- ✅ **Testes Unitários**
  - Testes para service de candidaturas
  - Mocking de storage e queue
  - Testes de validação e exceções

## 📋 Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- **PHP 8.2 ou superior**
- **Composer** (gerenciador de dependências PHP)
- **Node.js 16+ e NPM** (para assets frontend)
- **MySQL 8.0+** ou **SQLite** (banco de dados)
- **Git** (controle de versão)

### Verificação dos Pré-requisitos

```bash
# Verificar versão do PHP
php -v

# Verificar Composer
composer --version

# Verificar Node.js e NPM
node -v
npm -v
```

## 🚀 Instalação e Configuração

### 1. Clone do Repositório

```bash
# Clone o repositório
git clone https://github.com/seu-usuario/desafio_paytour.git

# Entre no diretório
cd desafio_paytour
```

### 2. Configuração do Backend (Laravel)

```bash
# Instalar dependências PHP
composer install

# Copiar arquivo de ambiente
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate
```

### 3. Configuração do Banco de Dados

Edite o arquivo `.env` com suas credenciais:

```env
# Para MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=paytour_db
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# OU para SQLite (mais simples para desenvolvimento)
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

#### Para SQLite:
```bash
# Criar arquivo do banco SQLite
touch database/database.sqlite
```

#### Para MySQL:
```bash
# Criar banco de dados
mysql -u root -p
CREATE DATABASE paytour_db;
exit;
```

### 4. Configuração de Email

Configure o envio de emails no `.env`:

```env
# Exemplo com Gmail/SMTP
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seu_email@gmail.com
MAIL_PASSWORD=sua_senha_app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=seu_email@gmail.com
MAIL_FROM_NAME="Paytour Carreiras"
```

### 5. Executar Migrações

```bash
# Executar migrações do banco
php artisan migrate
```

### 6. Configuração do Frontend (Vue.js)

```bash
# Instalar dependências JavaScript
npm install

# Compilar assets para desenvolvimento
npm run dev

# OU compilar para produção
npm run build
```

### 7. Configuração de Storage

```bash
# Criar link simbólico para storage público
php artisan storage:link

# Criar diretórios necessários
mkdir -p storage/app/resumes
chmod -R 775 storage/app/resumes
```

## 🎮 Executando o Projeto

### Desenvolvimento

```bash
# Terminal 1: Servidor Laravel
php artisan serve
# Aplicação disponível em: http://localhost:8000

# Terminal 2: Servidor de desenvolvimento Vite (assets)
npm run dev

# Terminal 3: Worker de filas (para emails)
php artisan queue:work
```

## 🏗 Estrutura do Projeto

```
project_paytour/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php      # Autenticação
│   │   │   └── ResumeController.php    # Gestão de candidaturas
│   │   ├── Requests/
│   │   │   ├── LoginRequest.php        # Validação de login
│   │   │   └── ResumeRequest.php       # Validação de candidatura
│   ├── Jobs/
│   │   └── ResumeEmailJob.php          # Job de envio de email
│   ├── Models/
│   │   ├── User.php                    # Modelo de usuário
│   │   └── Resume.php                  # Modelo de candidatura
│   └── Services/
│       └── ResumeService.php           # Lógica de negócio
├── resources/
│   ├── js/
│   │   └── Pages/
│   │       ├── Index.vue               # Formulário de candidatura
│   │       ├── Auth/Login.vue          # Página de login
│   │       ├── Dashboard/Index.vue     # Dashboard admin
│   │       └── Components/             # Componentes reutilizáveis
│   └── views/
│       └── emails/
│           └── resume.blade.php        # Template de email
├── tests/
│   └── Unit/
│       └── ResumeTest.php              # Testes unitários
├── database/
│   └── migrations/                     # Migrações do banco
├── routes/
│   ├── web.php                         # Rotas públicas
│   └── admin.php                       # Rotas administrativas
└── storage/
    └── app/
        └── resumes/                    # Arquivos de currículo
```

## 🧪 Testes

```bash
# Executar todos os testes
php artisan test

# Executar testes específicos
php artisan test tests/Unit/ResumeTest.php

# Executar com cobertura (se configurado)
php artisan test --coverage
```

## 📱 URLs da Aplicação

- **Página Principal**: `http://localhost:8000/`
- **Login Admin**: `http://localhost:8000/admin/login`
- **Dashboard**: `http://localhost:8000/dashboard` (após login)

### Credenciais Padrão para Admin
- **Email**: admin@paytour.com
- **Senha**: secret

## 🔧 Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Recompilar assets
npm run build

# Verificar filas
php artisan queue:status

```

## 🚨 Solução de Problemas

### Erro de Permissão
```bash
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache
```

### Erro de Assets
```bash
npm install
npm run build
```

### Erro de Banco
```bash
php artisan migrate:fresh
```