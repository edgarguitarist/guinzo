<div class="container">
    <div class="columns has-text-centered">
        <div class="column">
            <h1 class="section-heading has-text-weight-semibold">Información</h1>
        </div>
    </div>

    <div class="columns">
        <div class="column is-three-fifths">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15947.9106467947!2d-79.9099018!3d-2.1622025!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2b379a610bc58d8a!2sBockCao%2FAntonio%20Cacao!5e0!3m2!1ses-419!2sec!4v1631305562661!5m2!1ses-419!2sec" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" title="mapa"></iframe>
            <div class="has-text-centered" width="100%">
                <h2>BOCKCAO / Antonio Cacao</h2>
                <p class="text-muted">Urbanización El Portón, Ed. Alcalá 1, Apt.2, Piso 2, Guayaquil</p>
            </div>
        </div>

        <div class="column">
            <div class="hero has-text-centered">
                <h1 class="title has-text-black">CONTACTO</h1>
                <h2 class="has-text-black">Telefono:<em style="margin: 0 10px 0 10px; color:blue;" class="fa fa-phone is-size-4"></em><a target="_blank" href="tel:+59342881098">(04) 288-1098</a></h2>
                <h2 class="has-text-black">WHATSAPP:<em style="margin: 10px 10px 0 10px; color:green;" class="fab fa-whatsapp is-size-4"></em><a target="_blank" href="https://api.whatsapp.com/send?phone=%2B5930991737020&fbclid=IwAR3-tnONKUGCIsftwMERRipfP9IHKzdjApu_F980IUlMjvbSN6R2GFAaBrk&text=Hola%20BockCao%20Events%20Designers">099 173 7020</a></h2>
                <br><br>
                <h1 class="subtitle b-600 has-text-black">Horarios de Atención</h1>
                <h2 class="b-600 has-text-black">Lunes a Viernes</h2>

                <?php
                $sab = '';
                $lav = '';
                if (date('l') == 'Monday' || date('l') == 'Tuesday' || date('l') == 'Wednesday' || date('l') == 'Thursday' || date('l') == 'Friday') {
                    $lav = date('H:i') >= '08:00' && date('H:i') <= '18:00' ?
                        '<span class="has-text-green b-600">(Abierto)</span>' :
                        '<span class="has-text-danger">(Cerrado)</span>';
                } else if (date('l') == 'Saturday') {
                    $sab = date('H:i') >= '08:00' && date('H:i') <= '14:00' ?
                        '<span class="has-text-green b-600">(Abierto)</span>' :
                        '<span class="has-text-danger">(Cerrado)</span>';
                }
                ?>

                <h3 class="">08:00 - 18:00 <?= $lav ?></h3>
                <br>
                <h2 class="b-600 has-text-black">Sábados</h2>
                <h3>08:00 - 14:00 <?= $sab ?></h3>
                <br>
                <h2 class="b-600 has-text-black">Domingos</h2>
                <h3>No Disponibles</h3>
            </div>
        </div>
    </div>
    <h1 class="subtitle b-600 has-text-centered has-text-black">Clientes</h2>
        <iframe src="sistema/components/customers.php" width="100%" frameborder="0"></iframe>

</div>