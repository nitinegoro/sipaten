<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url("public/dist/css/style-kiosk.css"); ?>">
  	<link rel="stylesheet" href="<?php echo base_url("public/bootstrap/css/bootstrap.min.css"); ?>">
  	<link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css"); ?>">
  	<link rel="stylesheet" href="<?php echo base_url("public/dist/css/animate.css"); ?>">  
  	<link href="https://fonts.googleapis.com/css?family=Carter+One|Squada+One|Averia%20Sans%20Libre|Viga" rel="stylesheet">
  	<script src="<?php echo base_url("public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
  	<script src="<?php echo base_url("public/bootstrap/js/bootstrap.min.js"); ?>"></script>
  	<script src="<?php echo base_url("public/plugins/artyom/artyom.min.js"); ?>"></script>
  	<style>
	h1 { 
		font-family: 'Viga', sans-serif; 
		font-size: 4.5em; 
		color: #F6F3E4; 
		line-height: 1.5em;
   -webkit-text-stroke: 1px black;
   color: white;
   text-shadow:
       3px 3px 0 #686551,
     -1px -1px 0 #686551,  
      1px -1px 0 #686551,
      -1px 1px 0 #686551,
       1px 1px 0 #686551; 
	}
	div.col-md-3 > h4 { 
		font-family: 'Squada One', cursive; color: white; font-size: 2.2em; 
   color: white;
   text-shadow:
       2px 2px 0 #000,
     -1px -1px 0 #000,  
      1px -1px 0 #000,
      -1px 1px 0 #000,
       1px 1px 0 #000; 
	}
	div.col-md-3 > a:focus { outline:none !important; } 
  	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3 pull-right">
				<img src="<?php echo base_url("public/image/teitra.png"); ?>" alt="">
			</div>
			<div class="col-md-3 pull-right text-center" style="padding-left:45px;border-right: 2px solid #9F9465;">
				<img src="<?php echo base_url("public/image/logo-login.png"); ?>" alt="" width="250">
			</div>
			<div class="col-md-10 top text-center">
				<h1><?php echo $this->option->get('pertanyaan_penilaian'); ?></h1>
			</div>
		</div>
	  	<div class="row top text-center" style="margin-left: -30px;">
	  		<div class="col-md-10">
	  		<?php  
	  		foreach($this->penilaian->get_answers() as $row) :
	  		?>
		    	<div class="col-md-3 text-center">
		    		<a href="#" class="get-people-modal" data-answer="<?php echo $row->ID; ?>">
		    			<div class="enjoy-css"><img src="<?php echo base_url("public/image/emoji/{$row->icon}"); ?>" width="100" alt=""></div>
		    		</a>
					<h4><?php echo $row->jawaban; ?></h4>
		    	</div>
		    <?php  
		    endforeach;
		    ?>
	  		</div>
	  	</div>
	</div>
	
	<div class="modal animated fadeIn" id="select-name" data-modal-color="lightgreen" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-search"></i> Silahkan pilih nama anda!</h4>
				</div>
				<div class="modal-body">
					<ul id="list-people">
<!-- 					<?php foreach($this->penilaian->get_people_in_day() as $row) : ?>
  <li class="get-confirm" data-people="<?php echo $row->ID; ?>" data-name="<?php echo $row->nama_lengkap; ?>" data-service="<?php echo $row->nama_kategori; ?>">
  	<span><?php echo $row->nama_lengkap; ?></span><br>
	<small>--- <i class="fa fa-file-text"></i> <?php echo $row->nama_kategori; ?></small>
  </li>
 <?php endforeach; ?> -->
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="modal animated fadeIn" id="modal-confirm" data-modal-color="lightgreen" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-question-circle"></i> Konfirmasi!</h4>
					<p>Apakah benar Anda bernama <strong id="name-people"></strong> dan baru saja mengajukan Surat <strong id="name-service"></strong> ?</p>
				</div>
				<div class="modal-footer">
					<a data-dismiss="modal" aria-hidden="true" class="btn btn-lg btn-link pull-left"><i class="fa fa-times"></i> Tidak</a>
					<button class="btn btn-lg btn-link send-feedback"><i class="fa fa-check"></i> Benar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal animated fadeIn" id="modal-thank" data-modal-color="lightblue" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close close-thank" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-smile-o"></i> Terima Kasih!</h4>
					<p>Terima Kasih, telah memberikan penilaian kinerja pada petugas kami, apapun jawaban anda akan kami terima sebagai bahan evaluasi.</p>
				</div>
			</div>
		</div>
	</div>
	<script>

	$('a.get-people-modal').click( function() 
	{
		audio.play();

		var jawaban = $(this).data('answer');

		$.get("<?php echo base_url('satisfaction/get_people_in_day'); ?>", function(result) 
		{
			$('ul#list-people').html(result);
			
			$('div#select-name').modal('show');

			$('ul#list-people > li').on( 'click', function(oper_jawaban) 
			{
				audio.play();

				var service = $(this).data('service'),
					name 	= $(this).data('name'),
					surat 	= $(this).data('people'),
					answer = jawaban;

				$('div#modal-confirm').modal('show');

				$('strong#name-people').html( name );

				$('strong#name-service').html( service );

				$('button.send-feedback').click( function() 
				{
					$.post( '<?php echo site_url('satisfaction/create') ?>', {
						answer : answer,
						surat : surat
					}, function(res) {
						if(res.status == true) 
						{
							$('div#select-name, div#modal-confirm').modal('hide');
							audio_speech("<?php echo $this->option->get('audio_speech'); ?>");
							$('div#modal-thank').modal('show');
						}
					});
				});
			}); /* End ul > li */
		}); /* End Get XHR */
	});


	$('button.close, a[data-dismiss="modal"], button.btn').click( function() 
	{
		audio.play();
	});

	$('button.close-thank').click( function() 
	{
		window.location.reload();
	});

	var source = "<?php echo base_url("public/sound/click1.wav"); ?>";
	var audio = document.createElement("audio");
	audio.load()
	audio.addEventListener("load", function() {
	  audio.play();
	}, true);
	audio.src = source;

	function audio_speech(message) 
	{
	    artyom.initialize({
	        lang:"id-ID",
	        debug:true,
	        continuous:true,
	        listen:false
	    }).then(function(){
	        console.log("Artyom has been correctly initialized");
	    }).catch(function(){
	        console.error("An error occurred during the initialization");
	    });

	    if (artyom.speechSupported()) {

	        var text = message;

	        if (text) 
	        {
	            var lines = text.split("\n").filter(function (e) {
	                return e
	            });
	            var totalLines = lines.length - 1;

	            for (var c = 0; c < lines.length; c++) {
	                var line = lines[c];
	                if (totalLines == c) {
	                    artyom.say(line, {
	                        onEnd: function () {

	                        }
	                    });
	                } else {
	                    artyom.say(line);
	                }
	            }
	        }
	    } else {
	        alert("Your browser cannot talk !");
	    }
	}
	</script>
</body>
</html>