<?php
  if ($_FILES['userfile']['error'] > 0)
  {
    echo 'Problem: ';
    switch ($_FILES['userfile']['error'])
    {
      case 1:  echo 'File exceeded upload_max_filesize';  break;
      case 2:  echo 'File exceeded max_file_size';  break;
      case 3:  echo 'File only partially uploaded';  break;
      case 4:  echo 'No file uploaded';  break;
    }
    exit;
  }

  // Does the file have the right MIME type?
  //if ((($_FILES['userfile']['type'] != 'image/pjpeg') && ($_FILES['userfile']['type'] != 'image/jpeg')) && (($_FILES['userfile']['type'] != 'image/gif') && true))
  //{
    //echo "檔案格式錯誤,僅限jpg還有gif";
    //exit;
  //}

//f ($_FILES['userfile']['type'] != 'application/x-httpd-php')
//{
//echo "此檔案禁止上傳";
//exit;
//}

  // put the file where we'd like it
  $upfile = "2".$_FILES['userfile']['name']; //放入SQL資料庫內儲存圖片網址
	echo $upfile."1";
  if (is_uploaded_file($_FILES['userfile']['tmp_name'])) 
  {
     if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
     {
        echo 'Problem: Could not move file to destination directory';
        exit;
     }
  } 
  else 
  {
    echo 'Problem: Possible file upload attack. Filename: ';
    echo $_FILES['userfile']['name'];
    exit;
  }



//問題點
  // reformat the file contents
  //$fp = fopen($upfile, 'r');
 // $contents = fread ($fp, filesize ($upfile));
  //fclose ($fp);
 
  //$contents = strip_tags($contents);
  //$fp = fopen($upfile, 'w');
  //fwrite($fp, $contents);
  //fclose($fp);

  // show what was uploaded
 // echo 'Preview of uploaded file contents:<br><hr>';
 // echo $contents;
  //echo '<br><hr>';

?>
