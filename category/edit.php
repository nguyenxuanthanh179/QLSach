<?php 
   require("../include/config.php");
   $id= $_GET['id'];
   $sql="SELECT * FROM categories WHERE id='$id'";
   $categories = $conn->prepare($sql);
   $categories->execute(['id'=> $id]);
   $category = $categories->fetch(PDO::FETCH_OBJ);
   if(isset($_POST['update'])){
       $name = $_POST['name'];
       $image = $_POST['image'];
       $image_save=$image; 
       if (isset($_FILES['image'])) {
           $file_name = $_FILES['image']['name'];
           $file=$_FILES['image']['tmp_name'];
           $upload_folder = "./../photos/";
           move_uploaded_file($file,$upload_folder .$file_name);
           $image_save = $_FILES["image"]["name"];
       }
       $created_at = $_POST['created_at'];
       $updated_at = $_POST['updated_at'];
       $sql = 'UPDATE categories 
       SET name=:name, image=:image_save, created_at =:created_at, updated_at=:updated_at 
       WHERE id=:id';
       $category = $conn->prepare($sql);
       if($category->execute([
           'id'=>$id,
           'name' => $name,
           'image_save'=>$image_save,
           'created_at'=>$created_at,
           'updated_at'=>$updated_at])){
           header("Location:./../category/view.php");
       }
       
   }
   require('../layout/header.php')
?>
            <div class="content col-8">
                <div class="row flex">
                    <h2>Edit Information</h2>
                </div>
                <div class="table">
                <form action="" method="post">
                        <div class="form-group">
                            <label for="name" >Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $category->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="image" >Image</label>
                            <input type="file" name="image" class="form-control" value="<?php echo $category->image ?>">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="created_at" >Date created</label>
                                <input type="date" name="created_at" class="form-control" value="<?php echo $category->created_at ?>">
                            </div>
                            <div class="col-6" >
                                <label for="updated_at" >Date updated</label>
                                <input type="date" name="updated_at" class="form-control" value="<?php echo $category->updated_at ?>">
                            </div>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Save</button>
                        <a href="./../category/view.php" class="btn btn-default btn-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </main>
<?php require('../layout/footer.php')?>
