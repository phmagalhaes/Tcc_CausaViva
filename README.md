# 🌱 Causa Viva

**Causa Viva** é uma plataforma desenvolvida em Laravel com o objetivo de conectar ONGs a doadores, facilitando o processo de doação e engajamento social. Através da aplicação, ONGs podem se cadastrar, exibir seus projetos e receber doações, enquanto doadores podem navegar pelas causas e contribuir diretamente pela plataforma.

## 🛠️ Tecnologias Utilizadas

- PHP 8+
- Laravel 11
- MySQL
- Composer
- API do Mercado Pago (para pagamentos via Pix)

---

## ⚙️ Como Rodar o Projeto

### 📦 Pré-requisitos

Antes de iniciar, certifique-se de ter instalado em sua máquina:

- PHP 8 ou superior
- Composer
- MySQL
- Git (opcional)

### 🚀 Passo a passo

```bash
# 1. Clone o repositório
git clone https://github.com/seu-usuario/causa-viva.git

# 2. Acesse o diretório do projeto
cd causa-viva

# 3. Instale as dependências do Laravel
composer install

# 4. Copie o arquivo .env de exemplo
cp .env.example .env

# 5. Gere a chave da aplicação
php artisan key:generate

# 6. Configure as variáveis de ambiente no arquivo .env, incluindo o acesso ao banco de dados
# Exemplo:
# DB_DATABASE=causa_viva
# DB_USERNAME=root
# DB_PASSWORD=

# 7. Execute as migrações (se necessário)
php artisan migrate

# 8. Inicie o servidor local
php artisan serve
