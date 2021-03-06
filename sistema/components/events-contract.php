<div class="container">
    <div style="display: none;" id="pdf_container_contrato" class="card">
        <div class="card-content">
            <div class="content has-text-centered mh-20">
                <div class="page1">
                    <div id="cabecera" class="mv-50">
                        <img class="addButton" style="width: 150px; margin-top: -25px !important; margin-left: 2% !important;" src="images/logos/logo-bockcao-black.png" alt="logo">
                        <h1 id="titleContrato" class="title is-4">CONTRATACIÓN DE SERVICIOS DE ORGANIZACIÓN DE<br>EVENTOS y BANQUETES<br>BOCKCAO EVENT DESIGNERS</h1>
                        <span class="addButtonInversed cuadro">N. : <?= $id_event ?></span>
                    </div>

                    <div id="estipulaciones">
                        <h1 class="title is-4 has-text-left ml-30">Estipulaciones</h1>
                        <div class="">
                            <h2 class="subtitle is-5 has-text-centered">Como prestador del servicio</h2>
                            <ul class="list-unstyled has-text-left">
                                <li>
                                    <span class="b-bolder">Nombres: </span>Carlos Antonio
                                </li>
                                <li>
                                    <span class="b-bolder">Apellidos: </span>Cacao Melendez
                                </li>
                                <li>
                                    <span class="b-bolder">C.I.: </span>0909438319
                                </li>
                                <li>
                                    <span class="b-bolder">Teléfono: </span>099 173 7020
                                </li>
                                <li>
                                    <span class="b-bolder">Correo electrónico:</span> antoniocacao@bockcaodesigners.com
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6">
                            <h2 class="subtitle is-5 has-text-centered">Como cliente</h2>
                            <ul class="list-unstyled has-text-left">
                                <li>
                                    <span class="b-bolder">Nombre: </span><?= $row['name']  ?>
                                </li>
                                <li>
                                    <span class="b-bolder">Apellido: </span><?= $row['lastname'] ?>
                                </li>
                                <li>
                                    <span class="b-bolder">C.I.: </span><?= $row['dni'] ?>
                                </li>
                                <li>
                                    <span class="b-bolder">Teléfono: </span><?= $row['phone'] ?>
                                </li>
                                <li>
                                    <span class="b-bolder">Domicilio: </span><?= $row['address_event'] ?>
                                </li>
                                <li>
                                    <span class="b-bolder">Correo electrónico:</span> <?= $row['email'] ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="clausulas">
                        <h1 class="title is-4 has-text-centered">Clausulas</h1>
                        
                        <div class="clausula">
                            <p class="has-text-justified">
                                <span class="b-bolder">PRIMERA.-</span>
                                Por el presente contrato ambas partes acuerdan la celebración del evento en EL salón/domicilio <?= $row['address_event'] . ' ' . $row['place'] ?>, el día <?= $day_event ?>, del mes <?= $month_event ?>, del año <?= $year_event ?>, desde la hora <?= $time_event ?> hasta <?= $time_clausura ?>, del día <?= $day_clausura ?>, del mes <?= $month_clausura ?>, del año <?= $year_clausura ?>.
                            </p>
                            <p class="has-text-justified">
                                En este período de tiempo se encuentran incluidos los días necesarios tanto para el montaje como para el desmontaje del evento.
                            </p>
                        </div>
                        <div class="clausula">
                            <p class="has-text-justified">
                                <span class="b-bolder">SEGUNDA.-</span>
                                Los invitados lo formaran un total de <?= $row['amount_guest'] ?> personas.
                                Este podrá variar hasta 8 días naturales antes de la fecha citada para la celebración del evento, en caso de sobrepasar los asistentes acordados se pagarán con un 10% por no haber sido comunicado.
                            </p>
                        </div>
                        <div class="clausula">
                            <p class="has-text-justified">
                                <span class="b-bolder">TERCERA.-</span>
                                La elección de la oferta gastronómica será de carácter cerrado o abierto, El cliente deberá de elegir entre los platos, bebidas, entrantes, fuertes, postres.
                            </p>
                            <p class="has-text-justified">
                            <h6 class="has-text-left">MENU</h6>
                            <ul class="list-unstyled has-text-left">
                                <li>
                                    <span class="b-bolder">Entrada: </span>
                                    <?= $entrada ?>.
                                </li>
                                <li>
                                    <span class="b-bolder">Plato fuerte: </span>
                                    <?= $plato_fuerte ?>.
                                </li>
                                <li>
                                    <span class="b-bolder">Postre: </span>
                                    <?= $postre ?>.
                                </li>
                                <li>
                                    <span class="b-bolder">Bebidas: </span>
                                    <?= $bebidas ?>.
                                </li>
                            </ul>
                            </p>
                        </div>
                        <div class="clausula">
                            <p class="has-text-justified">
                                <span class="b-bolder">CUARTA.-</span>
                                Independientemente de la entrega del anticipo, EL PRESTADOR DEL SERVICIO deberá entregar a EL CLIENTE la factura o comprobante que ampare el pago de los servicios contratados, en la que se hará constar detalladamente el nombre y precio de cada uno de los servicios proporcionados, esto con la finalidad de que EL CLIENTE pueda verificarlos en detalle.
                            </p>
                        </div>
                        <div class="clausula">
                            <p class="has-text-justified">
                                <span class="b-bolder">QUINTA.-</span>
                                El importe total del evento/banquete será de <span class="b-bolder" id="precio"></span> y se abonará de la siguiente manera; un 40 % a la firma inicial y acuerdo de dicho contrato y la cifra restante entre las dos semanas después de la realización del evento.
                            </p>
                        </div>
                        <div class="clausula">
                            <p class="has-text-justified">
                                <span class="b-bolder">SEXTA.-</span>
                                El caso de variación de dicho contrato en algunas de las partes de su desarrollo, se podrá variar hasta dos semanas antes de su celebración.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- SEXTA -->
                <br>
                <div class="page2 ">
                    <div id="clausulas">
                        <div class="clausula">
                            <p class="has-text-justified">
                                <span class="b-bolder">SÉPTIMA.-</span>
                                Si los bienes destinados a la prestación del servicio sufrieren un menoscabo por culpa o negligencia debidamente comprobada de EL CLIENTE o de sus invitados, éste se obliga a cubrir los gastos de reparación de los mismos, o en su caso, indemnizar al prestador del servicio hasta con un 60% de su valor.
                            </p>
                        </div>
                        <div class="clausula">
                            <p class="has-text-justified">
                                <span class="b-bolder">OCTAVA.- FORMA DE PAGO, </span>
                                El CLIENTE realizará todos los pagos mediante, transferencia bancaria, talón conformado o a través del cargo (incluida tarjeta de crédito).
                            </p>
                        </div>
                        <div class="clausula">
                            <p class="has-text-justified">
                                <span class="b-bolder">NOVENA.- VALIDEZ DEL CONTRATO, </span>
                                El CLIENTE declara formalmente que conoce, se somete, acepta y presta su conformidad a las estipulaciones en el presente contrato contenidas, así como a las Condiciones Generales que forman parte integrante del mismo, no pudiendo alegarse en ningún momento ignorancia de las mismas ni por personas o empresas por él contratadas, incluyendo la situación, estado, superficie y condiciones de las instalaciones que utiliza y se obliga a conservarlas en perfecto estado.
                            </p>
                            <p class="has-text-justified">
                                Y en prueba de conformidad del presente contrato, los comparecientes firman por duplicado y a un sólo efecto en el lugar y fecha arriba indicados.
                            </p>
                        </div>
                    </div>
                    <br>
                    <div id="firmas">
                        <div class="columns">
                            <div class="column is-1"></div>
                            <div class="column">
                                <!--- FIRMA PRESTADOR DE SERVICIO -->
                                <hr style="background-color: black !important;">
                                <h1 class="subtitle is-size-5 b-bolder">FIRMA PRESTADOR DE SERVICIO</h1>
                            </div>
                            <div class="column is-1"></div>
                            <div class="column">
                                <!--- FIRMA CLIENTE -->
                                <hr style="background-color: black !important;">
                                <h1 class="subtitle is-size-5 b-bolder">FIRMA CLIENTE</h1>
                            </div>
                            <div class="column is-1"></div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var numeroALetras = (function() {
        // Código basado en https://gist.github.com/alfchee/e563340276f89b22042a
        function Unidades(num) {
            switch (num) {
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";
                case 9:
                    return "NUEVE";
            }

            return "";
        } //Unidades()

        function Decenas(num) {
            let decena = Math.floor(num / 10);
            let unidad = num - decena * 10;

            switch (decena) {
                case 1:
                    switch (unidad) {
                        case 0:
                            return "DIEZ";
                        case 1:
                            return "ONCE";
                        case 2:
                            return "DOCE";
                        case 3:
                            return "TRECE";
                        case 4:
                            return "CATORCE";
                        case 5:
                            return "QUINCE";
                        default:
                            return "DIECI" + Unidades(unidad);
                    }
                    case 2:
                        switch (unidad) {
                            case 0:
                                return "VEINTE";
                            default:
                                return "VEINTI" + Unidades(unidad);
                        }
                        case 3:
                            return DecenasY("TREINTA", unidad);
                        case 4:
                            return DecenasY("CUARENTA", unidad);
                        case 5:
                            return DecenasY("CINCUENTA", unidad);
                        case 6:
                            return DecenasY("SESENTA", unidad);
                        case 7:
                            return DecenasY("SETENTA", unidad);
                        case 8:
                            return DecenasY("OCHENTA", unidad);
                        case 9:
                            return DecenasY("NOVENTA", unidad);
                        case 0:
                            return Unidades(unidad);
            }
        } //Unidades()

        function DecenasY(strSin, numUnidades) {
            if (numUnidades > 0) return strSin + " Y " + Unidades(numUnidades);

            return strSin;
        } //DecenasY()

        function Centenas(num) {
            let centenas = Math.floor(num / 100);
            let decenas = num - centenas * 100;

            switch (centenas) {
                case 1:
                    if (decenas > 0) return "CIENTO " + Decenas(decenas);
                    return "CIEN";
                case 2:
                    return "DOSCIENTOS " + Decenas(decenas);
                case 3:
                    return "TRESCIENTOS " + Decenas(decenas);
                case 4:
                    return "CUATROCIENTOS " + Decenas(decenas);
                case 5:
                    return "QUINIENTOS " + Decenas(decenas);
                case 6:
                    return "SEISCIENTOS " + Decenas(decenas);
                case 7:
                    return "SETECIENTOS " + Decenas(decenas);
                case 8:
                    return "OCHOCIENTOS " + Decenas(decenas);
                case 9:
                    return "NOVECIENTOS " + Decenas(decenas);
            }

            return Decenas(decenas);
        } //Centenas()

        function Seccion(num, divisor, strSingular, strPlural) {
            let cientos = Math.floor(num / divisor);
            let resto = num - cientos * divisor;

            let letras = "";

            if (cientos > 0)
                if (cientos > 1) letras = Centenas(cientos) + " " + strPlural;
                else letras = strSingular;

            if (resto > 0) letras += "";

            return letras;
        } //Seccion()

        function Miles(num) {
            let divisor = 1000;
            let cientos = Math.floor(num / divisor);
            let resto = num - cientos * divisor;

            let strMiles = Seccion(num, divisor, "UN MIL", "MIL");
            let strCentenas = Centenas(resto);

            if (strMiles == "") return strCentenas;

            return strMiles + " " + strCentenas;
        } //Miles()

        function Millones(num) {
            let divisor = 1000000;
            let cientos = Math.floor(num / divisor);
            let resto = num - cientos * divisor;

            let strMillones = Seccion(num, divisor, "UN MILLON DE", "MILLONES DE");
            let strMiles = Miles(resto);

            if (strMillones == "") return strMiles;

            return strMillones + " " + strMiles;
        } //Millones()

        return function NumeroALetras(num, currency) {
            currency = currency || {};
            let data = {
                numero: num,
                enteros: Math.floor(num),
                centavos: Math.round(num * 100) - Math.floor(num) * 100,
                letrasCentavos: "",
                letrasMonedaPlural: currency.plural || "PESOS CHILENOS", //'PESOS', 'Dólares', 'Bolívares', 'etcs'
                letrasMonedaSingular: currency.singular || "PESO CHILENO", //'PESO', 'Dólar', 'Bolivar', 'etc'
                letrasMonedaCentavoPlural: currency.centPlural || "CHIQUI PESOS CHILENOS",
                letrasMonedaCentavoSingular: currency.centSingular || "CHIQUI PESO CHILENO",
            };

            if (data.centavos > 0) {
                data.letrasCentavos =
                    "CON " +
                    (function() {
                        if (data.centavos == 1)
                            return (
                                Millones(data.centavos) + " " + data.letrasMonedaCentavoSingular
                            );
                        else
                            return (
                                Millones(data.centavos) + " " + data.letrasMonedaCentavoPlural
                            );
                    })();
            }

            if (data.enteros == 0)
                return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
            if (data.enteros == 1)
                return (
                    Millones(data.enteros) +
                    " " +
                    data.letrasMonedaSingular +
                    " " +
                    data.letrasCentavos
                );
            else
                return (
                    Millones(data.enteros) +
                    " " +
                    data.letrasMonedaPlural +
                    " " +
                    data.letrasCentavos
                );
        };
    })();
    const letras = numeroALetras(<?= $row['price']; ?>, {
        plural: 'DÓLARES ESTADOUNIDENSES',
        singular: 'DÓLAR ESTADOUNIDENSE',
        centPlural: 'CENTAVOS',
        centSingular: 'CENTAVO'
    });
    const precio = document.getElementById('precio');

    precio.innerHTML = letras;
</script>