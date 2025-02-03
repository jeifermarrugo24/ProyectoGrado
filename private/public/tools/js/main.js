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
    EditarUsuario();
    IngresarNuevoMenu();
    cerrarSesionAutomaticamente();
    MenuAcciones();
    permisosUsuarios();
    ManejadorPerfiles();
    ManejadorAutores();
    ManejadorCategorias();
    ManejadorLibros();
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

function SweetModal(contenido, tamano) {
  Swal.fire({
    html: contenido,
    showConfirmButton: false,
    showCloseButton: true,
    width: tamano,
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

          if (atr_contenido == "cerrar_session") {
            var destination_url = decodeURIComponent(data.destination_url);
            location.href = destination_url;
          }

          if (atr_contenido == "accion_ingresar_menu") {
            CheckMenus();
          }

          if (atr_contenido == "accion_ingresar_permiso") {
            SeleccionarTodo();
            PermisosByPerfil();
          }

          if (atr_contenido == "config-consultar-libro") {
            MenuLibros();
          }

          if (
            atr_contenido == "config-ingresar-libro" ||
            atr_contenido == "config-ingresar-libro"
          ) {
            autocompleteJS("autores", data.autores);
            autocompleteJS("categoria", data.categorias);
          }
        } else {
          alertify.set("notifier", "position", "top-right");
          alertify.error(message, 10);
        }

        Tables();
        validarContrasena();
        accordion();
        hide_spinner();
        VerMas();
        return 2;
      },
    });
  });
}

function cerrarSesionAutomaticamente() {
  let timeout;

  function resetTimer() {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
      $(".traer-contenido[contenido='cerrar_session']").trigger("click");
    }, 1200000);
  }

  $(document).on("mousemove keydown click scroll", resetTimer);

  resetTimer();
}

function SeleccionarTodo() {
  $(".select_all").on("change", function () {
    const isChecked = $(this).is(":checked");
    // Seleccionar o deseleccionar todos los checkboxes dentro del contenedor
    $('#contenedor-formulario input[type="checkbox"]').prop(
      "checked",
      isChecked
    );
  });

  // Sincronizar el estado de select_all si los checkboxes individuales cambian
  $('#contenedor-formulario input[type="checkbox"]').on("change", function () {
    const allChecked =
      $('#contenedor-formulario input[type="checkbox"]').not(".select_all")
        .length ===
      $('#contenedor-formulario input[type="checkbox"]:checked').not(
        ".select_all"
      ).length;
    $(".select_all").prop("checked", allChecked);
  });
}

function accordion() {
  document.querySelectorAll(".accordion-button").forEach((button) => {
    button.addEventListener("click", (e) => {
      const targetSelector = button.getAttribute("data-bs-target");
      const target = document.querySelector(targetSelector);

      if (!target) return; // Verificar si el objetivo existe

      const checkbox = button
        .closest(".accordion-item")
        .querySelector(".menu-checkbox");

      // Alternar el acordeón y el checkbox
      if (target.classList.contains("show")) {
        target.classList.remove("show");
        button.classList.add("collapsed");
        button.setAttribute("aria-expanded", "false");

        if (checkbox) {
          checkbox.checked = false; // Deseleccionar el checkbox
        }
      } else {
        // Cerrar otros acordeones
        const accordionParent = button.closest(".accordion");
        if (accordionParent) {
          accordionParent
            .querySelectorAll(".accordion-collapse.show")
            .forEach((openItem) => {
              openItem.classList.remove("show");
              accordionParent
                .querySelectorAll(".accordion-button[aria-expanded='true']")
                .forEach((openButton) => {
                  openButton.classList.add("collapsed");
                  openButton.setAttribute("aria-expanded", "false");
                });

              const otherCheckbox = openItem
                .closest(".accordion-item")
                ?.querySelector(".menu-checkbox");
              if (otherCheckbox) {
                otherCheckbox.checked = false; // Deseleccionar otros checkboxes
              }
            });
        }

        // Abrir el acordeón actual
        target.classList.add("show");
        button.classList.remove("collapsed");
        button.setAttribute("aria-expanded", "true");

        if (checkbox) {
          checkbox.checked = true; // Seleccionar el checkbox
        }
      }
    });
  });
}

