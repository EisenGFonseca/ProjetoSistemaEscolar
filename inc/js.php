<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- BOOSTRAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- JS METRO UI -->
<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
<!-- AJAX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
<!-- MENU LATERAL -->
<script src="../css/scripts_menu/bootstrap.bundle.min.js"></script>


<!-- AUTO-COMPLETE-SQL -->
<script type="text/javascript">
$(function() {
  $("#alu_nome").autocomplete({
    source: "search.php",
    minLength: 1
  });
});
</script>

<!-- HAMBURGER -->
<script>
var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
  forEach(hamburgers, function(hamburger) {
    hamburger.addEventListener("click", function() {
      this.classList.toggle("is-active");
    }, false);
  });
}
</script>


<!-- MENU LATERAL -->
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>

<!-- Deslizar Pagina -->
<script>
$('.ir a[href^="#"]').on('click', function(e) {
  e.preventDefault();
  var id = $(this).attr('href'),
  targetOffset = $(id).offset().top;

  $('html, body').animate({
    scrollTop: targetOffset - 100
  }, 500);
});
</script>

<!-- Mascara -->
<script>
$(document).ready(function(){
  $('#telefone').mask('(99) 9999-9999');
  $('#celular').mask('(99) 9 9999-9999');

  $('#telefone1').mask('(99) 9999-9999');
  $('#celular1').mask('(99) 9 9999-9999');
  $('#telefone2').mask('(99) 9999-9999');
  $('#celular2').mask('(99) 9 9999-9999');

  $('#cpf').mask('999.999.999-99');
  $('#calendario').mask('99/99/9999');
  $('#cep').mask('99.999-999');
  $('#salario').mask('000.000.000,00', { reverse : true});
});
</script>
<!-- . -->

<!-- validate -->
<script type="text/javascript">
function Cadastro(){
  var form = document.forms['Cadastro'];
  var senha = form.senha.value;
  var confirmar_senha = form.confirmar_senha.value;

	if (senha != confirmar_senha)
		alert("SENHAS DIFERENTES");
  }
  else {
    return true;
  }

  return false;
}
</script>

<!-- AutoComplete -->
<script>
$(function() {
  var estados = [
    "Acre",
    "Alagoas",
    "Amapa",
    "Amazonas",
    "Bahia",
    "Ceará",
    "Destrito Federal",
    "Espirito Santo",
    "Goias",
    "Maranhao",
    "Mato Grosso",
    "Mato Grosso do Sul",
    "Minas Gerais",
    "Para",
    "Paraiba",
    "Paraná",
    "Pernambuco",
    "Piaui",
    "Rio de Janeiro",
    "Rio Grande do Norte",
    "Rio Grande do Sul",
    "Rondonia",
    "Roraima",
    "Santa Catarina",
    "Sao Paulo",
    "Sergipe",
    "Tocantins"
  ];
  $("#estado" ).autocomplete({
    source: estados
  });
});
</script>
<!-- . -->

<!-- Habilita/Desbilita -->
<script type="text/javascript">
document.getElementById( 'necessidade' ).addEventListener( 'change', function(){
  if(this.value === 'Sim') {
    $( "#tp_necessidade" ).prop( "disabled", false );
  } else {
    $( "#tp_necessidade" ).prop( "disabled", true );  }
});
</script>
<!-- . -->

<!-- validador -->
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
          alert("Cheque todos os campos, por favor!");
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<!-- . -->

<!-- MSG DELETAR -->
<script>
function funcao_alerta()
{
  alert("Você escolheu deleatar o registro...");
}
</script>
<!-- . -->

<!-- MSG ATUALIZAR -->
<script>
function funcao_alerta_att()
{
  alert("Você editou o registro...");
}
</script>
<!-- . -->

<!-- TABELAS ORGANIZADAS -->
<script>
function sortTable(table, col, reverse) {
  var tb = table.tBodies[0],
  tr = Array.prototype.slice.call(tb.rows, 0),
  i;
  reverse = -((+reverse) || -1);
  var str1;
  var str2;
  tr = tr.sort(function(a, b) {
    if (a.cells[col].children[0] === undefined) {
      str1 = a.cells[col].textContent.trim();
      str2 = b.cells[col].textContent.trim();
    } else {
      str1 = a.cells[col].getElementsByTagName(a.cells[col].children[0].tagName)[0].value;
      str2 = b.cells[col].getElementsByTagName(a.cells[col].children[0].tagName)[0].value;
    }

    if (!isNaN(str1)) {
      if (str1.length === 1) {
        str1 = '0' + str1;
      }
      if (str2.length === 1) {
        str2 = '0' + str2;
      }
    }
    return reverse * (str1.localeCompare(str2));
  });
  for (i = 0; i < tr.length; ++i)
  tb.appendChild(tr[i]);
}

function makeSortable(table) {
  var th = table.tHead,
  i;
  th && (th = th.rows[0]) && (th = th.cells);
  if (th)
  i = th.length;
  else
  return;
  while (--i >= 0)
  (function(i) {
    var dir = 1;
    $(th[i]).append('  <i class="hidden" data-order="up"></i>');
    $(th[i]).append('  <i class="hidden" data-order="down"></i>');
    th[i].addEventListener('click', function() {
      sortTable(table, i, (dir = 1 - dir));
      if ((1 - dir) === 1) {
        $(th).find('i[data-order=down],i[data-order=up]').addClass('hidden');
        $(th[i]).find('i[data-order=up]').removeClass('hidden');
      } else {
        $(th).find('i[data-order=down],i[data-order=up]').addClass('hidden');
        $(th[i]).find('i[data-order=down]').removeClass('hidden');
      }
    });
  }(i));
}

function makeAllSortable(parent) {
  parent = parent || document.body;
  var t = parent.getElementsByTagName('table'),
  i = t.length;
  while (--i >= 0) {
    if (t[i].attributes['data-sortable'] !== undefined) {
      makeSortable(t[i]);
    }
  }
}
makeAllSortable();
</script>
<!-- . -->

<!-- BARRA-RESPONSIVA -->
<script>
var slide_wrp 		= ".side-menu-wrapper"; //Menu Wrapper
var open_button 	= ".menu-open"; //Menu Open Button
var close_button 	= ".menu-close"; //Menu Close Button
var overlay 		= ".menu-overlay"; //Overlay

$(slide_wrp).hide().css( {"left": -$(slide_wrp).outerWidth()+'px'}).delay(50).queue(function(){$(slide_wrp).show()});

$(open_button).click(function(e){
	e.preventDefault();
	$(slide_wrp).css( {"left": "0px"});
	setTimeout(function(){
		$(slide_wrp).addClass('active');
	},50);
	$(overlay).css({"opacity":"1", "width":"100%"});
});

$(close_button).click(function(e){
	e.preventDefault();
	$(slide_wrp).css( {"left": -$(slide_wrp).outerWidth()+'px'});
	setTimeout(function(){
		$(slide_wrp).removeClass('active');
	},50);
	$(overlay).css({"opacity":"0", "width":"0"});
});

$(document).on('click', function(e) {
	if (!e.target.closest(slide_wrp) && $(slide_wrp).hasClass("active")){
		$(slide_wrp).css( {"left": -$(slide_wrp).outerWidth()+'px'}).removeClass('active');
		$(overlay).css({"opacity":"0", "width":"0"});
	}
});
</script>
<!-- FIM BARRA-RESPONSIVA -->
