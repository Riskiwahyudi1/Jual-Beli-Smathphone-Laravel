<!-- brand select -->

<div class="row d-none d-lg-block">
        <div class="col-md-1 "
            style="background-color: #FAF6F6 ;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2); position:fixed; padding-bottom:80vh;">
            <h6 class="mt-2 ms-3 mb-2"><b>Kategori</b></h6>
            <input type="hidden" class="checkboxesHide" value="">
            <?php
                include "koneksi.php";
            
                $query = mysqli_query($koneksi, "SELECT * FROM data_barang");
            
                $brand = array();
                while ($data = mysqli_fetch_assoc($query)){
                        ?>
            <table class=" ms-3">
                <tr>
                    <?php
                        if (!in_array($data['brand'], $brand)) {
                            ?>
                    <td><input type="checkbox" class="brand_checkbox" value="<?php echo $data['brand'];?>"
                            name="<?php echo $data['brand'];?>"></td>
                    <td><?php echo $data['brand'];?></td>
                    <?php
                            array_push($brand, $data['brand']);
                            ?>
                    <?php
                        }else {
                        ?>
                    <?php
                        }
                        ?>
                </tr>
            </table>
            <?php
        }
        ?>
        </div>