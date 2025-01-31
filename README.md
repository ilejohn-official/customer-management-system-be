# Customer Management System

## Table of contents

- [General Info](#general-info)
- [Requirements](#requirements)
- [Setup](#setup)
- [Usage](#usage)

## General Info

This project creates, lists with pagination, filters and update customers.

## Requirements

- [php ^8.3](https://www.php.net/ "PHP")

## Setup

- Clone the project and navigate to it's root path and install the required dependency packages using the below commands on the terminal/command line interface.

  ```bash
  git clone https://github.com/ilejohn-official/customer-management-system-be
  cd customer-management-system-be
  ```

  ```bash
  composer install
  ```

- Copy and paste the content of the .env.example file into a new file named .env in the same directory as the former and set it's  
  values based on your environment's configuration.

- Generate Application Key

  ```bash
  php artisan key:generate
  ```

- Run Migration

  ```bash
  php artisan migrate
  ```

- Run seeder

  ```bash
  php artisan db:seed
  ```

## Usage

- To run local server

  ```bash
  php artisan serve
  ```

- To set up tests

  Copy .env into .env.testing and set `APP_ENV` as "testing". Update the database details using a test db seperate from the app db.

- To run tests

  After the above setup then run

  ```bash
  php artisan test --env=testing
  ```
