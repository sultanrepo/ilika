<?php include("includes/header.php");
    $table_name="flipbook_image";
    $page_link="flipbook-upload-image.php";
    $page_name= "FlipBook Image";

	$id= @$_REQUEST['id'];
    
    $check= ($id !='')?'Update ':'Add ';
    
    // $result1 = mysqli_qurey($GLOBALS['db'], "SELECT * FROM `flipbook_category`");
    // print_r($result1);
    
    // $deleteId = @$_REQUEST['deleteId'];
    // if ( isset($deleteId) ) {
    //     $res1 = mysqli_qurey($GLOBALS['db'],"DELETE FROM `slider_main` WHERE id='$deleteId'");
    //     echo '<script type="text/javascript"> window.location = "'.$page_link.'";</script>';
    // }
?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                <?php echo $check.$page_name;?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <!--<li class="breadcrumb-item"><a href="#"></a></li>-->
                <li class="breadcrumb-item active" aria-current="page"><?php echo $check.$page_name;?></li>
                </ol>
            </nav>
          </div>
          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                  <h4 class="card-title"><?php echo $page_name;?></h4>
                  <?php if($id==""){ }
					else
					{
			   ?>
          <p><a  href="<?php echo $page_link;?>" class="btn btn-outline-primary"><i class="fa fa-arrow-left greay"></i>&nbsp;Add <?php echo $page_name;?></a></p><?php }?>
                  <?php 
				  $msg='';
                  if(isset($_POST['submit'])){
                        $msg= add_flipbook_image($_POST);
                    }
                    
                    if(isset($_POST['update'])){
                        $msg= update_category_slider($_POST);
                    }
                    
                    $del=@$_REQUEST['del'];
                	if($del != ''){
                		delete_record($table_name, $del);
                		echo '<script type="text/javascript"> window.location = "'.$page_link.'";</script>';
                	}
                	$st_id=@$_REQUEST['st_id'];
                	if($st_id != ''){
                	    $ch_status=$_REQUEST['ch_status'];
                		change_status($table_name,"status",$ch_status, "id=$st_id");
                		echo '<script type="text/javascript"> window.location = "'.$page_link.'";</script>';
                	}

                $result = getdetails_bywhere($table_name, "id= '$id'");
                    
                  echo ($msg=='')?'':'<p style="color:blue; text-align:center;">'.$msg.'</p>';?>
                 <!--<p class="card-description">
                    Basic form elements
                  </p>-->
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                      
                     <div class="row">
                          <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputName1">Category Name</label>
                     <select name="cat_id" id="cat_id" class="form-control" required>
                          <option value="">Select Category</option>
                          <?php $get_cat=select_all("flipbook_category",1, "id", "ASC");
                            foreach($get_cat as $all_cat){
                                echo '<option value="'.$all_cat['id'].'" '.((($result['category_id'] == $all_cat['id']) || ($_POST['category_id'] == $all_cat['id']))? "selected":"").'>'.$all_cat['category'].'</option>';
                            }
                          ?>
                      </select>
                      <br>
                      <label for="exampleInputName1">Sub Category</label>
                      <select name="sub_cat_id" id="sub_cat_id" class="form-control" required>
                          <option value="">Select</option>
                      </select>
                      <br>
                      <label for="imageIndex">Image Index Number</label>
                      <input type="text" name="imageIndex" id="imageIndex" class="form-control" required>
                      

                    </div>
                    </div>
                      
                    <?php if($id ==""){ }else {echo '<div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail3">Image</label><br>
                      <img src="'.$GLOBALS['img_path_slider'].$result['cat_slider_image'].'" style="width:100px;"></div>
                    </div>';}?>
                    <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail3">Upload Image</label>
                      <input type="file" class="dropify" name="image" <?php echo($id =="")? "required":"";?> accept="image/*"/>
                      <strong>( Upload Image: 338px W x 338px H)</strong>
                    </div>
                    </div>
                    </div>
                    <input type="hidden" name="id" id="get_id" value="<?php echo $id;?>">
                    <input type="hidden" name="table_name" id="table_name" value="<?php echo $table_name;?>">
                    <?php $button_name= (($id !='') || ($id>0))?'update':'submit';
                        $button_value= (($id !='') || ($id>0))?'Update':'Submit';
                        
                        echo '<button type="submit" class="btn btn-primary mr-2" name="'.$button_name.'">'.$button_value.'</button>';
                    ?>
                  </form>
                  <hr>
                    <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Index No.</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
				$i = 1;
				$all=select_all_2($table_name);
				foreach($all as $fetch){
					$ids=$fetch['flipbook_cat_id'];
					$id = $fetch['id'];
                    $index = $fetch['image_index'];
					$sub_catid = $fetch['flipbook_sub_cat_id'];
					$status=$fetch['status'];
					$toggle=($status==0)?'off':'on';
					$color=($status==0)?'red':'green';
				?>
				<tr>
				    <td><?php echo $i++; ?></td>
                    <td id="indexNumber_<?php echo $i; ?>"><?php echo $index; ?></td>
				    <td>
				    <?php 
				    $all1 = mysqli_query($GLOBALS['db'],"SELECT * FROM `flipbook_category` WHERE id='$ids'");
				    foreach($all1 as $fetch1) {
				        $name = $fetch1['category'];
				        echo $name;
				    }
				    ?>
				    </td>
				    <td>
				    <?php 
				    $all2 = mysqli_query($GLOBALS['db'],"SELECT * FROM `flipbook_subcategory` WHERE id='$sub_catid'");
				    foreach($all2 as $fetch2) {
				        $name = $fetch2['sub_cat_name'];
				        echo $name;
				    }
				    ?>
				    </td>
				    
					<td><img src="<?php echo $GLOBALS['img_path_slider'].$fetch['flipbook_image'];?>" style="width:200px; height:90px;
    border-radius: 0;"></td>
					<td>
					    <a href="<?php echo $page_link.'?del='.$id;?>"><i class="fas fa-trash-alt"></i></a>
					    <button onclick="myFunction(<?php echo $i; ?>)" type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-pen-alt"></i>
                        </button>
					    </td>
				</tr>
				<?php }?>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <?php
            if ( isset($_POST['updateIndexValue']) ) {
                $index = $_POST['updateIndex'];

                $getIndex = mysqli_query($GLOBALS['db'], "SELECT * FROM `flipbook_image` WHERE image_index='$index'");
                if ( mysqli_num_rows($getIndex) == 0 ) {
                    $insertIndex = mysqli_query($GLOBALS['db'], "UPDATE `flipbook_image` SET `image_index`='$index' WHERE id='$id'");
                } else {
                    ?>
                    <script>
                        alert("Index Already Selected.!");
                    </script>
                    <?php
                }

            }
            ?>
            <form method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Flipbbook Index</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <label for="index">Enter Index</label><br>
                    <input class="form-control" type="text" name="updateIndex" id="updateIndex" placeholder="Enter Index" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
         
        </div>
        <!-- content-wrapper ends -->
        <script>
            function myFunction(i) {
                let x;
                x = document.getElementById("indexNumber_"+i).innerHTML;
                document.getElementById("updateIndex").value = x;
            }
        </script>

        <script>
            jQuery(document).ready(function() {
                $("#cat_id").on('change', function() {
                    var level = $(this).val();
                    let dropdown = $("#sub_cat_id");
                    //alert("Mohit");
                    dropdown.empty();
                        $.ajax ({
                            type: 'GET',
                            url: 'includes/ajaxCallFuntions.php',
                            contentType: "application/json; charset=utf-8",
                            dataType: "jsonp",
                            data: { 
                                flipbook_catid : '' + level + '' 
                            },
                            statusCode: {
                              404: function () {
                                //error
                                alert("Error");
                              },
                              200: function (data) {
                                //response data
                                const obj = JSON.parse(data.responseText);
                                const leng = obj.length;
                                for ( var i = 0 ; i < leng ; i++ ) {
                                    var id = obj[i].id;
                                    var cat_id = obj[i].cat_id;
                                    var name = obj[i].name;
                                    dropdown.append('<option value="'+id+'" >'+name+'</option>');
                                    dropdown.prop('selectedIndex', 0);
                                }
                                
                                //alert(obj[0].id);
                                // console.log(JSON.parse(data.responseText));
                                // console.log(JSON.stringify(data, null, 3));
                                // var len = data.length;
                                // for(var i=0; i<len; i++) {
                                //     var id = data[i];
                                //     var cat_id = data[i];
                                //     var name = data[i];
                                //     alert("asjkdhnf");
                                // }
                              }
                            }
                            
                        });
                });
            });
        </script>
        
<?php include("includes/footer.php") ?>



















