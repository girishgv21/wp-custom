<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title>Document</title>
</head>
<body>
    <?php
    if (have_posts()) {
        if ( is_user_logged_in() ) :
            echo 'Welcome, registered user!';
        else :
            echo 'Welcome, visitor!';
        endif;
        while (have_posts()) {
            the_post();
            ?>
            <div>
                <h4><?php the_title(); ?></h4>
                <div><?php the_excerpt(); ?></div>
            </div>
            <?php
        }
    }

    $response = wp_remote_get( 'https://wptavern.com/wp-json/wp/v2/posts' );
    ?>

    <?php wp_footer(); ?>
</body>
</html>