# **Inertia Js**

Versão customizada do [ProntoStack](https://github.com/prontostack/pronto-fuel) alterando a contenização do vscode container para o docker e incluindo queue e nginx além de remover o debugger.

### Passo a passo
Clone Repositório
```
git clone https://github.com/WylkerPorto/setup-laradocker.git NomeDoProjeto
```

Acesse o Repositório
```
cd NomeDoProjeto
```

Crie o Arquivo .env
```
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```
APP_NAME=NomeDoProjeto
DB_DATABASE=NomeDoBanco
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