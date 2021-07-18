<link href="<?php echo base_url('assets/') ?>css/video-js.min.css" rel="stylesheet">
<!-- <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet" /> -->
<!-- <link href="sea/index.css" rel="stylesheet" /> -->
<link href="<?php echo base_url('assets') ?>/css/index.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/videojs-seek-buttons/dist/videojs-seek-buttons.css" rel="stylesheet" />
<link href="<?php echo base_url('assets/') ?>css/quality-selector.css" rel="stylesheet">
   <!-- Banner Start -->
   <div class="video-container iq-main-slider">
      <video class="video d-block video-js vjs-theme-forest" 
            loop
            controls
            preload="auto"
            poster="<?php echo base_url('images/movie_banner/'.$movie_details['movie_banner']) ?>"
            data-setup='{"fluid": true}'
            id="forest-video"
            muted
      >
         <source src="https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm.720p.webm" type="video/webm" label="720P">
         <source src="https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm.480p.webm" type="video/webm" label="480P" selected="true">
         <source src="https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm.360p.webm" type="video/webm" label="360P">
         <source src="https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm.240p.webm" type="video/webm" label="240P">
      </video>
   </div>
   <!-- Banner End -->
   <!-- MainContent -->
   <div class="main-content movi">
      <section class="movie-detail container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="trending-info g-border">
                  <h1 class="trending-text big-title text-uppercase mt-0"><?php echo ($movie_details['movie_name']);  ?></h1>
                  <ul class="p-0 list-inline d-flex align-items-center movie-content">
                     <li class="text-white">Action</li>
                     <li class="text-white">Drama</li>
                     <li class="text-white">Thriller</li>
                  </ul>
                  <div class="d-flex align-items-center text-white text-detail">
                     <span class="badge badge-secondary p-3"><?php echo ($movie_details['rating']);  ?></span>
                     <span class="ml-3"><?php echo ($movie_details['total_duration']);  ?></span>
                     <span class="trending-year"><?php echo ($movie_details['release_year']);  ?></span>
                  </div>
                  <div class="d-flex align-items-center series mb-4">
                     <a href="javascript:void();"><img src="images/trending/trending-label.png" class="img-fluid"
                           alt=""></a>
                     <span class="text-gold ml-3">#2 in Series Today</span>
                  </div>
                  <p class="trending-dec w-100 mb-0"><?php echo ($movie_details['description']); ?></p>
                  <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
                     <li><span><i class="ri-add-line"></i></span></li>
                     <li><span><i class="ri-heart-fill"></i></span></li>
                     <li class="share">
                        <span><i class="ri-share-fill"></i></span>
                        <div class="share-box">
                           <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="ri-facebook-fill"></i></a>
                              <a href="#" class="share-ico"><i class="ri-twitter-fill"></i></a>
                              <a href="#" class="share-ico"><i class="ri-links-fill"></i></a>
                           </div>
                        </div>
                     </li>
                  
                  </ul>
                   <div class="d-flex align-items-center series mb-4">
                     <span class='ml-3 text-gold'><strong>Cast: </strong></span>
                   </div>
                  <?php echo ($movie_details['movie_cast']);  ?>
                   <div class="d-flex align-items-center series mt-3 mb-4">
                     <label class='ml-3 text-gold'><strong>Director:  </strong></label>
                   </div>
                   <p class="ml-3"><?php echo ($movie_details['movie_director']);  ?></p>
                   <div class="d-flex align-items-center series mb-4">
                     <span class='ml-3 text-gold'><strong>Writer:  </strong></span>
                   </div>
                   <p class="ml-3"><?php echo ($movie_details['movie_writer']);  ?></p>
               </div>
            </div>
         </div>
      </section>
      <section id="iq-favorites" class="s-margin">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 overflow-hidden">
                  <div class="iq-main-header d-flex align-items-center justify-content-between">                     
                     <h4 class="main-title"><a href="movie-category.html">More Like This</a></h4>                     
                  </div>
                  <div class="favorites-contens">
                     <ul class="list-inline favorites-slider row p-0 mb-0">
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="<?php echo base_url('images/movie_banner/6_movie_banner.jpg'); ?>" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>The Lost Journey</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">20+</div>
                                       <span class="text-white">2h 15m</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play
                                          Now</span>
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
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="images/movies/07.jpg" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>Boop Bitty</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">11+</div>
                                       <span class="text-white">2h 30m</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play
                                          Now</span>
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
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="images/movies/08.jpg" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>Unknown Land</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">17+</div>
                                       <span class="text-white">2h 30m</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play
                                          Now</span>
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
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="images/movies/09.jpg" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>Blood Block</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">13+</div>
                                       <span class="text-white">2h 40m</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play
                                          Now</span>
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
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="images/movies/10.jpg" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>Champions</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">13+</div>
                                       <span class="text-white">2h 30m</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play
                                          Now</span>
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
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section id="iq-upcoming-movie">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 overflow-hidden">
                  <div class="iq-main-header d-flex align-items-center justify-content-between">                     
                     <h4 class="main-title"><a href="movie-category.html">Upcoming Movies</a></h4>
                  </div>
                  <div class="upcoming-contens">
                     <ul class="favorites-slider list-inline  row p-0 mb-0">
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="images/upcoming/01.jpg" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>The Last Breath</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">5+</div>
                                       <span class="text-white">2h 30m</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
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
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="images/upcoming/02.jpg" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>Last Night</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">22+</div>
                                       <span class="text-white">2h 15m</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
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
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="images/upcoming/03.jpg" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>1980</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">25+</div>
                                       <span class="text-white">3h</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
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
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="images/upcoming/04.jpg" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>Looters</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">11+</div>
                                       <span class="text-white">2h 45m</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
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
                        <li class="slide-item">
                           <a href="movie-details.html">
                              <div class="block-images position-relative">
                                 <div class="img-box">
                                    <img src="images/upcoming/05.jpg" class="img-fluid" alt="">
                                 </div>
                                 <div class="block-description">
                                    <h6>Vugotronic</h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                       <div class="badge badge-secondary p-1 mr-2">9+</div>
                                       <span class="text-white">2h 30m</span>
                                    </div>
                                    <div class="hover-buttons">
                                       <span class="btn btn-hover">
                                          <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                          Play Now
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
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
<script src="https://vjs.zencdn.net/7.10.2/video.js"></script>
<script src="https://cdn.jsdelivr.net/npm/videojs-seek-buttons/dist/videojs-seek-buttons.min.js"></script>
<script src="//cdn.sc.gl/videojs-hotkeys/latest/videojs.hotkeys.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-quality-levels/2.0.9/videojs-contrib-quality-levels.min.js" integrity="sha512-zkCFMhOIASwe5fZfTUz26vG8miAAMOM6EzleZtBx28ZkCvhp7+6NVZC6iroJiNizWNh+pfQMgjo4Iv8ro9tSuw==" crossorigin="anonymous"></script>
<script type="text/javascript">
// var player = videojs('forest-video');
var options = {
                userActions: {
                  hotkeys: function(event) {
                    // `this` is the player in this context
                    // `x` key = pause
                    if (event.which === 88) {
                      this.pause();
                    }
                    // `y` key = play
                    if (event.which === 89) {
                      this.play();
                    }
                  }
                },
                nativeControlsForTouch: true,
                playbackRates: [0.5, 1, 1.5, 2]
              };
