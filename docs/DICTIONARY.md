# WORDS AND TERMS

- ***action [ ação ]***
  - Utilizado para determinar condições e direcionamentos no sistema;

- ***code [ código / registro único / valor interno (sistema) ]***
  - Utilizado para identificar um determinado registro;
  - Usado para consultas ao banco de dados, retorna um registro;
  - Usado para identificar opções de combos;
    - em ***combos***:
      - é utilizado em conjunto com o ***type*** [TYPE-CODE]
      - determina se o código é:
        - 0 a 50 - utilizado para controle do sistema em erros;
        - 51 a 99 - utilizado para controle do sistema em validações;
        - 100 - utilizado para exibir a opção selecione;
        - 101 a ... - utilizado para determinar os valores únicos de cada opção;
  
- ***type [ tipo / grupo de registros ]***
  - Utilizado para determinar a categoria ou o tipo de assunto tratado;
  - Usado para consultas ao banco de dados, retornando um grupo de dados;

- ***description [ descrição ]***

- ***name [ nome ]***

- ***order_by [ ordenado pro ]*** 
  - Utilizado para indicar qual campo deve ordenar um conjunto de registros;

- ***recordtype [ tipo de registro / categoria / grupo de registros ]***
  - Utilizado para determinar a categoria ou o tipo de assunto tratado;
  - Usado para consultas ao banco de dados, retornando um grupo de dados;

- ***text [ texto a ser exibido ]***
  - Utilizado principalmente em combos;

- ***value [ valor externo (regras de negocio) ]***
  - valor externo de um registro definido pelas regras de negócio;

-----


- display_in_list - exibir em listas


- unit_of_measurement - unidade de medida

- ***usage_situation*** - situação de uso 
  - utilizado no lugar de:
    - situação do registro (ativo, inativo, )
