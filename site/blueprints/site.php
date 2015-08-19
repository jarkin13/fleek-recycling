<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: default
fields:
  title:
    label: Title
    type:  text
  author:
    label: Author
    type:  text
  description:
    label: Description
    type:  textarea
  environment:
    label: Environment
    type: select
    options: 
      localhost: Localhost
      staging: Staging
      production: Production
  keywords:
    label: Keywords
    type:  tags
  copyright:
    label: Copyright
    type:  textarea