# Cinemark Crawler

Projeto criado com o objetivo de listar os filmes que estão em cartaz ou que vão estreiar em breve no cinemark na cidade de São Paulo - Brasil.
A listagem dos filmes é feita via **crawler** no próprio site da cinemark.

# Live Demo
Para testar basta acessar: ```https://crawler-cinemark.herokuapp.com/?movieType=<tipo_filme>``` e passar como valor da query string **movieType** o tipo dos filmes que você deseja listar:

- Em cartaz (filmes que estão passando atualmente)
```ruby
https://crawler-cinemark.herokuapp.com/?movieType=em-cartaz
```
- Em breve (filmes que ainda não foram lançados)
```ruby
https://crawler-cinemark.herokuapp.com/?movieType=em-breve
```
---
Em ambos os casos são retornados os filmes com as propriedades title,  age reating, e status

```ruby 
{
	"title": "Filme A Lenda de Candyman",
	"age_reating": "Classificação 16 Anos",
	"status": "Estreia"
}
```
