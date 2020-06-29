# adblangues
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/faba57449bcd43c7835f1c42f93e1725)](https://www.codacy.com/manual/tvatry/adblangues?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=tvatry/adblangues&amp;utm_campaign=Badge_Grade)

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/83914a00a8fc4bce9913193b63ef120c)](https://app.codacy.com/manual/tvatry/adblangues?utm_source=github.com&utm_medium=referral&utm_content=tvatry/adblangues&utm_campaign=Badge_Grade_Settings)

As part of its Quality, Safety and Environment (QSE) policy, PROMEO is moving towards the dematerialization of documents related to its business workflow. Indeed, after a customer satisfaction dematerialization campaign on the work-study part, PROMEO wishes to continue on the continuous training part. This is why PROMEO wished to develop an application to analyze the needs of the employees of the Languages division. This application aims to dematerialize the analysis of language training needs. It is presented under two aspects. An application intended for PROMEO's customers. Another access for PROMEO employees.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
Lamp server or Wamp or Laragon, composer and php >= 7.2
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
