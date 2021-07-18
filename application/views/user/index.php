   
      <!-- Slider Start -->
      <section id="home" class="iq-main-slider p-0">
         <div id="home-slider" class="slider m-0 p-0">
            
            <?php 
               $no = 1;
               foreach($final_result as $row){

               $banner_img = $row[0]['type'] == 1? $row[0]['movie_banner']:$row[0]['series_banner'];
               $upload_img_path = $row[0]['type'] == 1? "movie_banner" : "series_banner"; 
               $type_url = $row[0]['type'] == 1? "movie" : "series"; 
               $title = $row[0]['type'] == 1? 'Movie':$row[0]['title'];
               $content = $this->uri->segment(1);
               

            ?>

            <div class="slide slick-bg s-bg-1" style="background-image: url(<?php echo base_url('images/'.$upload_img_path.'/'.$banner_img.'') ?>);">
               <div class="container-fluid position-relative h-100">
                  <div class="slider-inner h-100">
                     <div class="row align-items-center  h-100">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                           <a href="javascript:void(0);">
                              <div class="channel-logo" data-animation-in="fadeInLeft" data-delay-in="0.5">
                                  <a href="<?php echo base_url('home/show_detail/'.$type_url.'/'.$row[0]["common_id"].'')?>" tabindex="0">
                                    <img src="<?php echo base_url('images/'.$upload_img_path.'/'.$banner_img.'') ?>" class="c-logo" alt="streamit">
                                  </a>
                              </div>
                           </a>
                           <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft"
                              data-delay-in="0.6"><?php echo $row[0]['title']; ?></h1>
                           <div class="d-flex align-items-center" data-animation-in="fadeInUp" data-delay-in="1">
                              <span class="badge badge-secondary p-2"><?php echo $row[0]['rating']; ?></span>
                              <span class="ml-3"><?php echo $title; ?></span>
                           </div>
                           <?php echo $row[0]['description']; ?>
                           <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp" data-delay-in="1.2">
                              <a href="<?php echo base_url('home/show_detail/'.$type_url.'/'.$row[0]["common_id"].'')?>" class="btn btn-hover"><i class="fa fa-play mr-2"
                                 aria-hidden="true"></i>View Now</a>
                              <a href="<?php echo base_url('home/show_detail/'.$type_url.'/'.$row[0]["common_id"].'')?>" class="btn btn-link">More details</a>
                           </div>
                        </div>
                     </div>
                     <div class="trailor-video">
                        <a href="video/trailer.mp4" class="video-open playbtn">
                           <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                              x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7"
                              enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                              <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10"
                                 points="73.5,62.5 148.5,105.8 73.5,149.1 " />
                              <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
                           </svg>
                           <span class="w-trailor">Watch Trailer</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         <?php $no++; }?>
         </div>
         <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
               fill="none" stroke="currentColor">
               <circle r="20" cy="22" cx="22" id="test"></circle>
            </symbol>
         </svg>
      </section>
      <!-- Slider End -->
      <!-- MainContent -->
      <div class="main-content">
         <section id="iq-upcoming-movie">
            <div class="container-fluid">
               <div class="row">
                   <!--   <div class="col-sm-12 overflow-hidden">
                         <?php
                             
                              //foreach ($product_data as $product_row) {
                           ?>
                           <div class="iq-main-header d-flex align-items-center justify-content-between">                        
                              <h4 class="main-title"><a href="movie-category.html"><?php //echo $product_row['content_name'] ?></a></h4>
                           </div>

                              <div class="upcoming-contens">
                                 <ul class="favorites-slider list-inline row p-0 mb-0">
                                    <?php

                                       //foreach ($product_row as $row) {
                                          ?> 
                                          <li class="slide-item">
                                             <a href="<?php //echo base_url('home/show_detail/movie/1')?>">
                                                <div class="block-images position-relative">
                                                   <div class="img-box">
                                                      <img src="<?php //echo base_url('images/movie_banner/1_movie_banner.jpg') ?>" class="img-fluid" alt="">
                                                   </div>
                                                   <div class="block-description">
                                                      <h6>jfh,</h6>
                                                      <div class="movie-time d-flex align-items-center my-2">
                                                         <div class="badge badge-secondary p-1 mr-2">dghvbjn</div>
                                                         <span class="text-white"><?php //echo 'hii'; ?></span>
                                                      </div>
                                                      <div class="hover-buttons">
                                                         <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                         View Now
                                                         </span>
                                                      </div>
                                                   </div>
                                                   <div class="block-social-info">
                                                      <ul class="list-inline p-0 m-0 music-play-lists">
                                                         <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                                         <li><span><i class="ri-heart-fill"></i></span></li>
                                                         <li><span><i class="ri-add-line"></i></span></li>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </a>
                                          </li>
                                       <?php //}?>
                                    </ul>
                                 </div>
                           <?php   
                              //}
                            
                           ?>
                   </div> -->
                  <?php
                     if($content == "" || $content == "movies" || $content == "home"){?>
                        <div class="col-sm-12 overflow-hidden">
                           <div class="iq-main-header d-flex align-items-center justify-content-between">                        
                              <h4 class="main-title"><a href="movie-category.html">Movies</a></h4>
                           </div>
                           <div class="upcoming-contens">
                              <ul class="favorites-slider list-inline row p-0 mb-0">
                                 <?php
                                    foreach ($movie_list as $movie_row) { 
                                       $duration = $movie_row['total_duration'] <= 60 ? $movie_row['total_duration'] .'m': $movie_row['total_duration']/60 .'h';
                                 ?>
                                       <li class="slide-item">
                                          <a href="<?php echo base_url('home/show_detail/movie/'.$movie_row['common_id'])?>">
                                             <div class="block-images position-relative">
                                                <div class="img-box">
                                                   <img src="<?php echo base_url('images/movie_banner/'.$movie_row['movie_poster']) ?>" class="img-fluid" alt="">
                                                </div>
                                                <div class="block-description">
                                                   <h6><?php print_r($movie_row['title']) ?></h6>
                                                   <div class="movie-time d-flex align-items-center my-2">
                                                      <div class="badge badge-secondary p-1 mr-2"><?php print_r($movie_row['rating']) ?></div>
                                                      <span class="text-white"><?php echo $duration; ?></span>
                                                   </div>
                                                   <div class="hover-buttons">
                                                      <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                      View Now
                                                      </span>
                                                   </div>
                                                </div>
                                                <div class="block-social-info">
                                                   <ul class="list-inline p-0 m-0 music-play-lists">
                                                     <li><span><i class="ri-whatsapp-line"></i></span></li>
                                                     <li><span><i class="ri-facebook-fill"></i></span></li>
                                                     <li><span><i class="ri-twitter-fill"></i></span></li>
                                                     <li><span><i class="ri-links-fill"></i></span></li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </a>
                                       </li>
                                 <?php } ?>
                              </ul>
                           </div>
                        </div>
                     <?php }?>
                              
                     <?php if($content == "" || $content == "series" || $content == "home"){ ?>
                           <div class="col-sm-12 overflow-hidden">
                              <div class="iq-main-header d-flex align-items-center justify-content-between">                        
                                 <h4 class="main-title"><a href="movie-category.html">Series</a></h4>
                              </div>
                              <div class="upcoming-contens">
                                 <ul class="list-inline row p-0 mb-0" id="series-slider">
                                    <?php
                                       foreach ($series_list as $series_row) {
                                       $duration = $series_row['total_duration'] <= 60 ? $series_row['total_duration'] .'m': $series_row['total_duration']/60 .'h';
                                    ?>
                                       <li class="slide-item">
                                          <a href="<?php echo base_url('home/show_detail/series/'.$series_row['common_id'].'')?>">
                                             <div class="block-images position-relative">
                                                <div class="img-box">
                                                   <img src="<?php echo base_url('images/series_banner/'.$series_row['series_poster']) ?>" class="img-fluid" alt="">
                                                </div>
                                                <div class="block-description">
                                                   <h6><?php print_r($series_row['title']) ?></h6>
                                                   <div class="movie-time d-flex align-items-center my-2">
                                                      <div class="badge badge-secondary p-1 mr-2"><?php print_r($series_row['rating']) ?></div>
                                                      <span class="text-white"><?php echo $duration; ?></span>
                                                   </div>
                                                   <div class="hover-buttons">
                                                      <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                      View Now
                                                      </span>
                                                   </div>
                                                </div>
                                                <div class="block-social-info">
                                                   <ul class="list-inline p-0 m-0 music-play-lists">
                                                      <li><span><i class="ri-whatsapp-line"></i></span></li>
                                                      <li><span><i class="ri-facebook-fill"></i></span></li>
                                                      <li><span><i class="ri-twitter-fill"></i></span></li>
                                                      <li><span><i class="ri-links-fill"></i></span></li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </a>
                                       </li>   
                                    <?php } ?>
                                 </ul>
                              </div>
                           </div>
                        <?php }?>

                        <?php if($content == "" || $content == "drama" || $content == "home"){?>

                                 <div class="col-sm-12 overflow-hidden">
                                    <div class="iq-main-header d-flex align-items-center justify-content-between">                        
                                       <h4 class="main-title"><a href="movie-category.html">Drama</a></h4>
                                    </div>
                                    <div class="upcoming-contens">
                                       <ul class="favorites-slider list-inline row p-0 mb-0">
                                       <?php
                                          foreach ($drama_list as $drama_row) { 
                                             $duration = $drama_row['total_duration'] <= 60 ? $drama_row['total_duration'] .'m': $drama_row['total_duration']/60 .'h';
                                             ?>

                                             <li class="slide-item">
                                                <a href="<?php echo base_url('home/show_detail/movie/'.$drama_row['common_id'])?>">
                                                   <div class="block-images position-relative">
                                                      <div class="img-box">
                                                         <img src="<?php echo base_url('images/movie_banner/'.$drama_row['movie_poster']) ?>" class="img-fluid" alt="">
                                                      </div>
                                                      <div class="block-description">
                                                         <h6><?php print_r($drama_row['title']) ?></h6>
                                                         <div class="movie-time d-flex align-items-center my-2">
                                                            <div class="badge badge-secondary p-1 mr-2"><?php print_r($drama_row['rating']) ?></div>
                                                            <span class="text-white"><?php echo $duration; ?></span>
                                                         </div>
                                                         <div class="hover-buttons">
                                                            <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                            View Now
                                                            </span>
                                                         </div>
                                                      </div>
                                                      <div class="block-social-info">
                                                         <ul class="list-inline p-0 m-0 music-play-lists">
                                                             <li><span><i class="ri-whatsapp-line"></i></span></li>
                                                             <li><span><i class="ri-facebook-fill"></i></span></li>
                                                             <li><span><i class="ri-twitter-fill"></i></span></li>
                                                             <li><span><i class="ri-links-fill"></i></span></li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </a>
                                             </li>
                                                
                                          <?php   }?>
                                       </ul>
                                    </div>
                                 </div>
                              <?php }?>
                        </div>
                     </div>
                  </section>
               </div>
