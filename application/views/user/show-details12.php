   <?php 
      $episode_duration = json_decode($data[0]['each_episode_duration']);
      $episode_banner = json_decode($data[0]['each_episode_banner']);
      $episode_poster = json_decode($data[0]['each_episode_poster']);
      $episode_link = json_decode($data[0]['each_episode_link']);
      $episode_name = json_decode($data[0]['each_episode_name']);
      $episode_synopsis = json_decode($data[0]['each_synopsis']);
      $common_id = $this->uri->segment(3);
      $episode_no = $episode-1;
   ?>
   <!-- Banner Start -->
   <div class="video-container iq-main-slider">
      <video class="video d-block"  loop id="my-video"
    class="video-js"
    controls
    preload="auto"
    poster="<?php echo base_url('images/series_banner/'.$episode_banner[$episode_no]) ?>"
    data-setup="{}">
         <source src="https://iqonic.design/themes/streamitnew/frontend/html/video/sample-video.mp4" type="video/mp4">
      </video>
   </div>
   <!-- Banner End -->
   <!-- MainContent -->
   <div class="main-content">
      <section class="movie-detail container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="trending-info season-info g-border">
                  <h4 class="trending-text big-title text-uppercase mt-0"><?php echo $data[0]['title'] ?></h4>
                  <div class="d-flex align-items-center text-white text-detail episode-name mb-0">
                     <span>S<?php echo $data[0]['season_number']; ?>E<?php echo $episode; ?></span>
                     <span class="trending-year"><?php echo $episode_name[$episode_no]; ?></span>
                  </div>
                  <p class="trending-dec w-100 mb-0"><?php echo $episode_synopsis[$episode_no]; ?></p>
               </div>
            </div>
         </div>
      </section>
      <section class="container-fluid seasons" id="click_btn_display">
         <div class="iq-custom-select d-inline-block sea-epi s-margin">
            <select name="cars" class="form-control season-select">
               <?php
               foreach($data as $row){?>
               <option value="<?php $row['season_number']; ?>">Season <?php echo $row['season_number']; ?></option>
               <?php }?>
            </select>
         </div>
         <ul class="trending-pills d-flex nav nav-pills align-items-center text-center s-margin" role="tablist">
            <li class="nav-item">
               <a class="nav-link active show" data-toggle="pill" href="#episodes" role="tab"
                  aria-selected="true">Episodes</a>
            </li>
         </ul>
         <div class="tab-content">
            <div id="episodes" class="tab-pane fade active show" role="tabpanel">
               <div class="block-space">
                  <div class="row">
                     <?php  
                        $j = 1;
                        for($i=0;$i<$data[0]['total_number_episode'];$i++){?>
                     <div class="col-1-5 col-md-6 iq-mb-30">
                        <div class="epi-box">
                           <div class="epi-img position-relative">
                              <img src="<?php echo base_url('images/series_banner/'.$episode_poster[$i]) ?>" class="img-fluid img-zoom" alt="">
                              <div class="episode-number"><?php echo $j; ?></div>
                              <div class="episode-play-info">
                                 <div class="episode-play">
                                    <a href="<?php echo base_url('home/series/'.$common_id.'/'.$j.''); ?>">
                                       <i class="ri-play-fill"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <div class="epi-desc p-3">
                              <div class="d-flex align-items-center justify-content-between">
                                 <span class="text-white"><?php echo $data[0]['release_year']; ?></span>
                                 <span class="text-primary"><?php echo $episode_duration[$i]; ?></span>
                              </div>
                              <a href="show-details.html">
                                 <?php echo $episode_synopsis[$i]; ?>
                              </a>
                           </div>
                        </div>
                     </div>
                     <?php $j+=1; }?>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>