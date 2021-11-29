<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(__DIR__);

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@Symfony' => true,
    '@DoctrineAnnotation' => true,
    '@PHP70Migration' => true,
    'concat_space' => ['spacing' => 'one'],
    'phpdoc_var_without_name' => false,
    'declare_strict_types' => false,
    'phpdoc_line_span' => ['property' => 'single'],
])
    ->setFinder($finder)
    ;
