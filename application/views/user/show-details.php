<?php
      $common_id = $this->uri->segment(3);
      $episode = $this->uri->segment(4);
      $episode_duration = json_decode($data[0]['each_episode_duration']);
      $episode_banner = json_decode($data[0]['each_episode_banner']);
      $episode_poster = json_decode($data[0]['each_episode_poster']);
      $episode_link = json_decode($data[0]['each_episode_link']);
      $episode_name = json_decode($data[0]['each_episode_name']);
      $episode_synopsis = json_decode($data[0]['each_synopsis']);
      $episode_no = $episode-1;
      $movie_view = $purchased == ""? $data[0]['series_trail_link'] : (($timer == "" || $timer->status == 0) ? $episode_link[$episode_no]: $data[0]['series_trail_link']);

      $buy_now = $purchased == ""? "not_purchased" : (($timer == "" || $expired == "") ? '' : "not_purchased");
?>
<!-- <link href="<?php //echo base_url('assets/') ?>css/video-js.min.css" rel="stylesheet"> -->
<!--<link href="https://unpkg.com/video.js@7.5.4/dist/video-js.css" rel="stylesheet">-->
<link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet" />
<!-- <link href="sea/index.css" rel="stylesheet" /> -->
<link href="<?php echo base_url('assets') ?>/css/index.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/videojs-seek-buttons/dist/videojs-seek-buttons.css" rel="stylesheet" />
<link href="<?php echo base_url('assets/') ?>css/quality-selector.css" rel="stylesheet">
<!-- Banner Start -->
<div class="video-container iq-main-slider">
	<video class="video d-block video-js vjs-theme-forest" loop controls preload="auto" poster="<?php echo base_url('images/series_banner/'.$episode_banner[$episode_no]) ?>" id="forest-video">
	</video>
	<style type="text/css">
		.seek-controllers {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 100%;
			height: 20%;
			text-align: center;
			color: #fff;
		}
		.seek-controllers button {
			background: 0 0;
			border: none;
			color: inherit;
			display: inline-block;
			font-size: inherit;
			line-height: inherit;
			text-transform: none;
			text-decoration: none;
			transition: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			margin: 0 100px;
			font-size: 100px;
		}
		.seek-controllers .play-button {
			font-family: VideoJS;
			font-weight: 400;
			font-style: normal;
			content: "\f101";
			font-size: 100px;
			line-height: 1.5em;
			height: 1.63332em;
			width: 3em;
			display: block;
			position: absolute;
			padding: 0;
			cursor: pointer;
			opacity: 1;
			border: 0.06666em solid #fff;
			background-color: #2b333f;
			background-color: rgba(43, 51, 63, 0.7);
			border-radius: 0.3em;
			transition: all 0.4s;
			top: 0;
			left: 0;
		}
		@media only screen and (max-width: 600px) {
			.seek-controllers button {
				background: 0 0;
				border: none;
				color: inherit;
				display: inline-block;
				font-size: inherit;
				line-height: inherit;
				text-transform: none;
				text-decoration: none;
				transition: none;
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				margin: 0 50px;
				font-size: 60px;
			}
		}
	</style>
	<div class="seek-controllers vjs-control-bar">
		<div class="button-set">
			<button class="vjs-seek-button skip-back skip-10 vjs-control vjs-button" type="button" aria-disabled="false" title="Seek back 10 seconds" id="back10sec">
			<span aria-hidden="true" class="vjs-icon-placeholder"></span>
			</button>
			<button class="vjs-seek-button skip-forward skip-30 vjs-control vjs-button" type="button" aria-disabled="false" title="Seek forward 30 seconds" id="fwd10sec">
			<span aria-hidden="true" class="vjs-icon-placeholder"></span>
			</button>
			<button class="vjs-seek-button skip-forward skip-30 vjs-control vjs-button" type="button" aria-disabled="false" title="Seek forward 30 seconds" id="fwd10sec">
			<span aria-hidden="true" class="vjs-icon-placeholder"></span>
			</button>
		</div>
	</div>
