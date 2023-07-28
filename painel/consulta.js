const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: true }));

// Configurações do banco de dados
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'alunio01',
  database: 'morningflower'
});

// Conexão com o banco de dados
connection.connect();

// Rota para exibir o formulário de consulta
app.get('/consulta', (req, res) => {
  res.send(`
    <!DOCTYPE html>
    <html>
      <head>
        <title>Consulta de fornecedores</title>
      </head>
      <body>
        <h1>Consulta de fornecedores</h1>
        <form method="POST" action="/clientes">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome"><br><br>
          <label for="endereco">Endereço:</label>
          <input type="text" id="endereco" name="endereco"><br><br>
          <button type="submit">Consultar</button>
        </form>
      </body>
    </html>
  `);
});

// Rota para processar a consulta
app.post('/fornecedores', (req, res) => {
  //const nome = req.body.nome;
  const { nome, endereco } = req.body;
  //const endereco = req.body.endereco;
  
  // Consulta no banco de dados
  connection.query(`SELECT * FROM fornecedores WHERE nome LIKE '%${nome}%'`, (error, results, fields) => {
    if (error) throw error;
    
    // Exibição dos resultados
    let html = `
      <!DOCTYPE html>
      <html>
        <head>
          <title>Fornecedores</title>
        </head>
        <body>
          <h1>fornecedores encontrados</h1>
          <table>
            <tr>
              <th>Nome</th>
              <th>endereco</th>
            </tr>
    `;
    
    results.forEach((fornecedores) => {
      html += `
        <tr>
          <td>${fornecedores.nome}</td>
          <td>${fornecedores.endereco}</td>
        </tr>
      `;
    });
    
    html += `
          </table>
        </body>
      </html>
    `;
    
    res.send(html);
  });
});

// Inicia o servidor
app.listen(port, () => {
  console.log(`Servidor rodando em http://localhost:${port}`);
});
