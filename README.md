
# API Tienda en linea

API tienda de Bsale es que puedas obtener los datos de los productos que se encuentran en la base de datos de Bsale.


## API Reference

#### Get all Productos

```http
  GET /api/AllBebidas
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
|  | | No requiere parametros |


Retorna todos los productos


#### Get by Category

```http
  GET /api/getByCategory
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
|      | | No requiere parametros |


Retorna los productos por categoria

#### Get by Category

```http
  GET /api/bebidas/buscar
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
|  `name` | `string` | No requiere parametros |


Retorna los productos buscados por nombre

#### Get by Category

```http
  GET /api/bebidas/Order
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
|   `order` | `string` | No requiere parametros |


Retorna los productos acomodados por mayor o menor precio o por nombre Asc o Desc, o Descuento Mayor




## Authors

- [@BrandonMartinez](https://github.com/brandonblain/ApiTienda)
