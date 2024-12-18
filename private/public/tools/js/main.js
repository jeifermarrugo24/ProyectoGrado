let contenidoActual = null;
let contenidoPrev = null;
let sendedAplyDepositosSeleccionados = false;

$(document).ready(iniciarEventos);

const formato_moneda = new Intl.NumberFormat("es-MX", {
  maximumFractionDigits: 2,
});

const formato_moneda_without_decimals = new Intl.NumberFormat("es-CO", {
  maximumFractionDigits: 0,
});

var internal_url = "contenido.php?t=" + new Date().getTime();
var internal_url_private = "../contenido.php?t=" + new Date().getTime();

function ajax(options) {
  var retries = options.retries || 4; // Número de reintentos
  var delay = options.delay || 3000; // Retraso entre reintentos en milisegundos
  var timeout = options.timeout || 30000; // Tiempo máximo de espera en milisegundos
  var duration = retries * (delay / 5000); // Duración total en segundos basada en el número de reintentos

  function makeRequest(attempt) {
    console.log(attempt);
    $.ajax({
      ...options,
      url: options.url,
      type: options.method || "POST",
      data: options.data || {},
      dataType: options.dataType || "json",
      timeout: timeout, // Tiempo máximo de espera para la petición

      success: function (response) {
        if (typeof options.success === "function") {
          options.success(response);
        }
      },
      error: function (xhr, status, error) {
        if (status === "timeout") {
          error = "Error de conexión"; // Mensaje de error personalizado para timeout
        }

        if (attempt < retries) {
          if (attempt === 0) {
            alertify.set("notifier", "position", "top-center");
            alertify.warning(
              "Conexión fallida, reintentando la petición...",
              duration
            );
          } else {
            var retryDuration = delay / 1000;
            var msg = alertify.warning(
              `Conexión inestable, estamos procesando tu solicitud...`,
              retryDuration,
              function () {
                clearInterval(interval);
              }
            );

            var interval = setInterval(function () {
              alertify.set("notifier", "position", "top-center");
              retryDuration--;
              msg.setContent(
                `Conexión inestable, estamos procesando tu solicitud...`
              );
              if (retryDuration <= 0) {
                clearInterval(interval);
              }
            }, 1000);
          }

          setTimeout(function () {
            makeRequest(attempt + 1); // Reintenta la petición después del retraso especificado
          }, delay);
        } else {
          hide_spinner();
          alertify.set("notifier", "position", "top-center");
          alertify.error(
            "Ha ocurrido un error, revisa tu conexion y vuelvelo a intentar " +
              error,
            6
          );
          if (typeof options.error === "function") {
            options.error(xhr, status, error);
          }
        }
      },
    });
  }

  makeRequest(0); // Inicia la primera petición
}

async function iniciarEventos() {
  var section = $("#section").val();
  let url = new URL(window.location.href);
  let identifier = url.searchParams.get("identifier");
  let reference = url.searchParams.get("reference");
  let imprimir = url.searchParams.get("imprimir");

  if (section == "login") {
    sessionStart();
  } else if (section == "principal") {
    consultarContenido();
    imagenPerfil();
    RegistrarUsuario();
  } else {
    sessionStart();
  }

  return 1;
}

function modalMagnificPopup(tipo) {
  $.magnificPopup.open({
    mainClass: "mfp-with-fade tamano-modal",
    removalDelay: 10,
    items: [
      {
        src: "#" + tipo,
        type: "inline",
      },
    ],
    modal: true,
    callbacks: {
      beforeClose: function () {},
      close: function () {},
    },
  });
}

function modalMagnificPopupClose() {
  $.magnificPopup.close();
}

function sessionStart() {
  $("body").on("click", "#send-button", function () {
    var elemento = $(this);
    var user_login = $("#user_login").val();
    console.log(user_login);
    var password_login = $("#password_login").val();

    if (
      check_empty_field("user_login") &&
      check_empty_field("password_login")
    ) {
      ajax({
        method: "POST",
        url: internal_url,
        data: {
          action: "session-start",
          user_login: user_login,
          password_login: password_login,
        },
        dataType: "json",
        beforeSend: function () {
          elemento.prop("disabled", true);
        },
        success: function (data) {
          var code = data.code;
          var message = data.message;
          var destination_url = data.destination_url;
          if (code === "200") {
            alertify.set("notifier", "position", "top-right");
            alertify.success(message, 10);
            setTimeout(() => {
              location.href = destination_url;
            }, 3000);
          } else {
            alertify.set("notifier", "position", "top-right");
            alertify.error(message, 10);
          }
          return 2;
        },
      });
    } else {
      alertify.set("notifier", "position", "top-right");
      alertify.error("Por favor revisé los datos ingresados", 10);
    }
  });
}

function check_empty_field(control) {
  var valor = $("#" + control).val();
  if (valor == "" || /^\s+$/.test(valor)) {
    // mensajeBrilla(nombre+" no puede estar vac\xedo.");
    $("#" + control).focus();
    $("#" + control).addClass("error-input");
    return false;
  }
  $("#" + control).removeClass("error-input");
  return true;
}

