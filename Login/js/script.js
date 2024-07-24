function printIt(number) // Función que imprime la imagen en panatalla, recibe el numero de factura a imprimir.
{
    if (number != -1) // Si el numero que llega es distinto de -1.
    {
        var img = document.getElementById("img" + number); // Asigno a la variable img la ID del elemento img + numero de factura.
    }
    else // Si llega -1.
    {
        var img = document.getElementById("img0"); // Estoy viedo la última factura, es la imagen 0, Asigno a la variable img la ID del elemento img0.
    }
    const src = img.src; // Asigno a la constante src la imagen.
    const win = window.open(''); // Asigno a la constante win una nueva ventana abierta.
    win.document.write('<img src="' + src + '" onload="window.print(); window.close();">'); // Escribo en la ventana abierta un elemento img con la imagen a imprimir y la envía a la impresora y al terminar cierra la ventana.
}

function pdfDown(number)
{
    const image = document.getElementById("img" + number); // Div con ID printable0, contiene la factura.

    var doc = new jsPDF();
    doc.addImage(image, 'png', 10, 10, 240, 60, '', 'FAST');
    doc.save();
}

// function prices(howmany)
// {
//     let container = document.getElementById("prices");
//     container.innerHTML = "";

//     for (i = 0; i < howmany; i++)
//     {
//         window ["input" + i] = document.createElement("input");
//         window ["br" + i] = document.createElement("br");
//         window ["br2" + i] = document.createElement("br");
//         window ["br3" + i] = document.createElement("br");
//         window ["br4" + i] = document.createElement("br");
//         window ["input2" + i] = document.createElement("input");
//         window ["label" + i] = document.createElement("label");
//         window ["label2" + i] = document.createElement("label");

//         eval("label" + i).innerHTML = " Nombre del Repuesto";
//         eval("label2" + i).innerHTML = " Precio del Repuesto";
//         eval("input" + i).type = "text";
//         eval("input" + i).name = "material" + i;
//         eval("input2" + i).type = "number";
//         eval("input2" + i).name = "price" + i;
//         eval("input2" + i).step = ".05";

//         container.appendChild(eval("input" + i));
//         container.appendChild(eval("label" + i));
//         container.appendChild(eval("br" + i));
//         container.appendChild(eval("br2" + i));
//         container.appendChild(eval("input2" + i));
//         container.appendChild(eval("label2" + i));
//         container.appendChild(eval("br3" + i));
//         container.appendChild(eval("br4" + i));
            /* Funciona con este bloque */

            /* O con este */
            // const input = document.createElement("input");
            // const label = document.createElement("label");
            // const br = document.createElement("br");
            // const br2 = document.createElement("br");
            
            // const input2 = document.createElement("input");
            // const label2 = document.createElement("label");
            // const br3 = document.createElement("br");
            // const br4 = document.createElement("br");
        
            // input.name = "material" + i;
            // input.type = "text";
            // label.innerHTML = " Nombre del Repuesto";
    
            // input2.name = "price" + i;
            // input2.type = "number";
            // input2.step = .5;
            // label2.innerHTML = " Precio del Repuesto";
    
            // container.appendChild(input);
            // container.appendChild(label);
            // container.appendChild(br);
            // container.appendChild(br2);
    
            // container.appendChild(input2);
            // container.appendChild(label2);
            // container.appendChild(br3);
            // container.appendChild(br4);
//     }
// }

function screen() // Establece el tamaño de las vistas en la pantalla.
{
    let view1 = document.getElementById("view1"); // Recoge las ID de todas las vistas.
    let view2 = document.getElementById("view2");
    let view3 = document.getElementById("view3");
    let view4 = document.getElementById("view4");
    let viewheight = window.innerHeight; // Obtiene el tamaño vertical de la pantalla.

    views(view1, view1.offsetHeight, viewheight);

    if (view2 != null) // Si existe el div view2
    {
        views(view2, view2.offsetHeight, viewheight);
        if (view3 != null)
        {
            views(view3, view3.offsetHeight, viewheight);
            if (view4 != null)
            {
                views(view4, view4.offsetHeight, viewheight);
            }   
        }
    }
}

function views(view, heights, viewheight)
{
    if (heights < viewheight)
    {
        view.style.height = viewheight + "px";
    }
}

