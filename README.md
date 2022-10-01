# api-requirements

### The dataset has been stored as json in app/resources/json/dataset.json
## Installation instructions
- Clone the repository
- Open the project directory in your OS terminal and run the following commands
```bash
    composer install
```
- Serve project:
```bash
    php artisan serve
```
- Open localhost:3000/api/products in your browser to see the api response
- Open localhost:3000/api/products?category=category to filter products by category
- Open localhost:3000/api/products?price=price to filter products by price