function consultarContenido() {
  $("body").on("click", ".traer-contenido", function () {
    var elemento = $(this);
    var atr_contenido = elemento.attr("contenido");
    var contenedor = $(".tab-content");
    var id_select = elemento.attr("id_registro");

    if (!(typeof id_select !== "undefined" && id_select !== false)) {
      id_select = "";
    }

    ajax({
      method: "POST",
      url: internal_url_private,
      data: {
        action: "consultar-contenido",
        atr_contenido: atr_contenido,
        id_select: id_select,
      },
      dataType: "json",
      beforeSend: function () {
        show_spinner(); //elemento.css("display", "none");
      },
      success: async function (data) {
        var code = data.code;
        var message = decodeURIComponent(data.message);

        if (code === "200") {
          contenedor.html(message);
          $("#div-name").html("");
          if (
            data.message == "Ha expirado la sesion, por favor ingrese de nuevo"
          ) {
            alertify.set("notifier", "position", "top-right");
            alertify.error(data.message, 10);
            var destination_url = decodeURIComponent(data.destination_url);
            location.href = destination_url;
          }

          if (atr_contenido == "salir-extranet") {
            var destination_url = decodeURIComponent(data.destination_url);
            location.href = destination_url;
          }
        } else {
          alertify.set("notifier", "position", "top-right");
          alertify.error(message, 10);
        }

        hide_spinner();
        return 2;
      },
    });
  });
}

function preview(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      var img = new Image();
      img.onload = function () {
        $("#img").attr({ src: e.target.result, width: img.width });
        $("#remove-img").show();
      };
      img.src = reader.result;
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function imagenPerfil() {
  $("body").on("change", "#upload", function () {
    $("#img").css({ top: 0, left: 0 });
    preview(this);
    $("#img").draggable({ containment: "parent", scroll: false });
  });

  $("body").on("click", "#remove-img", function () {
    $("#img").attr(
      "src",
      "https://png.pngtree.com/png-clipart/20230915/original/pngtree-plus-sign-symbol-simple-design-pharmacy-logo-black-vector-png-image_12186664.png"
    );
    $(this).hide();
  });
}

function RegistrarUsuario() {
  $("body").on("click", "#ingresar_usuario", function () {
    var id_contenedor = "#contenedor-formulario";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);
    var imagen_base64 = document.getElementById("img").src;

    if (
      check_empty_field("nombre") &&
      check_empty_field("apellido") &&
      check_empty_field("usuario") &&
      check_empty_field("password") &&
      check_empty_field("perfil") &&
      check_empty_field("estado")
    ) {
      ajax({
        method: "POST",
        url: internal_url_private,
        data:
          "action=ingresar_usuario" + variables[0] + "&imagen=" + imagen_base64,
        dataType: "json",
        beforeSend: function () {
          show_spinner();
          elemento.prop("disabled", true);
        },
        success: function (data) {
          var code = data.code;
          var message = data.message;
          var campo = data.campo;

          if (code === "200") {
            hide_spinner();
            alertify.set("notifier", "position", "top-right");
            alertify.success(message, 10);
          } else {
            hide_spinner();
            alertify.set("notifier", "position", "top-right");
            alertify.error(message, 10);
            if (campo.length) {
              $("#" + campo).addClass("error-input");
            }
          }
        },
      });
    } else {
      alertify.set("notifier", "position", "top-right");
      alertify.error("Por favor revisé los campos ingresados", 10);
    }
  });
}

function obtener_variables(objeto) {
  var params = "";
  var archivo = "";
  if ($(objeto)) {
    $(objeto + " :input").each(function () {
      var name_field = $(this).attr("name");
      var type_field = $(this).attr("type");
      var tagName = this.tagName;
      if (type_field == "radio") {
        if ($(this).is(":checked"))
          params +=
            "&" +
            encodeURIComponent(name_field) +
            "=" +
            encodeURIComponent($(this).val());
      } else if (type_field == "checkbox") {
        var value = "";
        if ($(this).is(":checked")) value = $(this).val();
        params +=
          "&" +
          encodeURIComponent(name_field) +
          "=" +
          encodeURIComponent(value);
      } else if (type_field == "file") {
        let archivos = document.getElementById("upload");
        archivo = archivos.files[0];
        let formdata = new FormData();
      } else if (type_field == "file" && objeto + ": div") {
        let archivos = $(this).attr("id");
        console.log(archivos);
        archivo = archivos.files[0];
        let formdata = new FormData();
      } else if (
        tagName == "SELECT" &&
        $(this).attr("multiple") == "multiple"
      ) {
        var i = 0;
        var id_select = $(this).attr("id");
        var selectedOptions = $("#" + id_select).val();
        $("#" + id_select + " option:selected").each(function () {
          value = $(this).attr("value");
          params +=
            "&" +
            encodeURIComponent(name_field + "[" + i + "]") +
            "=" +
            encodeURIComponent(value);
          i++;
        });
      } else {
        params +=
          "&" +
          encodeURIComponent(name_field) +
          "=" +
          encodeURIComponent($(this).val());
      }
    });
  } else if (typeof objeto == "string") {
    params = objeto;
  }
  return [params, archivo];
}
