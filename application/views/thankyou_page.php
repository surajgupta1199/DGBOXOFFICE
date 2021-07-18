<?php  
	$order_detail = $this->uri->segment(3);
	$type_content = $this->uri->segment(4);
	$common_id = $this->uri->segment(5);
?>

 <section class="m-profile ">
	<div class="container">
		<div class="main-content text-center mb-10">
		  	<h1 class="display-3">Thank You!</h1>
		  	<p class="lead"><strong class="big-title text-uppercase"><?php echo $order_detail ?></strong> while purchasing your favourite content</p>
		  	<hr>
		  	<p>
		    	Having trouble? <a href="">Contact us</a>
		  	</p>
		</div>
	</div>
</section>

<script src="<?php echo base_url('assets/assets/js/jquery.min.js');?>"></script>
<script type="text/javascript">
	$('document').ready(function(){
		setTimeout(function(){
			window.location.href = "<?php echo base_url('home/show_detail/'.$type_content.'/'.$common_id) ?>";
		},2000);
	})
</script>