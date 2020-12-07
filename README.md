<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# ALTA STORE API

Projek ini di buat intuk menghubungkan backend *ALTA STORE* dengan frontend, project ini menggunakan teknologi **laravel 7** dan **MySQL** yang terdiri dari beberapa modul seperti:

- Register.
- Login.
- Product.
- Cart.
- Transaction.

## API Documentasi
### USER
Method "USER" terdiri dari 2 fungsi yakni register dan login.
| Method   | Url            | Parameter (data)      |
| -------- | -------------- | --------------------- |
| **POST** | user/register  | name, email, password |
| **POST** | user/login     | email, password       |

### Contoh Response Register
```java
{
    "data": {
        "id": 8,
        "name": "Syamsul",
        "email": "s_arifin90@yahoo.co.id",
        "API_TOKEN": "inRVoGE185e1i4IJ9fb05edX7ZChbwQIW5oLDyFOyAZuaX9xEsk4BokxRnMZ",
        "created_at": "2020-12-07T01:33:05.000000Z",
        "updated_at": "2020-12-07T01:33:05.000000Z"
    }
}
```

### KATEGORY & PRODUK
Method berisi fungsi untuk menampilkan kategori dan produk berdasarkan categori yang di pilih maupun menampilkan semua produk.
| Method  | Url                          |
| ------- |----------------------------- |
| **GET** | category                     |
| **GET** | product / product?category=1 |
### Contoh Response Categori
```java
{
    "data": [
        {
            "id": 1,
            "name_category": "Pakaian"
        },
        {
            "id": 2,
            "name_category": "Aksesoris"
        }
    ]
}
```
### CART
| Method     | Url                          | Parameter (data)                     |
| ---------- | ---------------------------- | ------------------------------------ |
| **GET**    | cart                         |                                      |
| **POST**   | storeCart                    | product_cart, qty_cart               |
| **PUT**    | updateCart?id_cart={id_cart} | {	"qty_cart" : 3 } (bentuk ARRAY)    |
| **DELETE** | deleteCart/{id_cart}         |                                      |
### Contoh Response Cart
```java
{
    "data": [
        {
            "id": 4,
            "product_cart": 1,
            "user_cart": 7,
            "qty_cart": 2,
            "created_at": "2020-12-06T07:15:44.000000Z",
            "updated_at": "2020-12-06T07:15:44.000000Z"
        }
    ]
}
```
### Contoh Response Store Cart
```java
{
    "data": {
        "id": 5,
        "product_cart": "1",
        "user_cart": 7,
        "qty_cart": "2",
        "created_at": "2020-12-07T01:48:18.000000Z",
        "updated_at": "2020-12-07T01:48:18.000000Z"
    }
}
```
### Contoh Response Update Cart
```java
[
    {
        "id": 5,
        "product_cart": 1,
        "user_cart": 7,
        "qty_cart": 3,
        "created_at": "2020-12-07T01:48:18.000000Z",
        "updated_at": "2020-12-07T01:48:18.000000Z"
    }
]
```
### Contoh Response Delete Cart
```java
{
    "message": "deleted succes"
}
```
### CHECKOUT & PAID PRODUK
| Method     | Url                                   | Parameter (data)                     |
| ---------- | ------------------------------------- | ------------------------------------ |
| **GET**    | transCheckout                         |                                      |
| **POST**   | storeCart                             | **Contoh Parameter di bawah.**       |
| **GET**    | transPaid                             |                                      |
| **POST**   | transStorePaid?id_trans={id_Checkout} |                                      |
### Contoh Response Cart
```java
{
    "data": [
        {
            "id": 3,
            "paid": 0,
            "created_at": "06/12/2020 10:02:10",
            "transaction_details": [
                {
                    "id": 1,
                    "product_id": 1,
                    "product_name": "jaket",
                    "price": 150000,
                    "qty": 2,
                    "amount": 300000
                },
                {
                    "id": 2,
                    "product_id": 1,
                    "product_name": "jaket",
                    "price": 150000,
                    "qty": 2,
                    "amount": 300000
                }
            ]
        }
    ]
}
```
### Parameter Store Checkout
```java
    {"data":[
        {"id":"6"},
        {"id":"7"}
    ]}
```
### Response Store Checkout
```java
    {
        "data": {
            "id": 20,
            "paid": 0,
            "created_at": "07/12/2020 02:02:39",
            "transaction_details": [
                {
                    "id": 7,
                    "product_id": 1,
                    "product_name": "jaket",
                    "price": 150000,
                    "qty": 2,
                    "amount": 300000
                },
                {
                    "id": 8,
                    "product_id": 3,
                    "product_name": "Jeans",
                    "price": 200000,
                    "qty": 1,
                    "amount": 200000
                }
            ]
        }
    }
```
### Response Paid
```java
    {
        "data": [
            {
                "id": 18,
                "paid": 1,
                "created_at": "06/12/2020 10:24:05",
                "transaction_details": [
                    {
                        "id": 3,
                        "product_id": 1,
                        "product_name": "jaket",
                        "price": 150000,
                        "qty": 2,
                        "amount": 300000
                    },
                    {
                        "id": 4,
                        "product_id": 1,
                        "product_name": "jaket",
                        "price": 150000,
                        "qty": 2,
                        "amount": 300000
                    }
                ]
            },
            {
                "id": 19,
                "paid": 1,
                "created_at": "06/12/2020 10:25:12",
                "transaction_details": [
                    {
                        "id": 5,
                        "product_id": 1,
                        "product_name": "jaket",
                        "price": 150000,
                        "qty": 2,
                        "amount": 300000
                    },
                    {
                        "id": 6,
                        "product_id": 1,
                        "product_name": "jaket",
                        "price": 150000,
                        "qty": 2,
                        "amount": 300000
                    }
                ]
            }
        ]
    }
```
### Response Store Paid
```java
    {
        "data": [
            {
                "id": 20,
                "paid": 1,
                "created_at": "07/12/2020 02:02:39",
                "transaction_details": [
                    {
                        "id": 7,
                        "product_id": 1,
                        "product_name": "jaket",
                        "price": 150000,
                        "qty": 2,
                        "amount": 300000
                    },
                    {
                        "id": 8,
                        "product_id": 3,
                        "product_name": "Jeans",
                        "price": 200000,
                        "qty": 1,
                        "amount": 200000
                    }
                ]
            }
        ]
    }
```