function resolution() // Esta función comprueba si el ancho de la pantalla es de Ordenador o de Móvil.
{
    let mobile = document.getElementById("mobile");
    let pc = document.getElementById("pc");
    let width = innerWidth;
    if (width < 965) // Si el ancho es inferior a 965.
    {
        pc.style.visibility = "hidden"; // Oculta el menú de Ordenador
        mobile.style.visibility = "visible"; // Muestra el menú de Teléfono.
    }
    else // Si es mayor o igual a 965;
    {
        pc.style.visibility = "visible"; // Muestra el menú para Ordenador
        mobile.style.visibility = "hidden"; // Oculta el menú para Teléfono.
    }
}

function toast(warn, ttl, msg) // Función para mostrar el Dialogo con los mensajes de alerta, recibe, Código, Título y Mensaje.
{
    var alerta = document.getElementById("alerta"); // La ID del botón del dialogo.
    var title = document.getElementById("title"); // Asigno a la variable title el h4 con id title.
    var message = document.getElementById("message"); // Asigno a la variable message el h5 con id message;
    if (warn == 1) // Si el código es 1, es una alerta.
    {
        title.style.backgroundColor = "#000000"; // Pongo los atributos, color de fondo negro.
        title.style.color = "yellow"; // Y color del texto amarillo.
    }
    else if (warn == 0) // Si no, si el código es 0 es un mensaje satisfactorio.
    {
        title.style.backgroundColor = "#FFFFFF"; // Pongo los atributos, color de fondo blanco.
        title.style.color = "blue"; // Y el color del texto azul.
    }
    else // Si no, viene un 2, es una alerta de error.
    {
        title.style.backgroundColor = "#000000"; // Pongo los atributos, color de fondo negro.
        title.style.color = "red"; // Y color del texto rojo.
    }
    title.innerHTML = ttl; // Muestro el Título del dialogo.
    message.innerHTML = msg; // Muestro los mensajes en el diálogo.
    alerta.click(); // Lo hago aparecer pulsando el botón con ID alerta.
}

function goThere() // Cuando cambia el selector del menú para Móvil.
{
    var change = document.getElementById("change").value; // Change obtiene el valor en el selector.
    switch(change)
    {
        case "contact":
            window.open("contact.php", "_blank");
        break;
        case "view2":
            window.open("index.php#view2", "_self");
        break;
        default :
            window.open("index.php#view1", "_self");
    }
}

function changeit() // Función para la página de contacto.
{
    var button = document.getElementById("change"); // En la variable button obtengo la ID del input type submit change.
    var contact = document.getElementById("contact"); // En la variable contact obtengo el id del selector.
    var phone = document.getElementById("phone");
    var email = document.getElementById("email");
    var ph = document.getElementById("ph");
    var em = document.getElementById("em");

    if (contact.value != "") // Si el valor en el selector ha cambiado.
    {
        switch (contact.value) // Hago un switch al valor en el selector.
        {
            case "Teléfono":
                email.style.visibility = "hidden";
                phone.style.visibility = "visible";
                em.required = false;
                ph.required = true;
                ph.value = "";
                button.value = "Llámame!";
                break;
            case "Whatsapp":
                email.style.visibility = "hidden";
                phone.style.visibility = "visible";
                em.required = false;
                ph.required = true;
                ph.value = "";
                button.value = "Envíame un Watsapp";
                break;
            default:
                email.style.visibility = "visible";
                phone.style.visibility = "hidden";
                ph.required = false;
                ph.value = 1;
                em.required = true;
                button.value = "Espero tu E-mail";
                break;
        }
    }
}

function connect(how) // Función para enviar un Whatsapp a la tienda, para que se ponga en contacto con el cliente, recibe la forma de comunicación, Teléfono o E-mail.
{
    let mssg = document.getElementById('mssg').value;
    let num = +34664774821;
    if (how == "E-mail") // Esto es solo para que aparezca cpntactame a en lugar de al.
    {
        var win = window.open(`https://wa.me/${num}?text=Por Favor contactame por: ${how} a: ${mssg} Mi nombre es: `, '_blank');
    }
    else
    {
        var win = window.open('https://wa.me/' + num + '?text=Por Favor contactame por: ' + how + ' al: ' + mssg + ' Mi nombre es: ', '_blank');
    }
}

function capture(number) // Crea una imagen de la factura del cliente, para descargarla y enviarla por E-mail, Whatsapp, etc.
{
    const print = document.getElementById("printable" + number);
    const image = document.getElementById("image" + number); // Div con ID printable0, contiene la factura.

    html2canvas(print).then((canvas) => {
        const base64image = canvas.toDataURL('image/png'); // genera la imagen base64image a partir del contenido de print, el div que contiene la factura.
        image.setAttribute("href", base64image);
        const img = document.createElement("img");
        img.id = "img" + number;
        img.src = base64image;
        img.alt = "Factura: " + number;
        print.remove();
        image.appendChild(img);
    })
}

