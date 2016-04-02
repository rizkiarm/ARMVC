ARMVC
==========

A very simple MVC Framework built for Web Programming class (2014). Written in PHP. Inspired by Laravel framework.

Description
-----------
Here is the structure of the application:
```
core
    Auth.php
    Model.php
    Route.php
    ViewHelper.php
    Controller.php
    RouteHelper.php
    Validation.php
    View.php
app
   views
   configs
   controllers
   models
   bootstrap.php
   routes.php 
assets
index.php
```

Usage
-----
Follow this steps to use the application

1. Clone this repository
2. Run ``migrate.sql`` commands in your PostgreSQL database
3. Configure the ``database.php`` based on your database settings
4. You can access the application in ``path-to-application/``. You will be presented with a simple example login app that utilizes this framework.
5. Your application folder is located in ``app``. You can add new ``models``, ``controllers``, ``views``, and configure ``routes.php`` to suit your need

Notes
-----
This framework is highly untested. Only use this framework as an educational purpose only.