function CheckMenus() {
  $('input[type="checkbox"]').change(function () {
    if ($(this).prop("checked")) {
      $('input[type="checkbox"]').not(this).prop("checked", false);

      $("#btn-nuevo-menu").prop("disabled", false);
      $("#btn-editar-menu").prop("disabled", false);
    } else {
      if ($('input[type="checkbox"]:checked').length === 0) {
        $("#btn-nuevo-menu").prop("disabled", true);
        $("#btn-editar-menu").prop("disabled", true);
      }
    }
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

function Tables() {
  $("#DataPage").DataTable({
    paging: true,
    autoWidth: true,
    order: [],
    language: {
      decimal: "",
      emptyTable: "No data available in table",
      info: "Mostrando _START_ to _END_ of _TOTAL_ resultados",
      infoEmpty: "Mostrando 0 to 0 of 0 resultados",
      infoFiltered: "(Filtrado por _MAX_ total entries)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar:  _MENU_",
      loadingRecords: "Loading...",
      processing: "",
      search: "Buscar:",
      zeroRecords: "No existen resultados...",
      paginate: {
        first: "Primera",
        last: "Ultima",
        next: ">",
        previous: "<",
      },
      aria: {
        orderable: "Order by this column",
        orderableReverse: "Reverse order this column",
      },
    },
    layout: {
      bottomEnd: {
        paging: {
          firstLast: false,
        },
      },
    },
  });
}

function validarContrasena() {
  $("#password").keyup(function () {
    var password = $("#password").val();

    if (password === "") {
      $(".validationList li").removeClass("invalid valid");
      $("#progressBar")
        .css("width", "0%")
        .removeClass("bg-success bg-warning bg-danger");
      return false;
    }

    // Definir validaciones
    var validations = [
      { element: $("#length"), valid: password.length >= 8 },
      { element: $("#upperCase"), valid: /[A-Z]/.test(password) },
      { element: $("#lowerCase"), valid: /[a-z]/.test(password) },
      { element: $("#number"), valid: /[0-9]/.test(password) },
      {
        element: $("#specialCharacter"),
        valid: /[~`!#$%^&*+=\-[\]\\';,/{}|":<>?]/.test(password),
      },
    ];

    var validCount = 0;

    // Validar cada criterio
    validations.forEach(function (validation) {
      toggleValidationClass(validation.element, validation.valid);
      if (validation.valid) validCount++;
    });

    // Calcular el progreso y actualizar la barra
    var progressPercentage = (validCount / validations.length) * 100;
    $("#progressBar")
      .css("width", progressPercentage + "%")
      .attr("aria-valuenow", progressPercentage);

    // Cambiar colores de la barra según el progreso
    if (progressPercentage === 100) {
      $("#progressBar")
        .removeClass("bg-warning bg-danger")
        .addClass("bg-success");
    } else if (progressPercentage >= 50) {
      $("#progressBar")
        .removeClass("bg-success bg-danger")
        .addClass("bg-warning");
    } else {
      $("#progressBar")
        .removeClass("bg-success bg-warning")
        .addClass("bg-danger");
    }
  });
}

function toggleValidationClass(element, isValid) {
  if (isValid) {
    element.removeClass("invalid").addClass("valid");
  } else {
    element.removeClass("valid").addClass("invalid");
  }
}

function RegistrarUsuario() {
  $("body").on("click", "#ingresar_usuario", function () {
    var id_contenedor = "#contenedor-formulario";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);

    console.log(variables[0]);

    validarContrasena();

    // Verificar si la contraseña es válida antes de continuar
    var passwordValid = $(".validationList li.valid").length === 5;

    if (
      check_empty_field("nombre") &&
      check_empty_field("apellido") &&
      check_empty_field("usuario") &&
      check_empty_field("password") &&
      check_empty_field("perfil") &&
      check_empty_field("estado") &&
      passwordValid
    ) {
      const fileInput = document.getElementById("upload");
      const file = fileInput.files[0];

      const maxFileSize = 5 * 1024 * 1024;
      if (file.size > maxFileSize) {
        alertify.set("notifier", "position", "top-right");
        alertify.error("El tamaño de la imagen no debe exceder los 5 MB", 10);
        return;
      }

      const validFileTypes = ["image/jpeg", "image/png", "image/gif"];
      if (!validFileTypes.includes(file.type)) {
        alertify.set("notifier", "position", "top-right");
        alertify.error("Solo se permiten imágenes JPG, PNG o GIF", 10);
        return;
      }

      const formData = new FormData();
      formData.append("action", "ingresar_usuario");
      variables[0]
        .substring(1)
        .split("&")
        .filter((pair) => pair && !pair.startsWith("undefined"))
        .forEach((pair) => {
          const [key, value] = pair.split("=");
          if (key && value) {
            formData.append(key, decodeURIComponent(value));
          }
        });
      formData.append("file", file);

      ajax({
        method: "POST",
        url: internal_url_private,
        data: formData,
        contentType: false,
        processData: false,
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

function ModalEditar(id, action) {
  const formData = new FormData();
  formData.append("action", action);
  formData.append("id", id);

  ajax({
    method: "POST",
    url: internal_url_private,
    data: formData,
    contentType: false,
    processData: false,
    dataType: "json",
    beforeSend: function () {
      show_spinner();
    },
    success: function (data) {
      let code = data.code;
      let html = data.html;
      SweetModal(html, 1000);
      hide_spinner();
    },
  });
}

function EditarUsuario() {
  $("body").on("click", "#editar_usuario", function () {
    var id_contenedor = "#contenedor-formulario-edit";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);
    var id_select = document.getElementById("id_usuario").value;

    const formData = new FormData();
    formData.append("action", "editar_usuario");
    variables[0]
      .substring(1)
      .split("&")
      .filter((pair) => pair && !pair.startsWith("undefined"))
      .forEach((pair) => {
        const [key, value] = pair.split("=");
        if (key && value) {
          formData.append(key, decodeURIComponent(value));
        }
      });
    formData.append("id_usuario", id_select);

    ajax({
      method: "POST",
      url: internal_url_private,
      data: formData,
      contentType: false,
      processData: false,
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
  });
}

function IngresarNuevoMenu() {
  $("body").on("click", "#btn-nuevo-menu", function () {
    var checkbox_select = $('input[type="checkbox"]:checked');
    var id_menu = checkbox_select.attr("id").split("_")[1];

    const formData = new FormData();
    formData.append("action", "modal_ingresar_menu");
    formData.append("id_menu", id_menu);

    ajax({
      method: "POST",
      url: internal_url_private,
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      beforeSend: function () {
        show_spinner();
      },
      success: function (data) {
        let code = data.code;
        let html = data.html;
        SweetModal(html, 1000);
        hide_spinner();
      },
    });
  });

  $("body").on("click", "#btn-editar-menu", function () {
    console.log("editar");
    var checkbox_select = $('input[type="checkbox"]:checked');
    var id_menu = checkbox_select.attr("id").split("_")[1];

    if (id_menu == "0") {
      alertify.set("notifier", "position", "top-right");
      alertify.error("Está opcion no se puede modificar", 10);
      return;
    }

    const formData = new FormData();
    formData.append("action", "modal_editar_menu");
    formData.append("id_menu", id_menu);

    ajax({
      method: "POST",
      url: internal_url_private,
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      beforeSend: function () {
        show_spinner();
      },
      success: function (data) {
        let code = data.code;
        let html = data.html;
        SweetModal(html, 1000);
        hide_spinner();
      },
    });
  });
}

function MenuAcciones() {
  $("body").on("click", "#enviar_accion_menu", function () {
    let elemento = $(this);
    let action = elemento.attr("action_realizar");
    let id_menu = document.getElementById("id_menu").value;
    let title = document.getElementById("title").value;
    let parentid = document.getElementById("parentid").value;
    let orden = document.getElementById("orden").value;
    let icono = document.getElementById("icono").value;
    let url = document.getElementById("url").value;
    let estado = document.getElementById("estado").value;
    let action_menu = document.getElementById("action").value;

    if (action == "ingresar") {
      action = "ingresar_nuevo_menu";
    } else {
      action = "editar_menu_seleccionado";
    }

    if (
      check_empty_field("title") &&
      check_empty_field("orden") &&
      check_empty_field("estado")
    ) {
      const formData = new FormData();
      formData.append("action", action);
      formData.append("id_menu", id_menu);
      formData.append("title", title);
      formData.append("orden", orden);
      formData.append("parentid", parentid);
      formData.append("icono", icono);
      formData.append("action_menu", action_menu);
      formData.append("url", url);
      formData.append("estado", estado);

      ajax({
        method: "POST",
        url: internal_url_private,
        data: formData,
        contentType: false,
        processData: false,
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

function permisosUsuarios() {
  $("body").on("click", "#asignar_permisos", function () {
    let perfil = document.getElementById("perfil").value;
    let check_boxes_select = [];
    $(".form-check-input:checked").each(function () {
      check_boxes_select.push($(this).attr("id"));
    });

    if (check_boxes_select.length === 0) {
      alertify.set("notifier", "position", "top-right");
      alertify.warning(
        "Por favor selecciona por lo menos una opcion del menu",
        10
      );
      return 2;
    }

    if (check_empty_field("perfil") && check_empty_field("estado")) {
      const formData = new FormData();
      formData.append("action", "asignar_permisos_usuarios");
      formData.append("perfil", perfil);
      formData.append("checks_menus", check_boxes_select);
      ajax({
        method: "POST",
        url: internal_url_private,
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
          show_spinner();
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

function PermisosByPerfil() {
  $("body").on("change", "#perfil", function () {
    let elemento = $(this);
    let id_perfil = document.getElementById("perfil").value;

    const formData = new FormData();
    formData.append("action", "obtener_permisos_by_perfiles");
    formData.append("perfil", id_perfil);

    ajax({
      method: "POST",
      url: internal_url_private,
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      beforeSend: function () {
        show_spinner();
        SeleccionarTodo();
      },
      success: function (data) {
        hide_spinner();

        var code = data.code;
        var message = data.message;

        if (code === "200") {
          alertify.set("notifier", "position", "top-right");
          alertify.success(message, 10);

          let permisos = data.permisos;

          if (Array.isArray(permisos)) {
            $(".form-check-input").prop("checked", false);

            permisos.forEach(function (permiso) {
              let menuId = permiso.permiso_menu_id;
              $("#check_" + menuId).prop("checked", true);
            });
          }
        } else {
          $(".form-check-input").prop("checked", false);
          alertify.set("notifier", "position", "top-right");
          alertify.warning(message, 10);
        }
      },
      error: function () {
        hide_spinner();
        alertify.set("notifier", "position", "top-right");
        alertify.error("Error en la solicitud", 10);
      },
    });
  });
}

function ManejadorPerfiles() {
  $("body").on("click", "#ingresar_perfil", function () {
    var id_contenedor = "#contenedor-formulario";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);
    if (
      check_empty_field("nombre_perfil") &&
      check_empty_field("estado_perfil")
    ) {
      const formData = new FormData();
      formData.append("action", "ingresar_perfil_usuario");
      variables[0]
        .substring(1)
        .split("&")
        .filter((pair) => pair && !pair.startsWith("undefined"))
        .forEach((pair) => {
          const [key, value] = pair.split("=");
          if (key && value) {
            formData.append(key, decodeURIComponent(value));
          }
        });
      ajax({
        method: "POST",
        url: internal_url_private,
        data: formData,
        contentType: false,
        processData: false,
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

  $("body").on("click", "#editar_perfil", function () {
    var id_contenedor = "#contenedor-formulario-edit";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);
    var id_select = document.getElementById("perfil_id").value;

    const formData = new FormData();
    formData.append("action", "editar_perfil");
    variables[0]
      .substring(1)
      .split("&")
      .filter((pair) => pair && !pair.startsWith("undefined"))
      .forEach((pair) => {
        const [key, value] = pair.split("=");
        if (key && value) {
          formData.append(key, decodeURIComponent(value));
        }
      });
    formData.append("perfil_id", id_select);

    ajax({
      method: "POST",
      url: internal_url_private,
      data: formData,
      contentType: false,
      processData: false,
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
  });
}

function ManejadorAutores() {
  $("body").on("click", "#ingresar_autor", function () {
    var id_contenedor = "#contenedor-formulario";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);

    if (
      check_empty_field("nombre_autor") &&
      check_empty_field("apellido_autor") &&
      check_empty_field("descripcion_autor") &&
      check_empty_field("estado")
    ) {
      const fileInput = document.getElementById("upload");
      const file = fileInput.files[0];

      const maxFileSize = 5 * 1024 * 1024;
      if (file.size > maxFileSize) {
        alertify.set("notifier", "position", "top-right");
        alertify.error("El tamaño de la imagen no debe exceder los 5 MB", 10);
        return;
      }

      const validFileTypes = ["image/jpeg", "image/png", "image/gif"];
      if (!validFileTypes.includes(file.type)) {
        alertify.set("notifier", "position", "top-right");
        alertify.error("Solo se permiten imágenes JPG, PNG o GIF", 10);
        return;
      }

      const formData = new FormData();
      formData.append("action", "ingresar_autor");
      variables[0]
        .substring(1)
        .split("&")
        .filter((pair) => pair && !pair.startsWith("undefined"))
        .forEach((pair) => {
          const [key, value] = pair.split("=");
          if (key && value) {
            formData.append(key, decodeURIComponent(value));
          }
        });
      formData.append("file", file);

      ajax({
        method: "POST",
        url: internal_url_private,
        data: formData,
        contentType: false,
        processData: false,
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

  $("body").on("click", "#editar_autor", function () {
    var id_contenedor = "#contenedor-formulario";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);
    var id_select = document.getElementById("autor_id").value;

    if (
      check_empty_field("nombre_autor") &&
      check_empty_field("apellido_autor") &&
      check_empty_field("descripcion_autor") &&
      check_empty_field("estado")
    ) {
      const formData = new FormData();
      formData.append("action", "editar_autor");
      variables[0]
        .substring(1)
        .split("&")
        .filter((pair) => pair && !pair.startsWith("undefined"))
        .forEach((pair) => {
          const [key, value] = pair.split("=");
          if (key && value) {
            formData.append(key, decodeURIComponent(value));
          }
        });
      formData.append("id_autor", id_select);

      ajax({
        method: "POST",
        url: internal_url_private,
        data: formData,
        contentType: false,
        processData: false,
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

function ManejadorCategorias() {
  $("body").on("click", "#ingresar_categoria", function () {
    var id_contenedor = "#contenedor-formulario";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);
    if (
      check_empty_field("nombre_categoria") &&
      check_empty_field("categoria_estado")
    ) {
      const formData = new FormData();
      formData.append("action", "ingresar_categoria");
      variables[0]
        .substring(1)
        .split("&")
        .filter((pair) => pair && !pair.startsWith("undefined"))
        .forEach((pair) => {
          const [key, value] = pair.split("=");
          if (key && value) {
            formData.append(key, decodeURIComponent(value));
          }
        });
      ajax({
        method: "POST",
        url: internal_url_private,
        data: formData,
        contentType: false,
        processData: false,
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

  $("body").on("click", "#editar_categoria", function () {
    var id_contenedor = "#contenedor-formulario-edit";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);
    var id_select = document.getElementById("categoria_id").value;

    const formData = new FormData();
    formData.append("action", "editar_categoria");
    variables[0]
      .substring(1)
      .split("&")
      .filter((pair) => pair && !pair.startsWith("undefined"))
      .forEach((pair) => {
        const [key, value] = pair.split("=");
        if (key && value) {
          formData.append(key, decodeURIComponent(value));
        }
      });
    formData.append("categoria_id", id_select);

    ajax({
      method: "POST",
      url: internal_url_private,
      data: formData,
      contentType: false,
      processData: false,
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
  });
}

function ManejadorLibros() {
  $("body").on("click", "#ingresar_libros", function () {
    var id_contenedor = "#contenedor-formulario";
    var elemento = $(this);
    var contenedor = $(id_contenedor);
    var variables = obtener_variables(id_contenedor);

    if (
      check_empty_field("titulo") &&
      check_empty_field("descripcion") &&
      check_empty_field("fecha_edicion") &&
      check_empty_field("cantidad") &&
      check_empty_field("numero_paginas") &&
      check_empty_field("autores") &&
      check_empty_field("categoria") &&
      check_empty_field("estado")
    ) {
      const fileInput = document.getElementById("upload");
      const file = fileInput.files[0];

      if (!file) {
        alertify.set("notifier", "position", "top-right");
        alertify.error(
          "Debes seleccionar una imagen de portada para continuar",
          10
        );
        return;
      }

      const maxFileSize = 5 * 1024 * 1024;
      if (file.size > maxFileSize) {
        alertify.set("notifier", "position", "top-right");
        alertify.error("El tamaño de la imagen no debe exceder los 5 MB", 10);
        return;
      }

      const validFileTypes = ["image/jpeg", "image/png", "image/gif"];
      if (!validFileTypes.includes(file.type)) {
        alertify.set("notifier", "position", "top-right");
        alertify.error("Solo se permiten imágenes JPG, PNG o GIF", 10);
        return;
      }

      const formData = new FormData();
      formData.append("action", "ingresar_libro");
      variables[0]
        .substring(1)
        .split("&")
        .filter((pair) => pair && !pair.startsWith("undefined"))
        .forEach((pair) => {
          const [key, value] = pair.split("=");
          if (key && value) {
            formData.append(key, decodeURIComponent(value));
          }
        });
      formData.append("file", file);

      ajax({
        method: "POST",
        url: internal_url_private,
        data: formData,
        contentType: false,
        processData: false,
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

function VerMas() {
  const seeMoreLinks = document.querySelectorAll(".see-more");

  seeMoreLinks.forEach((link) => {
    link.addEventListener("click", function () {
      const moreText = this.previousElementSibling; // El <span> con texto oculto
      if (moreText.style.display === "none" || !moreText.style.display) {
        moreText.style.display = "inline";
        this.textContent = "Ver menos";
      } else {
        moreText.style.display = "none";
        this.textContent = "Ver mas";
      }
    });
  });
}

function autocompleteJS(selector, dataBusqueda) {
  let dataAutocomplete = Object.entries(dataBusqueda);
  const autoCompleteJS = new autoComplete({
    selector: "#" + selector,
    placeHolder: "Buscar...",
    data: {
      src: dataAutocomplete,
      cache: true,
    },
    resultsList: {
      element: (list, data) => {
        if (!data.results.length) {
          const message = document.createElement("div");
          message.setAttribute("class", "no_result");
          message.innerHTML = `<span>No existen resultados para "${data.query}"</span>`;
          list.prepend(message);
        }
      },
      noResults: true,
    },
    resultItem: {
      highlight: true,
    },
    events: {
      input: {
        selection: (event) => {
          const selection = event.detail.selection.value;
          autoCompleteJS.input.value = selection;
        },
      },
    },
  });
}

function consultarContendoLibros(element) {
  let valor = element.value;

  const formData = new FormData();
  formData.append("action", "consultar-contenido-libros");
  formData.append("valor", valor);

  ajax({
    method: "POST",
    url: internal_url_private,
    data: formData,
    contentType: false,
    processData: false,
    dataType: "json",
    beforeSend: function () {
      $("#loader-content").removeClass("d-none");
    },
    success: function (data) {
      var code = data.code;
      var message = data.message;
      var html = data.html;

      if (code === "200") {
        $("#loader-content").addClass("d-none");
      } else {
        hide_spinner();
        alertify.set("notifier", "position", "top-right");
        alertify.error(message, 10);
      }
    },
  });
}

function MenuLibros() {
  $(".box-menu-book .wrapper-book").on("click", function () {
    $(".box-menu-book").toggleClass("full-menu-book");
    $(".hamburger-book").toggleClass("active");
  });
  $("a").on("click", function () {
    $(this).siblings("a").removeClass("active");
    $(this).addClass("active");
  });
}
