<?php 
include("../conn/conn_db.php");
include("navbar.php");
include("header.php");
require 'products.php';
?>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data" id="formProduct">
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-controls-modal="exampleModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Artículo</h5>
        </div>
        <div class="modal-body">
        <div class="form-row">
            <input type="hidden" required name="txtID" value="<?php echo $txtID;?>" placeholder="" id="txtID">

            <div class="form group col-md-12">
                <label for="txtName">Nombre:</label>
                <input type="text" class="form-control <?php echo (isset($error['Name']))?"is-invalid":"";?>" name="txtName" value="<?php echo $txtName;?>" placeholder="" id="txtName" required autofocus>
                <div class="invalid-feedback">
                    <?php echo (isset($error['Name']))?$error['Name']:"";?>
                </div>
                <br>
            </div>

            <div class="form group col-md-12">
            <label for="txtDescription">Descripción:</label>
            <input type="text" class="form-control <?php echo (isset($error['Description']))?"is-invalid":"";?>" name="txtDescription" value="<?php echo $txtDescription;?>" placeholder="" id="txtDescription" required>
            <div class="invalid-feedback">
                <?php echo (isset($error['Description']))?$error['Description']:"";?>
            </div>
            <br>
            </div>
            
                <div class="form group col-md-6">
                <label for="txtPrice">Precio:</label>
                <input type="number" step="any" class="form-control <?php echo (isset($error['Price']))?"is-invalid":"";?>" name="txtPrice" min="0" value="<?php echo $txtPrice;?>" placeholder="" id="txtPrice" required>
                <div class="invalid-feedback">
                    <?php echo (isset($error['Price']))?$error['Price']:"";?>
                </div>
                <br>
                </div>

                <div class="form group col-md-6">
                <label for="txtQuantity">Cantidad:</label>
                <input type="number" class="form-control <?php echo (isset($error['Quantity']))?"is-invalid":"";?>" name="txtQuantity" min="0" value="<?php echo $txtQuantity;?>" placeholder="" id="txtQuantity" required>
                <div class="invalid-feedback">
                    <?php echo (isset($error['Quantity']))?$error['Quantity']:"";?>
                </div>
                <br>
                </div>

            <div class="form group col-md-12">
            <label for="txtImage">Imagen:</label>
            <?php if($txtImage!=""){?>
            <br/>
            <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../images/<?php echo $txtImage;?>" />
            <br/>
            <br/>
            <?php }?>

            <input type="file" class="form-control" accept="image/*" name="txtImage" value="<?php echo $txtImage;?>" placeholder="" id="txtImage">
            <br/>
            </div>
        </div>
        </div>

        <div class="modal-footer">
            <button id="btnClear" class="btn btn-secondary">Limpiar</button>
            <button value="btnAdd" <?php echo $actionAdd;?> class="btn btn-success" type="submit" name="action">Agregar</button>
            <button value="btnModify" <?php echo $actionModify;?> class="btn btn-warning" type="submit" name="action">Modificar</button>
            <button value="btnRemove" onclick="return confirm('Realmente desea eliminar?');" type="submit" <?php echo $actionRemove;?> class="btn btn-danger" type="submit" name="action">Eliminar</button>
            <button value="btnCancel" <?php echo $actionCancel;?> class="btn btn-primary" onclick="location.href='index.php'" type="submit" name="action">Cancelar</button>
        </div>
        </div>

    </div>
    </div>
    
    <br/>
    <br/>
    <br>
    <!-- Button trigger modal -->
    <a id="btnOpenModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="color:white"><img src="../icons/new.png" width="25px" height="25px"> Agregar artículo</a>
    <br/>
    <br/>

    </form>

<div class="row">

    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Agregado en</th>
                <th>Acciones</th>
            </tr>
        </thead>
    <?php foreach($listProducts as $product){ ?>
        <tr>
            <td><img class="img-thumbnail" width="100px" src="../images/<?php echo $product['Image']; ?>" /></td>
            <td><?php echo $product['Name']; ?></td>
            <td><?php echo $product['Description']; ?></td>
            <td><?php echo $product['Price']; ?></td>
            <td><?php echo $product['Quantity']; ?></td>
            <td><?php echo $product['created_at']; ?></td>
            <td>

            <form action="" method="post">

            <input type="hidden" name="txtID" value="<?php echo $product['ID']; ?>">

            <button type="submit" value="Seleccionar" class="btn btn-info" name="action"><img src="../icons/modify.png" width="25px" height="25px"></button>
            <button value="btnRemove" onclick="return confirm('¿Desea eliminar el producto?');" type="submit" class="btn btn-danger" name="action"><img src="../icons/remove.png" width="25px" height="25px"></button>

            </form>
            </td>
        </tr>
    <?php } ?>

    </table>

</div>

<?php if($showModal){?>
    <script type="text/javascript">
        $('#exampleModal').modal('show');
    </script>
<?php }?>
<script type="text/javascript">
    function Confirm(message){
        return (confirm(message))?true:false;
    }
</script>

<script type="text/javascript">
const btnClear = document.getElementById("btnClear");
        const inputName = document.getElementById("txtName");
        const inputDescription = document.getElementById("txtDescription");
        const inputPrice = document.getElementById("txtPrice");
        const inputQuantity = document.getElementById("txtQuantity");

        btnClear.addEventListener("click", function () {
          inputName.value = "";
          inputDescription.value = "";
          inputPrice.value = "";
          inputQuantity.value = "";
        });
</script>


</div>

<?php include("footer.php") ?>