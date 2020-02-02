# adblangues

One Paragraph of project description goes here

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
Lamp server or Wamp, composer and php >= 7.2
```

### Installing

A step by step series of examples that tell you how to get a development env running

First, clone the project

```
git clone https://github.com/tvatry/adblangues.git
```

After

```
composer install
```

Edit the .env file and run

```
php bin/console doctrine:schema:create
```

And for load fixtures run 

```
php bin/console doctrine:fixtures:load
```

## Authors

* **CO BTS SIO 21 and Mr Lemoine Sébastien** 


## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
