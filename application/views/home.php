<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Card</title>
  </head>
  <body>
    <input type="hidden" name="base_url" id="base_url" value="<?=base_url();?>">

  <div class="alert alert-success" role="alert" id="emp_suess" style="display: none;">
    Product Add.
  </div>

    <form method="post" id="insert_data" enctype="multipart/form-data">
        <fieldset>
            <legend>Disabled fieldset example</legend>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
                <p id="error_name" class="text-danger" style="display:none">Enter Name</p>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Phone No</label>
                <input type="text" id="phone_no" name="phone_no" class="form-control" placeholder="Enter Phone No">
                <p id="error_phone" class="text-danger" style="display:none">Enter Phone No</p>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Image</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                <p id="error_image" class="text-danger" style="display:none">Enter Image</p>

            </div>
            
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>



    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Name</th>
      <th scope="col">Phone No</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach($about_data as $key => $value)
      {
        $image=$value->image;
        $images = trim($image, ",");
    ?>
    <tr>
      <td><?=$key+1?></td>
      <td><?=$value->name?></td>
      <td><?=$value->phone_no?></td>
      <td><img class="banner showTableImage" src="<?=base_url('image/'.$images.'')?>" ></td>
    </tr>

    <?php } ?>
  </tbody>
</table>
<style>
  .showTableImage {
    height: 101px;
    width: 101px;
    object-fit: contain;
}
</style>

<script>
         $('#insert_data').submit(function(e){
          e.preventDefault();

          var name=$('#name').val();
          var phone_no=$('#phone_no').val();

          if(name == "")
          {
              $("#error_name").show();
              setTimeout(function(){
                $("#error_name").hide();
              }, 1000);
              return true;
          }

          if(phone_no == "")
          {
            $("#error_phone").show();

            setTimeout(function(){
              $("#error_phone").hide();
            },1000);
            return true;
          }

          var base_url=$('#base_url').val();
          alert(base_url);
             var formData = new FormData($(this)[0]);
              $.ajax({
                url:base_url+'product_add',
                type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                  // alert(data);
                  if(data == 1)
                  {
                    $("#emp_suess").show();
                    setTimeout(function(){
                      location.reload();
                    },2000)
                  }

                },
              });
        
        });

</script>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>