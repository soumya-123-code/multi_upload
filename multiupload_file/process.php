<?php
 $output_dir = "upload/";/* Path for file upload */
    $fileCount = count($_FILES["image"]['name']);
	for($i=0; $i < $fileCount; $i++)

		{
            $RandomNum   = time();

            $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][$i]));
            $ImageType      = $_FILES['image']['type'][$i]; /*"image/png", image/jpeg etc.*/

            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

            $ret[$NewImageName]= $output_dir.$NewImageName;

            /* Try to create the directory if it does not exist */
			if (!file_exists($output_dir . $last_id))
			{
				@mkdir($output_dir . $last_id, 0777);
			}

            move_uploaded_file($_FILES["image"]["tmp_name"][$i],$output_dir.$last_id."/".$NewImageName );

             /*$insert_img = "insert into `category_images` SET `category_ads_id`='".$category_ads_id_image."', `image`='".$NewImageName."'";
              $result = $dbobj->query($insert_img);*/
               }

        echo "Image Uploaded Successfully";
        ?>
        
