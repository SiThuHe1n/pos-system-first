<?php 


echo`<script>   $(document).ready(function () { const i1=$("#product").val();
    const i2=$('#inputshop').val();
   

      $.ajax({

            
                 type: "POST",
                url: "showpr.php",
                data: {
                          id:i1,
                          id1:i2
                     
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#productdata').html(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });

          })
          </script>`;





 ?>