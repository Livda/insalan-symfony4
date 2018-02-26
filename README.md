# Insalan.fr based on Symfony 4

Website to handle esport tournament

## Installation

### Requirements

- PHP 7.1 or higher: https://secure.php.net/downloads.php
- composer 1.6 or higher: https://getcomposer.org/download/
- yarn 1.3 or higher: https://yarnpkg.com/lang/en/docs/install/
- mariadb 10.1 or higher: https://mariadb.com/downloads/mariadb-tx

### Backend installation

When both PHP and composer are installed and added to your PATH (which should be done automatically if you've installed 
them from your distribution's package manager), you need to run this command:

```bash
$ composer install
```

This command will download all the vendors required for the project (backend stuff to put it simply). 

To populate your database run the following commands:
```bash
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:create
$ php bin/console doctrine:fixtures:load
```

### Frontend installation

As for the backend, you'll need to run this command:

```bash
$ yarn install
```

This command will fetch all the assets needed like the JS lib for the project (frontend stuff to put it simply). Then
this command build all the assets (images, CSS, JS, ...):

```bash
$ yarn build
```

## Start the project

### Dev

You can run the developement server provided by PHP with this following command:
```bash
$ php -S 127.0.0.1:8000 -t public
```

The website is accessible at this URL : `http://127.0.0.1:8000`. It's ONLY a dev server. DON'T USE IT IN PRODUCTION.

## Recommendations

### Extensions
On your text editor or your IDE, add the [EditorConfig](http://editorconfig.org/) extension to have a cleaner code.

If you have a Symfony 4 compatible extension install it ! You'll have never too much help.

### Editors

- [PHPStorm](https://www.jetbrains.com/phpstorm/) is a very powerful IDE with a lot a of features built-in. 
A must have if you want to have a smooth experience, but it require a JetBrains account (which you could have for free 
if you are a student)
- [Visual Studio Code](https://code.visualstudio.com/) is a good free and open-source alternative. If you want to 
be very productive, the [PHP IntelliSense](https://github.com/felixfbecker/vscode-php-intellisense) is mandatory
- [Vim](https://github.com/vim/vim) if you know it, you know how to configure it properly. If not RTFM (you're welcome)
- [sed](https://www.gnu.org/software/sed/) stop being an hipster and use a usable text-editor
