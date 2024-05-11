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
            if( !empty(get_post_meta( get_the_ID(),'show_breadcrumbs', true )) && get_post_meta( get_the_ID(),'show_breadcrumbs', true ) == 1 ){
                $show_breadcrumb = 1;
            }elseif( !empty(get_post_meta( get_the_ID(),'show_breadcrumbs', true )) && get_post_meta( get_the_ID(),'show_breadcrumbs', true ) == 0 ){
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
                        <h1><?php echo get_the_title(); ?></h1>
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

                    $image1 = get_post_meta( get_the_ID(), 'project_image1', 1 );
                    $image2 = get_post_meta( get_the_ID(), 'project_image2', 1 );
                    $image3 = get_post_meta( get_the_ID(), 'project_image3', 1 );
                ?>
                    <?php if( !empty($image1) || !empty($image2) || !empty($image3) ): ?>
                    <div class="project-images">
                        <?php if(!empty($image1)){ ?>
                            <div class="item">
                                <img src="<?php echo esc_url($image1); ?>">
                            </div>
                        <?php } ?>

                        <?php if(!empty($image2)){ ?>
                            <div class="item">
                                <img src="<?php echo esc_url($image2); ?>">
                            </div>
                        <?php } ?>

                        <?php if(!empty($image3)){ ?>
                            <div class="item">
                                <img src="<?php echo esc_url($image3); ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <?php endif; ?>
					
					<div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="project-info">
                                <?php 
                                    $client = get_post_meta( get_the_ID(), 'client_name', true );
                                    $duration = get_post_meta( get_the_ID(), 'project_duration', true );
                                    $task = get_post_meta( get_the_ID(), 'project_task', true );
                                ?>

                                <div class="single-item">
                                    <h3 class="title"><?php echo esc_html__( 'Project Name', 'busicon' ); ?></h3>
                                    <p class="description"><?php the_title(); ?></p>
                                </div>

                                <?php if(!empty($client)){ ?>
                                    <div class="single-item">
                                        <h3 class="title"><?php echo esc_html__( 'Client', 'busicon' ); ?></h3>
                                        <p class="description"><?php echo esc_html($client); ?></p>
                                    </div>
                                <?php } ?>
                                    
                                <?php if(!empty($duration)){ ?>
                                    <div class="single-item">
                                        <h3 class="title"><?php echo esc_html__( 'Duration', 'busicon' ); ?></h3>
                                        <p class="description"><?php echo esc_html($duration); ?></p>
                                    </div>
                                <?php } ?>
                                    
                                <?php if(!empty($task)){ ?>
                                    <div class="single-item">
                                        <h3 class="title"><?php echo esc_html__( 'Task', 'busicon' ); ?></h3>
                                        <p class="description"><?php echo esc_html($task); ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-8">
                            <div class="details">
                                <div class="busicon-block block-1">
                                    <div class="text">
                                        <?php echo wpautop( get_post_meta( get_the_ID(), 'block_1_description', true ) ); ?>
                                    </div>
                                </div>
                                <div class="busicon-block block-2">
                                    <div class="text">
                                        <?php echo wpautop( get_post_meta( get_the_ID(), 'block_2_description', true ) ); ?>
                                    </div>
                                    <?php
                                        $block_2_img = get_post_meta( get_the_ID(), 'block_2_img', 1 );
                                        if(!empty($block_2_img)):
                                    ?>
                                        <div class="image">
                                            <img src="<?php echo esc_url($block_2_img); ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="busicon-block block-3">
                                    <?php
                                        $block_3_img = get_post_meta( get_the_ID(), 'block_3_img', 1 );
                                        if(!empty($block_3_img)):
                                    ?>
                                        <div class="image">
                                            <img src="<?php echo esc_url($block_3_img); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="text">
                                        <?php echo wpautop( get_post_meta( get_the_ID(), 'block_3_description', true ) ); ?>
                                    </div>
                                </div>
                                <div class="busicon-block block-4">
                                    <div class="text">
                                        <?php echo wpautop( get_post_meta( get_the_ID(), 'block_4_description', true ) ); ?>
                                    </div>
                                </div>
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
