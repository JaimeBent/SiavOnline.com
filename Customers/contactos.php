<?php include '../template/headCustomer.php'; ?>

        <section class="contactos" id="contactos">
            <div class="image">
                <img src="../images/verdurasVolando.png" alt="" srcset="">
            </div>
            <form action="" id="formularioP">
                <h1 class="heading">contactos</h1>
                <div class="inputcaja">
                    <input type="text" required>
                    <label for="">nombre</label>
                </div>
                <div class="inputcaja">
                    <input type="email" required>
                    <label for="">email</label>
                </div>
                <div class="inputcaja">
                    <input type="number" required>
                    <label for="">telefono</label>
                </div>
                <div class="inputcaja">
                    <textarea required name="" id="" cols="30" rows="10"></textarea>
                    <label for="">mensaje</label>
                </div>
                <input type="submit" class="btn" value="enviar">
            </form>
        </section>
<?php include '../template/footer.php'; ?>
<?php//  } ?>