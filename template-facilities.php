<?php 
/*
Template Name: Facilities Template
*/ 
get_header(); ?>

<section id="<?php the_title();?>-page" class="container">
    <div class="row" id="facilities-section">
		<div class="col-md-5">
            <h2 class="facilities-title"><?php the_title();?></h2>
        </div>
        <div class="col-md-7">
            <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content();?> 
            <?php endwhile; endif; ?>
            <?php wp_reset_postdata();?>
		</div>
	</div>
</section>

<section id="facilities" class="container-fluid">
    <section class="container">
    	<div class="row" id="gallery-section">
            <div class="col-md-12">
            <h2>Οι χώροι μας</h2>
            </div>
            <div id="photos" class="col-md-12">
                <?php 
                    $gallery = get_field('facility-gallery');
                if( $gallery ): ?>
                <?php $i=0; foreach( $gallery as $gall ): ?>
                    
                <a data-target="#facilities-carousel" data-slide-to="<?php echo $i;?>">
                    <img class="single-image" data-toggle="modal" data-target="#gallerymodal" src="<?php echo $gall['url']; ?>" /> 
                </a>
                <?php $i++; endforeach; ?>
                <?php endif; ?>
                <div id="gallerymodal" class="modal fade" role="dialog" tabindex='-1'>
                    <div class="modal-dialog" id="custom-dialog">
                        <div class="fixed-overlay">
                            <div id="facilities-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                <?php if( $gallery ): ?>
                                <?php $j=0; foreach( $gallery as $gall ): ?>
                                    <div class="item <?php if( $j==0 ){ echo 'active'; };?>">
                                        <img class="img-responsive" src="<?php echo $gall['url']; ?>" />
                                    </div>
                                <?php $j++; endforeach; ?>
                                <?php endif; ?>
                                </div>
                                <a class="left carousel-control" href="#facilities-carousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#facilities-carousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="section-overlay">
                                <span class="close-modal" data-dismiss="modal">x</span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
	</section>
</section>



<?php get_footer(); ?>