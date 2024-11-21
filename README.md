# Backend PHP
El repositorio contiene una API dummy escrita en PHP. Es necesario modificar el archivo db.php para apuntar a la base de datos donde almacenar los registros creados

## Endpoints
### Health

<details>
 <summary><code>GET</code> <code><b>/api/health</b></code> <code>(Develve la salud de la API )</code></summary>

#### Parametros

> Ninguno

#### Respuesta

> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | text/json                `        | Objeto de salud                                                     |

</details>

### Students

<details>
 <summary><code>GET</code> <code><b>/api/students</b></code> <code>(lista de estudiantes )</code></summary>

#### Parametros

> Ninguno

#### Respuesta

> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | text/json                `        | Array de estudiantes                                                |

</details>

<details>
 <summary><code>POST</code> <code><b>/api/students</b></code> <code>(Develve la salud de la API )</code></summary>

#### Parametros

> Ninguno

#### Respuesta

> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | text/json                `        | Objeto de creación de estudainte                                    |
> | `400`         | text/json                `        | Objeto de error                                                     |

</details>



