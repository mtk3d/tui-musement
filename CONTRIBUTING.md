# :bricks: Contributing

## Makefile

This project is using Makefile for defining development commands. If you want to use new tool that requires
to run some command, you should create the new Makefile target with it.  
If the target is not referring to the file, pleas not forget to add it to `.PHONY` targets. 

Makefile targets should be redundant if possible. That means that running same command a few times,
should give the same result every time.

Please try to not brake the rule that the `install` command should be atomic, and should makes everything required
to run the project. No more commands should be required.

Every new target that can be executed as a command, should contain the comment started with `##`.
All those comments are parsed by the help command.

The targets that are commands, should be as shor and as descriptive as possible. The best would be one-word commands.

## Unit Tests

Every new feature should have a test. All tests are placed in the `test` directory.  

In this project there is PHPUnit already configured. To run tests, run:

```shell
make test
```

## Coding Standards & Static Analysis

This project is using PHPStan for static analyses. It helps to keep project in the best condition.
It's configured to level 9, and you should keep this level in your code.

For coding standards there is a php-cs-fixer configured and used.

To run checks of those two commands, run:

```shell
make check
```

To automatically fix the php-cs-fixer problems, run:

```shell
make beautify
```

## Documentation

The documentation is placed in `doc` directory in this repo. You should update it on your every change if it's required.

---

Thank you very much for contribution!
