<?php
/**
 * The template for displaying all single portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Busicon
 */

global $busicon_opt;

get_header();
?>

    <?php
        $show_breadcrumb = 1;

        if( class_exists( 'Redux_Framework_Plugin' ) && $busicon_opt['breadcrumb_switch'] == 1 ){
            $show_breadcrumb = 1;
            if( get_post_meta( get_the_ID(),'show_breadcrumbs', true ) == 1 ){
                $show_breadcrumb = 1;
            }elseif( get_post_meta( get_the_ID(),'show_breadcrumbs', true ) == 0 ){
                $show_breadcrumb = 0;
            }
        }elseif( class_exists( 'Redux_Framework_Plugin' ) && $busicon_opt['breadcrumb_switch'] == 0 ){
            $show_breadcrumb = 0;
        }
    ?>

    <?php if( $show_breadcrumb == 1 ){ ?>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="text-wrapper">
                    <div class="title">
                        <h1><?php wp_title(''); ?></h1>
                    </div>
                    <div class="breadcrumb-items">
                        <?php busicon_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
	
        <div class="portfolio-details">
            <div class="container">
			
				<?php
				while ( have_posts() ) :
					the_post();

					?>
					<div class="portfolio-thumb">
						<?php the_post_thumbnail(); ?>
					</div>
					
					<div class="row">
                        <div class="col-md-6 col-lg-8 order-2 order-md-1">
                            <?php the_content(); ?>
                            <div class="row mt-5">
                                <?php
                                    $image = get_post_meta( get_the_ID(), 'project_image', 1 );
                                    $description = get_post_meta( get_the_ID(), 'project_description', true );
                                ?>
                                <div class="col-lg-6">
                                    <img src="<?php echo esc_url($image); ?>">
                                </div>
                                <div class="col-lg-6">
                                    <div class="project-content">
                                        <?php
                                            $allowed_html = array(
                                                'a' => array(
                                                    'href' => array(),
                                                    'title' => array(),
                                                ),
                                                'h1' => array(),
                                                'h2' => array(),
                                                'h3' => array(),
                                                'h4' => array(),
                                                'h5' => array(),
                                                'h6' => array(),
                                                'p' => array(),
                                                'ul'    => array(),
                                                'li'    => array(),
                                            );
                                        ?>
                                        <?php echo wp_kses($description, $allowed_html); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                
                                the_post_navigation(
                                    array(
                                        'prev_text' => '<i class="bi bi-chevron-double-left"></i><span class="nav-subtitle">' . esc_html__( 'Previous Portfolio', 'busicon' ) . '</span>',
                                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Portfolio', 'busicon' ) . '</span><i class="bi bi-chevron-double-right"></i>',
                                    )
                                );
                                
                            ?>
    					</div>
    					<div class="col-md-6 col-lg-4 order-1 order-md-2">
                            <div class="project-info">
                                <h3 class="title"><?php echo esc_html__('Project Information', 'busicon'); ?></h3>
                                <ul>
                                    <?php 
                                        $client = get_post_meta( get_the_ID(), 'client_name', true );
                                        $category = get_post_meta( get_the_ID(), 'project_cat', true );
                                        $cost = get_post_meta( get_the_ID(), 'project_cost', true );
                                        $start_date = get_post_meta( get_the_ID(), 'project_start_date', true );
                                        $end_date = get_post_meta( get_the_ID(), 'project_end_date', true );
                                    ?>
                                    <?php if(!empty($client)){ ?>
                                    <li><span><?php echo esc_html__( 'Clients:', 'busicon' ); ?></span><?php echo esc_html($client); ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($category)){ ?>
                                    <li><span><?php echo esc_html__( 'Category:', 'busicon' ); ?></span><?php echo esc_html($category); ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($cost)){ ?>
                                    <li><span><?php echo esc_html__( 'Cost:', 'busicon' ); ?></span><?php echo esc_html('$'); echo esc_html($cost); ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($start_date)){ ?>
                                    <li><span><?php echo esc_html__( 'Start Date:', 'busicon' ); ?></span><?php echo esc_html($start_date); ?></li>
                                    <?php } ?>
                                    
                                    <?php if(!empty($end_date)){ ?>
                                    <li><span><?php echo esc_html__( 'End Date:', 'busicon' ); ?></span><?php echo esc_html($end_date); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
    					</div>
					</div>
					<?php
                    
				endwhile; // End of the loop.
				?>
            </div>
        </div>
    
<?php
get_footer();
