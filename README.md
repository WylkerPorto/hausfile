# **Inertia Js**

Sistema de barbearia com agendamento de horario e login, sistema simples somente para estudo do Inertia Js

### Passo a passo
Clone Repositório
```
git clone https://github.com/WylkerPorto/BarberStudio
```

Acesse o Repositório
```
cd Hausfile
```

Crie o Arquivo .env
```
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```
APP_NAME=Hausfile
DB_DATABASE=Hausfile
DB_USERNAME=Usuario
DB_PASSWORD=Senha
```

# Altere as configurações de email e aws caso necessario

Suba os containers do projeto
```
docker-compose up -d
```

Instalar as dependências do projeto
```
docker-compose exec app composer install
```

Gerar a key do projeto Laravel
```
docker-compose exec app php artisan key:generate
```

Gerar o banco de dados
```
docker-compose exec app php artisan migrate
```

Instalar as dependências do frontend
```
npm install
```

# Você deve estar com o node na versão 16^
Inicie o projeto
```
npm start
```

Acessar o projeto
[http://localhost](http://localhost)

Acesse o banco de dados
[http://localhost:81](http://localhost:81)
