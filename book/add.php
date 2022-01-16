<?php 
    require('../include/config.php');
    if (isset($_POST['add'])){
        $name = $_POST['name'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $created_at = $_POST['created_at'];
        $updated_at = $_POST['updated_at'];
        $author = $_POST['author'];
        $sql= "INSERT INTO books(name,author,image,price,sale,category_id,description,created_at,updated_at) 
        VALUES ('$name','$author','$image','$price','$sale','$category_id','$description','$created_at','$updated_at')";
        $books = $conn->prepare($sql);
        if($books->execute([
            'name' => $name,
            'author'=>$author,
            'image'=>$image,
            'price'=>$price,
            'sale'=>$sale,
            'category_id'=>$category_id,
            'description'=>$description,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at]))
        {
            header("Location:./../book/view.php");
        }
    }   
    require('../layout/header.php')                         
?>

        <div class="content col-8">
            <div class="row flex">
                <h2>Add book</h2>
            </div>
            <div class="table">
                <form action="" method="post">
                    <div class="row form-group">
                    <div class="col-6 ">
                            <label for="name" >Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="">
                    
                        </div>
                        <div class="col-6">
                            <label for="author" >Author</label>
                            <input type="text" name="author" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row form-group">
                            <div class="col-6">
                                <label for="image" >Image</label>
                                <input type="file" name="image" class="form-control" value="">
                            </div>
                            
                            <div class="col-6">
                                <label for="category_id" >Category</label>
                                <input type="text" name="category_id" class="form-control" value="">
                            </div>
                    </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="price" >Price</label>
                                <input type="text" name="price" class="form-control" value="">
                            </div>
                            <div class="col-6" >
                                <label for="sale" >Sale</label>
                                <input type="text" name="sale" class="form-control" value="">
                            </div>
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
                        <div class="form-group ">
                            <label for="description" >Description</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                    <input type="submit" name="add" class="btn btn-primary" value="Add">
                    <a href="./../book/view.php" class="btn btn-default btn-primary" style="border:1px solid #ccc">Cancel</a>
                </form>
            </div>
        </div>
    </main>
    <?php require('../layout/footer.php')?>