<?php 
    require('includes/header.php');
    //require('includes/sidebar.php');
?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Thêm Thương Hiệu</h1>
                        <hr>
                    </div>
                    <form class="user" method="post" action="addbrands.php">
                    <div class="form-group">
                        <input style="border-radius: 6px;" type="text" class="form-control form-control-user" 
                            id="name" name="name" aria-describedby="emailHelp" 
                            placeholder="Tên thương hiệu">
                    </div>
                  
                    
                    <button class="btn btn-primary">Thêm mới</button>

                    </form>
                    <hr>
                   
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<?php 
    require('includes/footer.php');
?>
