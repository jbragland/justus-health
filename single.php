<?php

$context = Timber::context();
$post = Timber::query_post();

$context['post'] = $post;
$context['title'] = $post->title;
$context['breadcrumbs'] = bcn_display(true);
$context['sidebar'] = true;

if (post_password_required($timber_post->ID)) {
    $context['sidebar'] = true; // for .container and line length
    Timber::render('page-password.twig', $context);
} else {
    Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}