function verify() // Función para validar las contraseñas de registro de alumnos y las de modificación, también valida el D.N.I.
{
    /* let dni = document.getElementById("dni").value;
    var letra_dni=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"]; // Array de las letras del D.N.I. Español.
    var largo = dni.length;                             // obtiene el largo del D.N.I.
    largo = largo - 1;	                                // le quitamos 1 al largo, que será la letra.
    var numero = parseInt(dni.substring(0, largo));     // obtenemos la cadena de números.
    var letra = dni.substring(largo);                   // obtenemos la letra en la última posición.
    letra = letra.toUpperCase();
    var resto = numero%23;                              // aplicamos la fórmula para validar un D.N.I., el modulo de 23 al número.
    var pass = document.getElementById("pass1"); // pass es la ID del input pass0.
    var pass2 = document.getElementById("pass2"); // pass2 es la ID del input pass1.

    if (letra_dni[resto] == letra)                      // si la letra coincide con la posición en el array es válido
    {
        if (pass.value != pass2.value) // Verifico si los valores en los input pass y pass2 no coinciden.
        {
            toast(1, "Hay un Error", "Las contraseñas no coinciden, has escrito: " + pass.value + " y " + pass2.value); // Si no coinciden muestro error.
            return false; // devulvo false, el formulario no se envía.
        }
        else // Si son iguales.
        {
            return true; // Devuelvo true, envía el formulario.
        }
    }
    else
    {
        toast(1, "Hay un Error", "El D.N.I. introducido no es correcto, Por Favor verifica el número y la letra: " + dni);
        return false; // Devuelve false y muestra un alert "Su DNI no es válido".
    } */

    let dnielement = document.getElementById("dni");
    let dni = dnielement.value;
    var numero, letra, letras;
    var expresion_regular_dni = /^[XYZ]?\d{1,9}[A-Z]$/;
    var pass = document.getElementById("pass1"); // pass es la ID del input pass0.
    var pass2 = document.getElementById("pass2"); // pass2 es la ID del input pass1.

    if(expresion_regular_dni.test(dni) === true)
    {
        numero = dni.substr(0, dni.length - 1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        letra = dni.substr(dni.length - 1, 1);
        numero = numero % 23;
        // letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
        letras = letras.substring(numero, numero + 1);
        if (letras != letra.toUpperCase())
        {
            toast(2, 'El D.N.I. o N.I.E. es Incorrecto', 'Verifica que los Números y la Letra o Letras Estén Bien.');
            return false;
        }
        else
        {
            if (pass.value != pass2.value) // Verifico si los valores en los input pass y pass2 no coinciden.
            {
                toast(1, "Hay un Error", "Las contraseñas no coinciden, has escrito: " + pass.value + " y " + pass2.value); // Si no coinciden muestro error.
                return false; // devulvo false, el formulario no se envía.
            }
            else // Si son iguales.
            {
                return true; // Devuelvo true, envía el formulario.
            }
        }
    }
    else
    {
        toast(2, 'El D.N.I. o N.I.E. es Incorrecto', 'Verifica que los Números y la Letra o Letras Estén Bien.');
        return false;
    }
}

function showEye(which) // Función para mostrar el ojo de los input de las contraseñas, recibe el número del elemento que contiene el ojo.
{
    let eye = document.getElementById("togglePassword" + which); // Asigno a eye la id del elemento que contiene el ojo.
    eye.style.visibility = "visible"; // Hago visible el elemento, el ojo.
}

function spy(which) // Función para el ojito de las Contraseñas al hacer click en el ojito, recibe el número de la ID del input de la password.
{
    const togglePassword = document.querySelector('#togglePassword' + which); // Asigno a la constante togglePassword el input con ID togglePassword + which.
    const password = document.querySelector('#pass' + which); // Asigno a password la ID del input con ID pass + which.
    
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password'; // Asigno a type el resultado de un operador ternario, si presiono el ojito y el tipo del input es password
    // lo cambia a text, si es text lo cambia a password.
    password.setAttribute('type', type); // Le asigno el atributo al input password.
    togglePassword.classList.toggle('fa-eye-slash'); // Cambia el aspecto del ojito, al cambiar el input a tipo texto, el ojo aparece con una raya.
}