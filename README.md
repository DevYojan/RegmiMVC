# Welcome to the RegmiMVC framework
This is a simple MVC framework for building web applications in PHP. It's free and [open-source](https://github.com/devYojan/RegmiMVC/blob/master/LICENSE).

It was created to understand the MVC pattern and workflow.

## Starting an application using this framework
1. First, download the framework, either directly or by cloning the repo.
2. Composer Update (May be not neccessary).
3. Modify **.htaccess** files in root and public directory and enter your root folder name.
3. Open config/onfig.php and modify the constants according to your environment.
4. Add controllers, views and models.
5. **Make Something**

See below for more details.

## Routing
The framework assumes URL format is **controller/method/parameter**.
The default controller is Home and default method is index.

## Controllers
Controllers are stored in App/Controllers.

## Views
Views are stored in App/Views.

## Models
Models are stored in App/Models.