var player = videojs('forest-video', options, function onPlayerReady() {
  videojs.log('Your player is ready!');

  // In this context, `this` is the player that was created by Video.js.
  this.play();

  // How about an event listener?
  this.on('ended', function() {
    videojs.log('Awww...over so soon?!');
  });
  player.controlBar.addChild('QualitySelector');
});
player.seekButtons({
  forward: 30,
  back: 10
});
var qualityLevels = player.qualityLevels();

// disable quality levels with less than 720 horizontal lines of resolution when added
// to the list.
qualityLevels.on('addqualitylevel', function(event) {
  var qualityLevel = event.qualityLevel;

  if (qualityLevel.height >= 720) {
    qualityLevel.enabled = true;
  } else {
    qualityLevel.enabled = false;
  }
});

// example function that will toggle quality levels between SD and HD, defining and HD
// quality as having 720 horizontal lines of resolution or more
var toggleQuality = (function() {
  var enable720 = true;

  return function() {
    for (var i = 0; i < qualityLevels.length; i++) {
      var qualityLevel = qualityLevels[i];
      if (qualityLevel.height >= 720) {
        qualityLevel.enabled = enable720;
      } else {
        qualityLevel.enabled = !enable720;
      }
    }
    enable720 = !enable720;
  };
})();

var currentSelectedQualityLevelIndex = qualityLevels.selectedIndex; // -1 if no level selected

// Listen to change events for when the player selects a new quality level
qualityLevels.on('change', function() {
  console.log('Quality Level changed!');
  console.log('New level:', qualityLevels[qualityLevels.selectedIndex]);
});
</script>