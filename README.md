## Installation steps

* run composer install
* copy .env.example and rename new file to .env
* create mysql database 
* set database credenitals in .env
* run php artisan config:cache
* run php artisan key:generate
* run php artisan migrate --seed
* run php artisan optimize:clear


## APIs documentations

# /count-numbers/{first_number}/{second_number} (GET)

description: count numbers between two integers API
method: GET
params : first_name (integer)
params : second_number (integer) : should be greater than first_name
return type : integer 

- example:
request: /count-numbers/5/20
response: 14

# /string-index/{input_string} (GET)

description: get index for given string API
method: GET
params : input_string (string) should have characters only
return type : integer 

- example: 
request: /string-index/AA
response: 27

# /steps-count (GET)

description: calculate steps to reduce element of array to zero API
method: GET
params : N (integer) count of elements
params : Q (array of N integers)
return type : array

- example: 
request: /steps-count
body: {
    "Q" : [
        3,
        4,
        5
    ],
    "N" : 3
}
response: [
    3,
    3,
    4
]

# /menu-items (GET)

description: menu items list API
method : GET
return type : array of objects 

# /order (POST)

description: create order API
method : POST
params : status (string should be in dine-in, delivery or takeaway )
params : items (array of items each item should have menu_item_id & quantity )
params : customer_name (string required if status is delivery)
params : customer_phone (integer required if status is delivery)
params : table_number (integer required if status is dine-in)
params : waiter_name (string required if status is dine-in)
params : fees (double required if status in delivery or dine-in)
return type : order object

- example:
request: /order
body : {
    "status" : "dine-in",
    "items" : [
        {
            "menu_item_id" : 2,
            "quantity": 5
        },
        {
            "menu_item_id" : 3,
            "quantity": 3
        }
    ],
    "table_number" : 4,
    "waiter_name" : "Sherif Hesham",
    "fees" : 40
}

response :{
    "message": "Order created successfully",
    "errors": [],
    "data": {
        "id": 1,
        "status": "dine-in",
        "fees": 40,
        "total": 540
    }
}



