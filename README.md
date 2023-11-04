[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://main--abderrahmaneamerrhiportfoliov2.netlify.app/)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/abderrahmane-amerrhi-807b40201/)

# Employee application management

GEMP app with laravel that enable admin to manage departments and employes

## Information

I built the app using laravel and Livewire, made a simple backend and use Livewire componenets in fronend

### Technologies used

| Technology |        Description        | Version |
| :--------- | :-----------------------: | :-----: |
| Php        |       PHP language        | ^8.0.2  |
| Laravel    | Laravel backend framework |    9    |
| livewire   |         livewire          |  2.10   |

## Cloning and use

```bash or terminal
  # Cloning app
  git clone  https://github.com/AbderrahmaneAmerhhi/Gestoin-Employees

  # install composer
   composer install
  # copy .env.example => rename it to .env

  # generate App key
   php artisan key:generate



```

## Configuration

```env
# in .env file config database

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabse_name
DB_USERNAME=root
DB_PASSWORD=databasepassword

```

## Migrate database and run app

```bash or terminal
  ########### open app in terminal or cmd or bash ... ###############
  # Migrate data base run in terminal
   php artisan migrate

  # seed database
   php artisan db:seed

  # run app
  php artisan serve


  # open app in
  http://127.0.0.1:8000

  # login to  dashboard
   Url : http://127.0.0.1:8000/
   Email :   admin@gmail.com
   Password : admin


```

## Features

-   Dynamic backend with laravel Backend framework
-   Responsive front-end with livewire componenes and other widgets

#### Dashboard Features

-   admin can manage departments, add new departments, update a delete
-   admin can manage employes, add new employes, update a delete
-   Print the employee's certificate if he needs it
-   Track some stats in charts and cards

# Discover

Discover [Vedio](https://abderrahmaneamerrhi.com/assets/GEMP_PR_VED-3b9fe972.mp4).