</div>
<!-- MainContent -->
<div class="main-content">
      <section class="movie-detail container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="trending-info g-border">
                  <h1 class="trending-text big-title text-uppercase mt-0"><?php echo ($data[0]['title']);  ?></h1>
                  <div class="text-right">
                        <?php
							if($this->session->userdata('customer_id') != ''){
								if($buy_now == "not_purchased"){
						?>
							<input type="image" id="btn_Buy" src="<?php echo base_url('user_assets/images/buy_tickets.gif') ?>" alt="Submit" width="211px">
						<?php
								}
						 } else { ?>
							<a href="<?php echo base_url('/Home/login'); ?>">
								<button type="submit" class="btn btn-hover">Sign In To Buy</button>
							</a>
						<?php } ?>
                  </div>
                  <h6 class="text-uppercase mt-0"><?php echo 'season '.$data[0]['season_number'].' episode '.$episode;  ?></h6>
                  <ul class="p-0 list-inline d-flex align-items-center movie-content">
                    
                  </ul>
                  <div class="d-flex align-items-center text-white text-detail">
                     <span class="badge badge-secondary p-3"><?php echo ($data[0]['rating']);  ?></span>
                     <span class="ml-3"><?php echo json_decode($data[0]['each_episode_duration'])[$episode_no];  ?></span>
                     <span class="trending-year"><?php echo ($data[0]['release_year']);  ?></span>
                     <span class="ml-3">₹.<?php echo ($data[0]['price']);  ?>.00/--</span>
                  </div>
                  <div class="d-flex align-items-center series mb-4">
                     <a href="javascript:void();"><img src="images/trending/trending-label.png" class="img-fluid"
                           alt=""></a>
                     <input type="hidden" id="common_id" value="<?php echo $data[0]['common_id']; ?>" common_type="<?php echo $data[0]['type']; ?>">
                  </div>
                  <p class="trending-dec w-100 mb-0"><?php echo ($data[0]['description']); ?></p>
                   <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
                     <li><span><i class="ri-whatsapp-line"></i></span></li>
                     <li><span><i class="ri-facebook-fill"></i></span></li>
                     <li><span><i class="ri-twitter-fill"></i></span></li>
                     <li><span><i class="ri-links-fill"></i></span></li>
                  
                  </ul> 
                  <div class="row mt-5">
                     <div class="col-md-4">
                        <div class="d-flex align-items-center series mb-4">
                           <span class='ml-3 text-gold'><strong>Cast: </strong></span>
                        </div>
                        <p><?php echo $data[0]['series_cast'];  ?></p>
                     </div>
                     <div class="col-md-4">
                         <div class="d-flex align-items-center series mb-4">
                           <label class='ml-3 text-gold'><strong>Director:  </strong></label>
                         </div>
                         <p class="ml-3"><?php echo $data[0]['series_director'];  ?></p>
                     </div>
                     <div class="col-md-4">
                        <div class="d-flex align-items-center series mb-4">
                           <span class='ml-3 text-gold'><strong>Writer:  </strong></span>
                        </div>
                           <p class="ml-3"><?php echo $data[0]['series_writer'];  ?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="container-fluid seasons" id="click_btn_display">
            <div class="iq-custom-select d-inline-block sea-epi s-margin">
                 <select id="search_code" class="form-control season-select">
                    <?php
                       foreach($series_detail as $row){?>
                          <option <?php if($data[0]['season_number'] == $row['season_number']){echo 'selected';} ?> value="<?php echo $row['common_id']; ?>">Season <?php echo $row['season_number']; ?></option>
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
   
<script src="https://player.5centscdn.com/videojs/7.7.6/video.min.js"></script>
<script src="https://player.5centscdn.com/videojs/videojs-contrib-quality-levels.min.js"></script>
<script src="https://player.5centscdn.com/videojs/videojs-hls-quality-selector.min.js"></script>
<script src="https://player.5centscdn.com/videojs/videojs.hotkeys.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/videojs-seek-buttons/dist/videojs-seek-buttons.min.js"></script>
<script type="text/javascript">
    $(document.body).on("change","#search_code",function(){
         var common_id = this.value;
         window.location.replace("<?php echo base_url('home/show_detail/series/'); ?>"+common_id);
         
      });
   
	let player = {};
	$(document).ready(function () {
	    
	    <?php
         if($purchased != ""){
             
            $count = $timer == ""? "0" : ($timer->status != 1? $timer->count_timer : "expired");
            
            if($count != "expired"){
            ?>
            var count = <?php echo (int)$count; ?>;

            var timer = setInterval(function() {
            var duration = '<?php echo (int)round(json_decode($data[0]['each_episode_duration'])[$episode_no]*2.5);?>';
            var common_id = '<?php echo $common_id; ?>';
            var episode = '<?php echo $episode; ?>';
            var order_id = <?php echo $purchased->order_id; ?>;

            if(count >= duration){
               status = 1;
            }

            
            count+=3;

            $.ajax({
                   url: '<?php echo base_url("home/update_timing"); ?>',
                   type: "POST",
                   data:{'common_id': common_id,'type': 2,'count_timer':count,'status':status,'each_episode':episode,'order_id':order_id},
                   success:function(result){
                       if(result == "session_expired"){
                           clearInterval(timer);
                           swal({
                                title: 'Thank you',
                                text: 'your alloted time has been expired please renewed it...',
                                icon: 'info',
                                timer: 2000,
                                buttons: false,
                            })
                            .then(() => {
                                location.reload();
                            })
                       }
                   },
                   error:function(result){
                     console.log(result+' fail')
                   }
               })
         }, 3000 * 60);

      <?php }  }?>
	    
		player = videojs(
			"forest-video",
			{
				fit: true,
				responsive: true,
				controls: true,
				liveui: true,
				techOrder: ["html5"],
				html5: {
					hls: {
						overrideNative: true,
						enableLowInitialPlaylist: true,
						useBandwidthFromLocalStorage: true,
						allowSeeksWithinUnsafeLiveWindow: true,
					},
					nativeAudioTracks: false,
					nativeVideoTracks: false,
					nativeControlsForTouch: false,
				},
				plugins: {},
				sources: [
					{
						type: "application/x-mpegURL",
						src: "<?php echo $movie_view; ?>",
					},
				],
			},
			function () {
				this.reloadSourceOnError();
	
				this.hlsQualitySelector({
					displayCurrentQuality: true,
				});
	
				this.hotkeys({
					volumeStep: 0.1,
					seekStep: 5,
					enableModifiersForNumbers: false,
					alwaysCaptureHotkeys: true,
				});
	
				setTimeout(function () {
					player.play();
				}, 750);
	
				this.seekButtons({
					forward: 30,
					back: 10,
				});
			}
		);
		var buttonfwd = document.getElementById("fwd10sec");
		var buttonback = document.getElementById("back10sec");
		var payPause = document.getElementById("payPause");
		buttonfwd.onclick = function () {
			player.currentTime(player.currentTime() + 30);
		};
	
		buttonback.onclick = function () {
			player.currentTime(player.currentTime() - 10);
		};
	});
	
	$(".vjs-tech").hover(
		function () {
			//Clear timeout just in case you hover-in again within the time specified in hover-out
			clearTimeout(timer);
			timer = setTimeout(function () {
				$(".seek-controllers").style("visibility", "visible");
			}, 1000);
		},
		function () {
			//Clear the timeout set in hover-in
			clearTimeout(timer);
			timer = setTimeout(function () {
				$(".seek-controllers").style("visibility", "hidden");
			}, 1000);
		}
	);
	
	$('#btn_Buy').click(function(e){
		  
	   // window.location.replace('<?php echo base_url('Payment_by_paytm/PaytmGateway'); ?>');
	   var common_id = $('#common_id').val();
	   var type      = $('#common_id').attr('common_type');
	   $.ajax({
	             url: '<?php echo base_url("Payment_by_paytm/PaytmGateway"); ?>',
	             type: "POST",
	             data:{'common_id': common_id,'type': type},
	             success:function(result){
	             	$('body').html(result);
	             },
	             error:function(error){
	             	console.log(error);
	             }
	         })
	
	});
</script>

