<body style="background: rgb(34,193,195);
background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);">

  <div class="content-wrapper" style="background: rgb(34,193,195);
background: linear-gradient(180deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);">

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
          
          <table class="table table-dark">
              <thead>
                  <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Subject</th>
              <th scope="col">Message</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (isset($fetch)) {


              foreach ($fetch as $value) { ?>
                <tr>
                  <td><?php echo $value->query_id ?></td>
                  <td><?php echo $value->name ?></td>
                  <td><?php echo $value->email ?></td>
                  <td><?php echo $value->subject ?></td>
                  <td><?php echo $value->message ?></td>
                  <!-- <td>
                    <form action="update-user" method="post">

                      <button class="btn-primary btn-sm" name="update_btn" value="">Update</button>
                    </form>
                    <form action="" method="post">
                      <button type="submit" name="delete_btn" value="" class="mt-2 btn-danger btn-sm">Delete</button>
                    </form>
                  </td> -->
                </tr>
            <?php }
            } else {
              echo "<tr>
                      <th style='text-align:center;' colspan=8>No Data Found</th>
                      </tr>";
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</body>