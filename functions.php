<?php
if (!current_user_can('administrator')):
  show_admin_bar(false);
endif;
show_admin_bar(false);

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

register_nav_menus(array(
	'header'    => 'Верхнее меню'
));

function page_excerpt() {
    add_post_type_support('news', array('excerpt'));
    add_post_type_support( 'page', array('excerpt'));
}
add_action('init', 'page_excerpt');

define('Phn_NAME', "Контакты");
define('Phn_SINGLE', "Контакты");
define('Phn_TYPE', "phones");

add_action('wp_ajax_addFBdata','addFBdata');
add_action('wp_ajax_nopriv_addFBdata','addFBdata');

function wpbeginner_numeric_posts_nav() {
    if( is_singular() )
        return;

    global $wp_query;
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

    echo '<ul class="pagination center">' . "\n";

    if ( get_previous_posts_link() )
        printf( '<li class="waves-effect prev">%s</li>' . "\n", get_previous_posts_link('') );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        // if ( ! in_array( 2, $links ) )
        //     echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    if ( get_next_posts_link() )
        printf( '<li class="waves-effect next">%s</li>' . "\n", get_next_posts_link('') );
    echo '</ul>' . "\n";
}


if ( function_exists( 'add_theme_support' ) ){
    add_theme_support( 'post-thumbnails' );
}

function mytheme_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
?>
       <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-author vcard">
                    <?php edit_comment_link( __( 'Редактировать' ), ' ' ); ?>
                    <?php echo get_avatar( $comment->comment_author_email, $args['avatar_size']); ?>
                    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
                </div>

                <div class="comment-meta commentmetadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
                </div>

<?php if ($comment->comment_approved == '0') : ?>
                <div class="comment-awaiting-verification"><?php _e('Your comment is awaiting moderation.') ?></div>
             <br />
<?php endif; ?>
                <?php comment_text() ?>
                <div class="reply">
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
            </div>

<?php
        break;
        case 'pingback'  :
        case 'trackback' :
?>
            <li class="post pingback">
                <?php comment_author_link(); ?>
                <?php edit_comment_link( __( 'Редактировать' ), ' ' ); ?>
<?php
        break;
    endswitch;
}

function sendEmail(){
  $to  = "d.v.1970@i.ua" ;	
  $subject = "VladvaS  WooD";

  $message = $_POST['textarea1'];
  $tel = $_POST['phonenum'];
  $email = $_POST['email'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];



  $headers  = 'Content-type: text/html; charset=windows-1251 \r\n';
  $headers .= 'From: <wordpress@pilorama.test.local>\r\n';
  $headers .= 'Reply-To: \r\n';
  $message .= ' from: '. $first_name .' '. $last_name .' email: '. $email .' phone '. $tel;

  mail(
    $to,
    $subject,
    $message,
    $headers
  );
}


add_action('wp_ajax_sendEmail', 'sendEmail');
add_action('wp_ajax_nopriv_sendEmail', 'sendEmail');



// function plural_form($number, $after) {
//  $cases = array (2, 0, 1, 1, 1, 2);
//  echo $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
// }
