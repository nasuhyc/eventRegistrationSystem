
# Event Registration System



## In this project, a fundamental event planning system has been implemented.

- Events are created based on roles.
- The system has the authority to create events based on roles. In other words, only organizers and admins can create new events.
- The project provides authentication and authorization processes.
- Laravel's authorization system has been used for this authorization process.
- Resource API and Resource Collection structures have been utilized.
- The Service Layer has been utilized.
- Enum structures are useful data types for representing specific constant values.

#### - The process of creating enums has been developed using the composer and artisan command.

#### - The command for creating an enum is as follows:

    php artisan make:enum EnumName
  
#### - It is located in the Other/Enums folder.
  
#### - The created enums should be defined within the "EnumController".

 

## Run it on your computer

Clone the project

```bash
git clone https://github.com/nasuhyc/eventRegistrationSystem.git
```

Install required packages

```bash
  composer update
```

Important

```
** Please edit your env information(.env)

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=database_name
DB_USERNAME=database_user
DB_PASSWORD=database_password


```

Run the server

```bash
  php artisan serve
```




## REST API Usage

#### AuthController routes for register, login and logout


#### Register
```http
  POST  /api/register
```

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | Nasuh |
| `email` | `string` | nasuhyc@gmail.com |
| `password` | `string` | 123123 |
| `password_confirmation` | `string` | 123123 |
| `role_id` | `int` | 1 | "1"=>Admin , "2"=> Organizer , "2"=> User

#### Login

```http
  POST  /api/login
```

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | nasuhyc@gmail.com |
| `password` | `string` | 123123 |


#### Logout

```http
  POST  /api/logout
```


## Role

```http
  - POST /api/role/
  - GET /api/role/
  - GET /api/role/{id}
  - PUT /api/role/{id}
  - DELETE /api/role/{id}

```
#### Others
```http
  - GET /api/roles/
```

#### BODY raw

```http
 {
    "name":"role_name"
 }
```


## Event

```http
  - POST /api/event/
  - GET /api/event/
  - GET /api/event/{id}
  - PUT /api/event/{id}
  - DELETE /api/event/{id}
```

#### Others
```http
  - GET /api/events
```



#### BODY raw

```http
  
{
    "title":"event_title",
    "description":"event_description",
    "speaker":"event_speaker",
    "event_date":"2023-07-18T16:18:56.000000Z",
    "location":"event_location",
    "event_type":"event_type"
}
  
```

## Participant

```http
  - POST /api/participant/
  - GET /api/participant/
```
#### BODY raw (Create)

```http
Create
{
    "event_id":3
}

```

#### BODY raw (Update)

```http
{
    "event_id":3,
    "status":-1,
    "comment":"comment_text"
}

```

  
