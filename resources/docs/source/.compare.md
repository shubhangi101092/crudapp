---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_61c992b9faa3bff9c756e4bdf4f2b6a1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/students" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/students"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "students": [
        {
            "id": 3,
            "first_name": "4434",
            "last_name": "shukla",
            "email": "dssssdxxxxsssx@test.uudjs",
            "parent_name": "shubu",
            "mobile_number": "232323232323",
            "standard": "2",
            "course": "science",
            "created_at": "2020-01-01 19:40:46",
            "updated_at": "2020-01-01 19:40:46"
        },
        {
            "id": 4,
            "first_name": "4434",
            "last_name": "shukla",
            "email": "dxssssdxxxxsssx@test.uudjs",
            "parent_name": "shubu",
            "mobile_number": "232323232323",
            "standard": "2",
            "course": "science",
            "created_at": "2020-01-01 19:41:29",
            "updated_at": "2020-01-01 19:41:29"
        }
    ],
    "message": "All students record."
}
```

### HTTP Request
`GET api/students`


<!-- END_61c992b9faa3bff9c756e4bdf4f2b6a1 -->

<!-- START_1c8c34226aeb304a2ed35af59517c055 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/students/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/students/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No record found."
}
```

### HTTP Request
`GET api/students/{id}`


<!-- END_1c8c34226aeb304a2ed35af59517c055 -->

<!-- START_058e6d0cac82649086bbc06fe88fd040 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/students" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/students"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/students`


<!-- END_058e6d0cac82649086bbc06fe88fd040 -->

<!-- START_4443b605f3997e9a7c265ce4b0cee3a7 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/students/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/students/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/students/{id}`


<!-- END_4443b605f3997e9a7c265ce4b0cee3a7 -->

<!-- START_1cb43b580dcc9e8f2ada3c9768555f96 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/students/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/students/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/students/{id}`


<!-- END_1cb43b580dcc9e8f2ada3c9768555f96 -->


