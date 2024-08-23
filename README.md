# Product Manager

## Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/jonatastb/product-manager.git
```

### 2. Navegue até o diretório do projeto e instale as dependências do PHP e do Node.js
```bash
    npm install
```
### 3. Copie o arquivo .env.example para .env
```bash
    npm install
```
### 4. Gere a chave da aplicação
```bash 
    php artisan key:generate
```
### 5. Configure o banco de dados
No arquivo .env, altere a configuração do banco de dados:
```bash
    DB_CONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
```
Para a configuração da sua escolha (exemplo com MySQL):
```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=product_manager
    DB_USERNAME=root
    DB_PASSWORD=
```
### 6. Execute as migrações e seeds
```bash
    php artisan migrate --seed
```

*Nota: Se for solicitado para criar o banco de dados, escreva yes ou pressione Enter.*

### 8. Compile os assets do front-end
```bash
    npm run dev
```
### 9. Gere a documentação do Swagger
```bash
    php artisan l5-swagger:generate
```
Agora, você pode acessar a documentação da API no link exibido pelo servidor Artisan (php artisan serve).
### Usuários e Permissões
O seed já cadastrou dois usuários:
```bash
    Admin
        - Login: admin
        - Senha: password
    Usuário Comum
        - Usuário aleatório criado com permissões básicas.
```
### Funcionalidades
#### Admin
- Pode ver, editar e excluir produtos de outros usuários.
- Pode criar, visualizar e editar categorias.
- Pode visualizar todos os usuários e listar os produtos de um usuário específico. 
#### Usuario comum
- Pode criar, editar, ver e excluir apenas seus próprios produtos.
- Pode visualizar as categorias.

No menu, há um botão com o nome do usuário logado que oferece as opções de "Perfil" (para editar suas informações ou deletar sua conta) e "Sair" (para deslogar).

### Dados Seed
Todos os produtos e categorias foram criados via Seed, porém, sem o uso de faker.
Nos testes automatizados, são usados dados falsos (fake data), mas no banco de dados SQLite, para não interferir na experiência no sistema.
### Testes Automatizados
Para rodar os testes:
```bash 
    php artisan test
```
### API
Você pode visualizar a documentação da API no Swagger. Para utilizar as APIs em ferramentas como Postman ou Insomnia, use os seguintes endpoints:
- ´/api/produtos´ - Lista todos os produtos, a categoria atribuída a eles e o usuário que os criou.
- ´/api/usuario/{id}/produtos´ - Lista todos os produtos e categorias desses produtos de um usuário específico.

Qualquer dúvida entre em contato!






