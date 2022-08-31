<?php
/**
 * Template Name: Page Tempalte File Download
 */
   // set_time_limit(0); 
    ini_set('memory_limit', '512M');
	error_reporting(0);
	$str = $_GET['str'];
	if ( is_user_logged_in() && isset($_GET['str']) && isset($_SESSION['encryptUrl']) && $_SESSION['encryptUrl'][$str]) {
		$fileName = $folderUrl = "";
		/*$the_query = new WP_Query( array('posts_per_page' => $post_per_page, 'post_type' => 'ep-services', 'paged' => $paged,'order'=>'DESC',  'meta_key'=>'customer','meta_value'=>'2' )  );	
		if ($the_query->found_posts!=0)
		{
			$fileName = $folderUrl = "";
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$subscription_file 		= get_field("subscription_file",$post->ID);
				$i=0;
				foreach($subscription_file as $f){
					$fAr 		= 	explode("/",$f['file_url']);
					$reverse	=	array_reverse($fAr);
					if($str==md5($reverse[0])){
						$fileName 	= $reverse[0];
						$folderUrl 	= $reverse[2]."/".$reverse[1];
					}
				$i++;
				}
			endwhile;
		}*/
		$file	    = $_SESSION['encryptUrl'][$str];
		$fAr 		= 	explode("/",$file['file_url']);
		$reverse	=	array_reverse($fAr);
		$fileName 	= $reverse[0];
		$folderUrl 	= $reverse[2]."/".$reverse[1];

	} 
	else
	{
		echo "Invalid File Attempt";
	}
	
	if($fileName){
		
		$upload_dir = wp_upload_dir(); // Array of key => value pairs
		
		ignore_user_abort(true);
		set_time_limit(0); // disable the time limit for this script
		 //$_SERVER['DOCUMENT_ROOT']
		$path = $upload_dir['basedir']."/woocommerce_uploads/".$folderUrl."/"; // change the path to fit your websites document structure
		$fileUrl =  $upload_dir['basedir']."/woocommerce_uploads/".$folderUrl."/".$fileName;
		if(file_exists($fileUrl)){
			$path = $upload_dir['basedir']."/woocommerce_uploads/".$folderUrl."/"; // change the path to fit your websites document structure
		}
		else{
			$path = $upload_dir['basedir']."/".$folderUrl."/"; // change the path to fit your websites document structure
		}

		$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $fileName); // simple file name validation
		$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
		$fullPath = $path.$dl_file;


        if (file_exists($fullPath))
        {
            if ($fd = fopen ($fullPath, "r")) {
                $fsize = filesize($fullPath);
                $path_parts = pathinfo($fullPath);

                $ext = strtolower($path_parts["extension"]);
                switch ($ext) {
                    case "pdf":
                    header("Content-type: application/pdf");
                    header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
                    break;

                    case "jpeg":
                    header("Content-type: image/jpg");
                    header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
                    break;

                    case "jpg":
                    header("Content-type: image/jpg");
                    header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
                    break;
                    // add more headers for other content types here
                    default;
                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
                    break;
                }
                header("Content-length: $fsize");
                header("Cache-control: private"); //use this to open files directly
                while(!feof($fd)) {
                    $buffer = fread($fd, 4096);
                    echo $buffer;
                    ob_flush();
                flush();
                }
            }
            fclose ($fd);
            exit;
        }else{
            echo "Requested download file does not exists asked to website owner";
        }
	}