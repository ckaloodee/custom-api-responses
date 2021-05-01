Custom Api Responses With Laravel

Create custom api responses to use in your controllers without repeating yourself.

Error responses:
```json
"status": 422,
"code": "Failed",
"errors": [
   "validation.min.name"
]
```
Success responses:
```json
"status": 201,
"code": "Created",
"data": {
"id": 126,
"name": "David",
"surname": "Williams",
"created": 1619822879,
"updated": 1619822879
}
```

Checkout my blog post for the story behind that code.
https://ckaloodee.medium.com/...