# ci4-dashboard
 
#usage

```
composer config repositories.IDGdashboard vcs git@github.com:ay4t/ci4-dashboard.git
```

```
composer require ay4t/ci4-dashboard
```

#make migration
```
php spark migrate -n IDGdashboard
```

#seed to database
```
php spark db:seed
```

```
\IDGdashboard\Database\Seeds\DatabaseSeeder
```
