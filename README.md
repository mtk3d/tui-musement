# TUI Musement CLI

Author: **Mateusz Cholewka** from **Boldare**

```shell
TuiMusementCli v0.0.1

Usage:
  command

Available commands:
  help         Display help for a command
  list         List commands
  list:cities  List all cities from TuiMusement with Weather
```

### API Design

The second part of the test is placed in [`doc/api`](doc/api/README.md) directory.

## :rocket: Running

Requirements:
- php 8.0 >=

To run this CLI in local environment, you need to execute:

```shell
make install
```

Next you need to add your authorization key for weather API in `config/parameters.yml`:

```yaml
parameters:
  # ...
  weather_api_key: '[your weather api key]'
```

And then you should be ready to run the `cli`:

```shell
./bin/cli
```

## :whale: Docker environment

If you want to run the application in docker container, run:

```shell
make build
```

This command will build the docker image tagged as `musement-cli`. To use this container:

```shell
docker run -it --rm -e WEATHER_API_KEY=[your weather api key] musement-cli
```

## :bricks: Contributing

[Go to contributing documentation](CONTRIBUTING.md)

## :building_construction: Architecture

The CityWeather module placed in `src` directory is split to three layers `model`, `application`, `infrastructure`.
- `Model` contains all resources and interfaces, for handle basic application business requirements. It cannot depend on any other layers.
- `Application` contains interface for application output. This layer depends on model layer.
- `Infrastructure` is the layer with infrastructural dependencies. In this case there are the APIClients implemented and the repositories which are based on the APIClients.

Code responsible for CLI interface code is placed in `app` directory. This code is joining the application core code with user interface code that depends on framework.

This architecture enables us to clearly decouple model layer from external services layer, and to reuse the model when for example we need to use the database as a data source. To do that, we need just to implement another repositories based on the same interfaces.
The API Clients replacement is also possible. If we want to use for example an official SDK, we can just create an adapter that implements existing API Client interfaces.

Splitting code to the modules part and the application part gives us a possibility to reuse the same modules with other user interfaces like for example the REST API, or even to use it with another framework configuration.
