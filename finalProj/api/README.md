# API Documentation

Endpoint base: `/api/endpoint.php`

All endpoints, with the exception of `GET` endpoints require the request body to be encoded in JSON.

Instead of using `PATCH` and `DELETE` requests, a POST request can be sent instead, with the string `"PATCH"` or `"DELETE"` under the `action` key.

## Product View ##

### GET `categories.php` ###

Returns an array of objects listing the categories.

##### Sample Response: #####
```json
[
    {
    	"catId": 1,
        "catName": "Cheese Imports",
        "catDesc": "Companies that buy cheese."
    },
    {
    	"catId": 2,
        "catName": "Cheese Exports",
        "catDesc": "Companies that sell cheese."
    }
]
```

### GET `products.php` ###

Returns an array of products.

##### Accepts #####

 - `limit` - The maximum number of products to list. Defaults to `0`, which passes all products.
 - `order` - The order in which the products will be sorted. Can be either:
   - `asc` - Ascending order
   - `desc` - Descending order (Default)
 - `sortby` - The metric by which the results will be sorted. Can be either:
   - `name` - Sort by name in alphabetical order
   - `price` - Sort by price (Default)
 - `from` - The minimum price. Defaults to `None`.
 - `to` - The maximum price. Defaults to `None`.
 - `search` - Filter by search term.
 - `category` - Filter by category. Accepts a comma-separated list of category ids.

##### Sample Response: #####
```json
[
    {
        "compId": 1,
    	"name": "Wensleydale's Cheese Emporium",
        "category": 1,
        "image": "cheese.jpg",
        "market_value": 100,
        "ceo": "John Wendsleydale",
        "country": "Great Britian",
        "headquarters": "Sheffield",
        "description": "Wensleydale's Cheese Emporium boasts a large selection of cheeses, neither runny nor eaten by cats!"
    }
]
```

## Product Management ##

### POST `products.php` ###

Adds a product.

User must be logged in to be able to perform this operation.

##### Accepts #####

 - `name`
 - `category`
 - `image`
 - `market_value`
 - `ceo`
 - `country`
 - `headquarters`
 - `description`

Returns `true`.

### PATCH `products.php` ###

Updates a product.

User must be logged in to be able to perform this operation.

##### Accepts #####

 - `compId`
 - `name`
 - `category`
 - `image`
 - `market_value`
 - `ceo`
 - `country`
 - `headquarters`
 - `description`

### DELETE `products.php` ###

Deletes a product.

User must be logged in to be able to perform this operation.

##### Accepts #####

 - `id`

Returns `true`.

## Purchase Management ##

### POST `purchases.php` ###

Adds a purchase.

##### Accepts #####

 - `productId`
 - `unitPrice`
 - `purchaseDate`

Returns `true`.

### GET `purchases.php` ###

Gets purchases.

User must be logged in to be able to perform this operation.

##### Sample Response: #####
```json
[
    {
        "purchaseId": 1,
        "productId": 1,
    	"unitPrice": 200,
        "purchaseDate": "2011-9-11"
    }
]
```

## Accounts ##

### GET `session.php` ###

Returns `{"username": USERNAME}` if logged in, else `false`.

### POST `session.php` ###

Logs the user in.

##### Accepts #####
 - `username`
 - `password`

Logs the user in and returns `{"username": USERNAME}` if successful, else `false`.

### DELETE `session.php` ###

Logs the user out. Returns `true`.