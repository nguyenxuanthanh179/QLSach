<?php 
    require('../include/config.php');
    if (isset($_POST['add'])){
        $name = $_POST['name'];
        $image = $_POST['image'];
        $created_at = $_POST['created_at'];
        $updated_at = $_POST['updated_at'];
        $sql= "INSERT INTO categories(name,image,created_at,updated_at) 
        VALUES ('$name','$image','$created_at','$updated_at')";
        $category = $conn->prepare($sql);
        if($category->execute([
             'id'=>$id,
             'name' => $name,
             'image'=>$image,
             'created_at'=>$created_at,
             'updated_at'=>$updated_at])){
             header("Location:./../category/view.php");
         }

    }   
    require('../layout/header.php')                         
?>

        <div class="content col-8">
            <div class="row flex">
                <h2>Add category</h2>
            </div>
            <div class="table">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name" >Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="">
                    </div>
                    <div class="form-group">    
                        <label for="image" >Image</label>
                        <input type="file" name="image" class="form-control" value="">  
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="created_at" >Date created</label>
                            <input type="date" name="created_at" class="form-control" value="">
                        </div>
                        <div class="col-6" >
                            <label for="updated_at" >Date updated</label>
                            <input type="date" name="updated_at" class="form-control" value="">
                        </div>
                    </div>
                    <input type="submit" name="add" class="btn btn-primary" value="Add">
                    <a href="./../category/view.php" class="btn btn-default btn-primary" style="border:1px solid #ccc">Cancel</a>
                </form>
            </div>
        </div>
    </main>
<?php require('../layout/footer.php')?>
