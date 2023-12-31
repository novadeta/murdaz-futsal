<?php
  $url = "http://" . $_SERVER['SERVER_NAME'] . "/futsal/public";
 ?>
<!DOCTYPE html>
<html class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? "Murdaz Futsal"; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= $url ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="<?= $url ?>/assets/css/guest.css" rel="stylesheet" />
    <link href="<?= $url ?>/assets/css/<?=  $guest ?? ''; ?>" rel="stylesheet" />
    <link href="<?= $url ?>/assets/css/output.css" rel="stylesheet" />
  </head>

