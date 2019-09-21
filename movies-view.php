<?php
/*
Plugin Name: Список фильмов
Description: Плагин для вывода фильмов списком через шорткод
Version: 1.0.0
Author: Ivan Dedov
Author URI: http://store2.altervista.org
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
define( 'FELIX_PLUGIN', __FILE__ );
define( 'WPCF7_PLUGIN_DIR', untrailingslashit( dirname( WPCF7_PLUGIN ) ) );
define( 'MOVIES_VERSION', 1.0 );

require_once dirname(__FILE__).'/activate.php';
require_once dirname(__FILE__).'/deactivate.php';

register_activation_hook(__FILE__, 'moviesview_activate');
register_deactivation_hook(__FILE__, 'moviesview_deactivate');

function moviesview_scripts(){
	wp_register_style('movies-view', plugins_url('/css/movies-view.css', __FILE__ ), false, MOVIES_VERSION,'all');

	wp_enqueue_style('movies-view');

	wp_register_script( 'movies-view', plugin_dir_url(__FILE__).'/js/movies-view.js', array('jquery'), MOVIES_VERSION, true);
	wp_enqueue_script( 'movies-view');
}
add_action( 'wp_enqueue_scripts', 'moviesview_scripts' );

function moviesview_admin_menu(){
	$settingsPage = add_options_page('Настройка плагина списка фильмов', 'Список фильмов', 'manage_options', __FILE__, 'movies_view');

}


function movies_view(){

	?>

	<div class="wrap">
		<h2>Настройка вывода списка фильмов</h2>
	
	</div>

	<?php
}

add_action('admin_menu', 'moviesview_admin_menu');


function moviesview_shortcode(){
	// номер страницы пагинации
	$paged = max( 1, get_query_var('page') );
	// аргументы для запроса

	// списко постов
	$postslist = new WP_Query(array(
		'posts_per_page' => 5,
		'paged' => $paged,
		'post_type' => 'movies'
		));
		
	// еонтент для вывода
	$data = "";
	//var_dump($postslist);
	if ( $postslist->have_posts() ){
		while ( $postslist->have_posts() ) : $postslist->the_post(); 
		
			$data .= '
				<div class="col-sm-6">
					<h3>'.get_the_title().'</h3>
					<div>'.mb_substr(get_the_content(), 0, 200).'...</div>
					<p>
						<a class="btn btn-primary" href="'.get_permalink().'" class="btn btn-lg btn-outline"">Перейти</a>
					</p>
					
				</div>
			';
		endwhile;
	}else{
		$data = "<p>Фильмы отсутствуют</p>";
	}
	
	$template = '
		<div class="row bs-downloads">'.
		$data
		.'</div>
	';
	wp_reset_postdata();

	// пагинация для произвольного запроса
	$big = 999999999; // уникальное число

	echo paginate_links( array(
		'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'  => '?paged=%#%',
		'current' => $paged,
		'total'   => $postslist->max_num_pages
	) );

	return $template;
}
add_shortcode('movies_view', 'moviesview_shortcode');