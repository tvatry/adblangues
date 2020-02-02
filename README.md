# adblangues

As part of its Quality, Safety and Environment (QSE) policy, PROMEO is moving towards the dematerialization of documents related to its business workflow. Indeed, after a customer satisfaction dematerialization campaign on the work-study part, PROMEO wishes to continue on the continuous training part. This is why PROMEO wished to develop an application to analyze the needs of the employees of the Languages division. This application aims to dematerialize the analysis of language training needs. It is presented under two aspects. An application intended for PROMEO's customers. Another access for PROMEO employees.

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
