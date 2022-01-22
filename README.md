# Teste Full Stack(PHP/Ionic) - Lista de Aplicativos

Essa etapa consiste na implementação de um caso de uso, no qual avaliaremos seus conhecimentos técnicos.

Para isso, pedimos que implemente uma aplicação de exemplo baseado nas especificações abaixo e submeta o mais breve possível. A entrega deverá ser feita através de um projeto hospedado no github contendo a explicação no README.md de como subir os serviços e realizar build do projeto implementado.

O tempo será cronometrado a partir do envio deste e-mail até o momento da sua resposta.
Deve ser implementado um CRUD com todas as operações relacionadas e persistida em banco de dados. Deve atender o seguinte cenário.

Uma pessoa está associada a um perfil e (pessoa) contém vários aplicativos;

- Pessoa deve conter, CPF, nome, data de nascimento e RG.
- Os perfis serão: usuário comum, gestor e administrador.
- Entidade aplicativo deve conter nome e bundle-id.

- Ao autenticar o login deverá salvar a localização atual do usuário.
- Deverá ser possível tirar foto de perfil
- Não esquecer de migrations, seeds.

Atenção para os relacionamentos entre as entidades.
Será necessário implementar o backend (PHP, Java ou NodeJS), envie também o MER e scripts de banco de dados(se utilizado relacional).
O ambiente entregue deverá ser dockerizado, utilizando docker-compose com tudo necessário para subida do ambiente no arquivo docker-compose.yml

**Requisitos técnicos:**

- Backend: NodeJS, Java, PHP (Spring boot 2.x ou Laravel 5.x ou Lumen 5.x ou Expres 4.x ou NestJS 8.x);
- Mobile: Ionic 5 ou superior + Capacitor 3;
- Banco de dados: Postgres ou MySQL ou MongoDB;
- Docker
- Necessário gerar APK.

Será avaliado lógica, design patterns, organização e indentação de código, camadas.

## Como executar a aplicação

```bash

# Scripts
$ sh scripts.sh

```
