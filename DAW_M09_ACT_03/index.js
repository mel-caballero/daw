// 1. A partir del código CSS y HTML adjuntos vincula la librería jQuery y con programa con JS las siguientes acciones:  
$(document).ready(function(){
  // 1.1. Al situar el ratón encima de #setGreenColor, establezca el color de fondo de #divTarget a verde.

  $("#setGreenColor").hover( function(){
    $("#divTarget").css("background-color", "green");
  });

  // 1.2. Al clicar sobre #setRedColor, establezca el color de fondo de #divTarget a rojo.

  $("#setRedColor").click( function(){
    $("#divTarget").css("background-color", "red");
  });

  // 1.3. Al salir el ratón de encima de #toggleVisible se alterne  entre visible/invisible el div #divTarget.

  $("#toggleVisible").hover( function(){
    $("#divTarget").toggle();
  });

  // 1.4. Al clicar sobre #decSize decremente en “50px” la altura y "100px" la anchura del elemento #divTarget con una transición de 1.5 segundos.


  $("#decSize").click(function(){
    $("#divTarget").animate({
      height: '50px',
      width: '100px'
    }, {duration: 1500});
  });


  // 1.5. Al clicar encima de #movContinuo se mueva continuamente el elemento #divTarget de izquierda a derecha. Para conseguirlo utiliza la propiedad complete de animate para que una vez haya terminado la animación hacia la derecha, llame a una función que realize la animación a la izquierda.

  // 1.6. Al clicar por segunda vez sobre #movContinuo se detenga el movimiento de #divTarget con la función .stop().

  let checked = false;
  $("#movContinuo").click(function(){
    if (checked === false) {
      $("#divTarget").animate({
        left: "500px",
      }, {
        duration: 3000,
        complete: function () {
          $("#divTarget").animate({
            left: "0px"
          }, {
            duration: 3000
          });
        }
      });
      checked = true;
    } else {
      $("#divTarget").stop();
      checked = false;
    }
  });

  // 2. Sigue modificando el HTML anterior y programa con JS las siguientes acciones:

  // 2.1. Al clicar en #addDiv crea un DIV de la clase .addDiv dentro de #domNodes con el texto  escrito en #text.

  $("#addDiv").click( function(){
    let newDiv = $("<div id='myDiv'></div>")
    $("#domNodes").append(newDiv);
    $("#myDiv").addClass("addDiv");
    $("#myDiv").html($("#text").val());
  });

  // 2.2. Al clicar en #addSpan crea un SPAN de la clase .addSpan dentro de #domNodes con el texto  escrito en #text.

  $("#addSpan").click( function(){
    let newSpan = $("<span id='mySpan'></span>")
    $("#domNodes").append(newSpan);
    $("#mySpan").addClass("addSpan");
    $("#mySpan").html($("#text").val());
  });

  // 2.3. Al clicar en #addSetContent crea DIV de la clase .setContent dentro de #domNodes con el texto  "SET CONTENT". Clicar encima el div creado establece como contenido del nodo anterior el clicado, el texto escrito en #text.

  $("#addSetContent").click( function(){
    let newDiv = $("<div id='newCont' class='setContent'>SET CONTENT</div>")
    $("#domNodes").append(newDiv);

    $("#newCont").click( function(){
      $("#newCont").html($("#text").val());
    });
  });


  // 2.4. Al clicar en #addDelNodePrev crea DIV de la clase .delNode dentro de #domNodes con el texto  "DEL NODE PREV". Al clicar encima el div creado, elimina el nodo anterior.


  $("#addDelNodePrev").click( function(){
    let newDiv = $("<div id='deleteNode' class='delNode'>DEL NODE PREV</div>")
    $("#domNodes").append(newDiv);

    $("#deleteNode").click( function(){
      $("#deleteNode").remove();
    });
  });


  // 3. Sigue modificando el HTML anterior vinculado el plugin Slick de jQuery y  programa con JS las siguientes acciones:  

  // 3.1. Importa el plugin slick https://kenwheeler.github.io/slick/ y utilízalo para convertir #slider en un slider configurando que:

  // 3.2. El slider solo muestre dos imagenes cada vez, con una transicion de 2 en 2, y se mueva automaticamente cada segundo.

  // 3.3. Se muestren dos botones personalizados para pasar las distintas diapositivas con el texto NEXT y PREV

  // 3.4. Cuando la pantalla sea menor a 700px:

  // 3.4.1. muestra solo una imagen, 

  // 3.4.2. oculta los botones personalizados 

  // 3.4.3. muestra los puntos (los dots).

  // 3.4.4. Realiza una transicion de 1 en 1

  // 3.4.5. Mueve automaticamente cada segundo y medio

  $("#slider").slick({
    slidesToShow : 2,
    slidesToScroll : 2,
    autoplay : true,
    autoplaySpeed : 1000,
    nextArrow : "<button>NEXT</button>",
    prevArrow : "<button>PREV</button>",
    responsive : [{
      breakpoint : 700, settings: {
        slidesToShow : 1,
        slidesToScroll : 1,
        arrows : false,
        dots : true,
        autoplaySpeed : 1500,
      }
    }]
  });
});
