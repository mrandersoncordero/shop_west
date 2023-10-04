# MER

## users
- id
- name
- email
- email_verified_at
- password
- remenber_token
- created_at
- updated_at
- is_active

## profiles
- id
- user_id
- first_name
- last_name
- address
- phone_number
- birthday_date
- created_at
- updated_at

## categories
- id
- name
- description

## subcategories
- id
- category_id
- name
- description

## products
- id
- subcategory_id
- code
- name
- description
- weight(peso)
- format(formato)
- yield(rendimiento)
- traffic(trafico)
- price

## orders
- id
- user_id
- is_active
- created_at
- updated_at

## products_ordereds
- id
- order_id
- product_id
- quantity

## payments
- id
- user_id
- order_id
- bank_reference
- created_at
- updated_at
