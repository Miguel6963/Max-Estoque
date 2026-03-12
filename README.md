# Max Estoque 📦

CRUD de estoque utilizando PHP, JS, MySQL, HTML e MySQL. Implementação de boas práticas de segurança contra SQL Injection e tratamento de exceções com Try-Catch.
Sistema de gerenciamento de estoque desenvolvido para portfólio. O projeto foca na aplicação de conceitos de Programação Orientada a Objetos (POO) e persistência de dados com PHP e MySQL.

## 🚀 Funcionalidades
- **CRUD Completo:** Cadastro, Listagem, Edição e Exclusão de produtos.
- **Busca Dinâmica:** Localização de itens por nome utilizando operadores `LIKE`.
- **Segurança:** Implementação de `Prepared Statements` (PDO) para prevenção de SQL Injection.

## 🧠 Decisões Técnicas
- **Persistência:** Utilização da biblioteca PDO para maior portabilidade e segurança na camada de banco de dados.
- **Integridade de Dados:** A função de edição foi projetada para alterar apenas Nome e Preço. A quantidade foi mantida como atributo de leitura na edição para prevenir alterações manuais sem registro de movimentação (Entrada/Saída), simulando regras de negócio reais de sistemas ERP.
- **Tratamento de Erros:** Uso de blocos `try-catch` para garantir a estabilidade da aplicação mesmo em falhas de conexão.

## 🛠️ Tecnologias
- PHP 8.x
- JS
- MySQL
- HTML5 / CSS3
