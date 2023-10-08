<!DOCTYPE html>
<html lang="pt">
<head>
<title>Ficha de Inscrição</title>
<meta charset="utf-8"> 

<meta name='viewport' content='width=device-width, initial-scale=1'>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

<style type="text/css">
.input-group 
{
  margin-bottom: 5px;
  margin-right: 10px;
}

#dialog2 {
  width: 100% !important;
  padding: 0 !important;
  margin: 0 !important;
}

#content2 {
  height: 100% !important;
  border-radius: 0 !important;
}
</style>

</head>
<body>

<div class="container">
@yield('content')
</div>  


<script type="text/javascript">

document.querySelector('input').addEventListener('keypress', function(evt) {
    if (evt.key == '#27') {
        evt.preventDefault()
        alert('Tecla inválida');
    }
});

var data = new Date();

var dia     = data.getDate();           // 1-31
var dia_sem = data.getDay();            // 0-6 (zero=domingo)
var mes     = data.getMonth();          // 0-11 (zero=janeiro)
var ano2    = data.getYear();           // 2 dígitos
var ano4    = data.getFullYear();       // 4 dígitos
var hora    = data.getHours();          // 0-23
var min     = data.getMinutes();        // 0-59
var seg     = data.getSeconds();        // 0-59
var mseg    = data.getMilliseconds();   // 0-999
var tz      = data.getTimezoneOffset(); // em minutos 

//var dia = 31;
//var mes = 4;

if (dia <= 30 && dia > 5 && mes == 11) {
  document.getElementById('datavencimento').value = "30/12/2022";
} else if (dia > 30 && mes == 11) {
  document.getElementById('datavencimento').value = "30/01/2023";
  document.getElementById('n5').style.display = "none";
} else if (dia <= 30 && mes == 0) {
  document.getElementById('datavencimento').value = "30/01/2023";
  document.getElementById('n5').style.display = "none";
} else if (dia > 30 && mes == 0) {
  document.getElementById('datavencimento').value = "28/02/2023";
} else if (dia <= 28 && mes == 1) {
  document.getElementById('datavencimento').value = "28/02/2023";
} else if (dia > 28 && mes == 1) {
  document.getElementById('datavencimento').value = "30/03/2023";
} else if (dia <= 30 && mes == 2) {
  document.getElementById('datavencimento').value = "30/03/2023";
} else if (dia > 30 && mes == 2) {
  document.getElementById('datavencimento').value = "28/04/2023";
  document.getElementById('n2').style.display = "none";
} else if (dia <= 28 && mes == 3) {
  document.getElementById('datavencimento').value = "28/04/2023";
  document.getElementById('n2').style.display = "none";
} else if (dia > 28 && mes == 3) {
  document.getElementById('datavencimento').value = "28/04/2023";
  document.getElementById('n2').style.display = "none";
} else {
  document.getElementById('datavencimento').value = "28/04/2023";
  document.getElementById('n2').style.display = "none";
}



$(document).ready(function(){
    
    var $datanascimento = $(".datanascimento");
    $datanascimento.mask('00/00/0000', {reverse: false});

    $('#modalAceite').modal('show');

  var formID = document.getElementById("formID");
  var send = $("#enviar");

  $(formID).submit(function(event){
    if (formID.checkValidity()) {
      send.attr('disabled', 'disabled');
    }
  });

  $("input").keyup(function(){
    $(this).val($(this).val().toUpperCase());
    if($('#email').val() != '') {
      $('#email').val($('#email').val().toLowerCase());
    }
  });

  $("input").blur(function(){
    //if(this != "") {
      $(this).css("background-color", "#d4edda");
    //} else {
    //  $(this).css("background-color", "#f8d7da");
    //}
  });

  $("textarea").keyup(function(){
    $(this).val($(this).val().toUpperCase());
  });

  /*$("#acompanhantes").change(function(){
    $("input").blur(function(){
      $(this).css("background-color", "#d4edda");
    });
  });*/

  $("select").blur(function(){
    if(this != '') {
      $(this).css("background-color", "#d4edda");
    } else {
      $(this).css("background-color", "#f8d7da");
    }
    
  });

  $("#acomodacao").change(function(){
    var acomodacao, valoracomodacao;

    acomodacao = document.getElementById('acomodacao').value;
    
    if(acomodacao == "double") {
      valoracomodacao = 3200;
    } else if (acomodacao == "single") {
      valoracomodacao = 4500;
    }

    document.getElementById('valortotal').value = valoracomodacao;
    
  });
  
  $("#formapagamento").change(function(){

    var valortotal = $("#valortotal").val();
    
    var formapagamento = $("#formapagamento").val();
    
    var valorparcelado = parseInt(valortotal) / parseInt(formapagamento);
    
    document.getElementById('valorparcelado').value = parseFloat(valorparcelado).toFixed(2);
    
  });
  
  $(".opcaotransfer").css({"display": "none"});
  $("#mensagemtransfer").css({"display": "none"});
  $("#transfer").change(function(){
    if ($("#transfer").val() == "1") {
      $(".opcaotransfer").css({"display": "block"});
      $("#mensagemtransfer").css({"display": "none"});
    } else if ($("#transfer").val() == "0") {
      $(".opcaotransfer").css({"display": "none"});
      $("#mensagemtransfer").css({"display": "block"});
    } else {
      $(".opcaotransfer").css({"display": "none"});
      $("#mensagemtransfer").css({"display": "none"});
    }
  });
  
  $("#opcaoacompanhantes").css({"display": "none"});
  $("#levaracompanhante").change(function(){
    if ($("#levaracompanhante").val() == "1") {
      $("#opcaoacompanhantes").css({"display": "block"});
    } else {
      $("#opcaoacompanhantes").css({"display": "none"});
    }
  });
  
  $("#opcaopagamento").css({"display": "none"});
  $("#formapagamento").change(function(){
    if ($("#formapagamento").val() != "") {
      $("#opcaopagamento").css({"display": "block"});
    } else {
      $("#opcaopagamento").css({"display": "none"});
    }
  });
  
  //calculo de idade
  
  $("#acompanhantes").change(function(){
    var p = document.getElementById('acompanhantes').value;
    //var p = $('#acompanhantes').val();
    var tn = '';
    for (var i = 0; i < p; i++) {
      var x = i+1;
      tn += participante(x);
    }
    $('#formulario').html(tn);
    
    //var $rg = $(".rg");
    var $cpf = $(".cpf");
    var $datanascimento = $(".datanascimento");
    
    //$rg.mask('00.000-00', {reverse: false});
    $cpf.mask('000.000.000-00', {reverse: false});
    $datanascimento.mask('00/00/0000', {reverse: false});
  });
  
  
  
  function participante(p) {
    var participante = '';
    var a = document.getElementById('acompanhantes').value;
    //var a = $('#acompanhantes').val();
    
    participante += '<div class="container">';
    
    if (a == 1) {
      participante += '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
      
    } else if (a == 2) {
      participante += '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
    } else {
      
      participante += '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">';
    }
    
    participante += '<div class="form-group">';
    participante += '<h4>Acompanhante '+p+'</h4>';
    participante += '<div class="input-group">';
    participante += '<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>';
    participante += '<input type="text" class="form-control" id="nomeparticipante'+p+'" placeholder="Nome" name="nomeparticipante'+p+'" onkeyup="checanome'+p+'()" required="">';
    participante += '</div>';
    participante += '</div>';
    
    participante += '<div class="form-group">';
    participante += '<div class="input-group">';
    participante += '<span class="input-group-addon"><i class="fas fa-address-card"></i></span>';
    participante += '<input type="text" class="form-control" id="rgparticipante'+p+'" placeholder="RG" name="rgparticipante'+p+'" required="">';
    participante += '</div>';
    participante += '</div>';
    
    participante += '<div class="form-group">';
    participante += '<div class="input-group">';
    participante += '<span class="input-group-addon"><i class="fas fa-address-card"></i></span>';
    participante += '<input type="text" class="form-control cpf" id="cpfparticipante'+p+'" placeholder="CPF" name="cpfparticipante'+p+'" required="">';
    participante += '</div>';
    participante += '</div>';
    
    participante += '<div class="form-group">';
    participante += '<div class="input-group">';
    participante += '<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>';
    participante += '<input type="text" class="form-control datanascimento" id="datanascimento'+p+'" placeholder="Data de Nascimento" name="datanascimento'+p+'" required="" onchange="checadata'+p+'()">';
    participante += '</div>';
    participante += '</div>';
    
    participante += '<div class="form-group">';
    participante += '<div class="input-group">';
    participante += '<span class="input-group-addon"><i class="fa fa-building"></i></span>';
    participante += '<select class="form-control" id="franqueado'+p+'" name="franqueadoparticipante'+p+'" required="">';
    participante += '<option value="">Acompanhante '+p+' é Franqueado?</option>';
    participante += '<option value="1">Sim</option>';
    participante += '<option value="0">Não</option>';
    participante += '</select>';
    participante += '</div>';
    participante += '</div>';
    
    participante += '<div class="form-group">';
    participante += '<div class="input-group">';
    participante += '<span class="input-group-addon" style="color:green;font-weight: bold;"><i class="far fa-money-bill-alt"></i> Valor R$ </span>';
    participante += '<input type="text" class="form-control" id="valor'+p+'" value="" name="valorparticipante'+p+'" readonly="">';
    participante += '</div>';
    participante += '</div>';
    participante += '</div>';   
    
    return participante;
    
    participante += '</div>';
    
  }
  
  //var $rg = $(".rg");
  var $cpf = $(".cpf");
  var $cnpj = $("#cnpj");
  var $cep = $("#cep");
  var $celular = $("#celular");
  var $fixo = $("#fixo");
  var $datanascimento = $("#datanascimento");
  
  //$rg.mask('00.000-00', {reverse: false});
  $cpf.mask('000.000.000-00', {reverse: false});
  $cnpj.mask('00.000.000/0000-00', {reverse: false});
  $cep.mask('00000-000', {reverse: false});
  $celular.mask('(00) 00000-0000', {reverse: false});
  $fixo.mask('(00) 0000-0000', {reverse: false});
  $datanascimento.mask('00/00/0000', {reverse: false});
  
  $('#enviar').attr('disabled','disabled');

  function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;
        
        for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;
        
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
        
        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
        
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
        
      }
  
  $("#cpf").blur(function(){
    
    var cpf = $("#cpf").val();

    var strCPF = cpf.replace(/[^\d]+/g,'');
    
    if(strCPF != '') {      

      if (TestaCPF(strCPF)) {
        //alert("CPF válido!");
        $('#enviar').removeAttr('disabled');
      } else {
        //alert("CPF inválido!");
        $('#titleCPF').text("CPF " + cpf +" é inválido!");
        $('#msgCPF').text("Insira um CPF válido!");
        $('#modalCPF').modal('show');
        $('#enviar').attr('disabled','disabled');
        $("#cpf").val("");
        //$('#cpf').focus();
      }

    } else {
      $('#titleCPF').text("Campo CPF vázio!");
      $('#msgCPF').text("Campo CPF não pode ficar em branco!");
      $('#modalCPF').modal('show');
      $('#enviar').attr('disabled','disabled');
      $("#cpf").val("");
    }
    
  });//fim blur

  /*$("#enviar").submit(function() {
    $(".sk-fading-circle").show();
  });*/
  
}); //fim ready

function checadata1() {
  var count1;
  data1 = document.getElementById("datanascimento1").value;

  if (data1 != "") {

    var data = data1;

    var dados = data.split('/');
    
    var dia_aniversario = dados[0];
    
    var mes_aniversario = dados[1];
    
    var ano_aniversario = dados[2];
    
    function idade(ano_aniversario, mes_aniversario, dia_aniversario) {
      /*var d = new Date,
      ano_atual = d.getFullYear(),
      mes_atual = d.getMonth() + 1,
      dia_atual = d.getDate(),*/

      ano_atual = 2022,
      mes_atual = 11,
      dia_atual = 2,
      
      ano_aniversario = +ano_aniversario,
      mes_aniversario = +mes_aniversario,
      dia_aniversario = +dia_aniversario,
      
      quantos_anos = ano_atual - ano_aniversario;
      
      if (mes_atual < mes_aniversario || mes_atual == mes_aniversario && dia_atual < dia_aniversario) {
        quantos_anos--;
      }
      
      return quantos_anos < 0 ? 0 : quantos_anos;
    }
    
    var idade1 = idade(ano_aniversario, mes_aniversario, dia_aniversario);

    //alert(idade1);

    function checaidade1() {
      var valor1, valortotal1, soma1;

      valor1 = document.getElementById('valor1').value;

      valortotal1 = $("#valortotal").val();

      soma1 = parseInt(valor1) + parseInt(valortotal1);

      document.getElementById('valortotal').value = soma1;
    }

      if (idade1 >= 12) {
        document.getElementById("valor1").value = 3200;
        $("#datanascimento1").attr("readonly","true");
        checaidade1();
      } else if (idade1 < 12 && idade1 >= 4) {
        document.getElementById("valor1").value = 1600;
        $("#datanascimento1").attr("readonly","true");
        checaidade1();
      } else if (idade1 >= 0 && idade1 < 4) {
        document.getElementById("valor1").value = 0;
        $("#datanascimento1").attr("readonly","true");
        checaidade1();
      } else {
        document.getElementById("valor1").value = "";
      }

    } else {
      $('#titleCPF').text("Campo data de nascimento!");
      $('#msgCPF').text("Campo data de nascimento não pode ficar vázio!");
      $('#modalCPF').modal('show');
      document.getElementById('valor1').value = "";
    }

    }

  //}

  function checadata2() {
    data2 = document.getElementById("datanascimento2").value;
    
    if(data2 != "") {
      var data = data2;

      var dados = data.split('/');
      
      var dia_aniversario = dados[0];
      
      var mes_aniversario = dados[1];
      
      var ano_aniversario = dados[2];
      
      function idade(ano_aniversario, mes_aniversario, dia_aniversario) {
        /*var d = new Date,
        ano_atual = d.getFullYear(),
        mes_atual = d.getMonth() + 1,
        dia_atual = d.getDate(),*/

        ano_atual = 2022,
        mes_atual = 11,
        dia_atual = 2,
        
        ano_aniversario = +ano_aniversario,
        mes_aniversario = +mes_aniversario,
        dia_aniversario = +dia_aniversario,
        
        quantos_anos = ano_atual - ano_aniversario;
        
        if (mes_atual < mes_aniversario || mes_atual == mes_aniversario && dia_atual < dia_aniversario) {
          quantos_anos--;
        }
        
        return quantos_anos < 0 ? 0 : quantos_anos;
      }
      
      var idade2 = idade(ano_aniversario, mes_aniversario, dia_aniversario);

      //alert(idade2);

      function checaidade2() {
        var valor2, valortotal2, soma2;

        valor2 = document.getElementById('valor2').value;

        valortotal2 = $("#valortotal").val();

        soma2 = parseInt(valor2) + parseInt(valortotal2);

        document.getElementById('valortotal').value = soma2;
      }

      if (idade2 >= 12) {
        document.getElementById("valor2").value = 3200;
        $("#datanascimento2").attr("readonly","true");
        checaidade2();
      } else if (idade2 < 12 && idade2 >= 4) {
        document.getElementById("valor2").value = 1600;
        $("#datanascimento2").attr("readonly","true");
        checaidade2();
      } else if (idade2 >= 0 && idade2 < 4) {
        document.getElementById("valor2").value = 0;
        $("#datanascimento2").attr("readonly","true");
        checaidade2();
      } else {
        document.getElementById("valor2").value = "";
      }

    } else {
      $('#titleCPF').text("Campo data de nascimento!");
      $('#msgCPF').text("Campo data de nascimento não pode ficar vázio!");
      $('#modalCPF').modal('show');
      document.getElementById('valor2').value = "";
    }

  }  

  function checadata3() {
    data3 = document.getElementById("datanascimento3").value;

    if(data3 != "") {

      var data = data3;

      var dados = data.split('/');
      
      var dia_aniversario = dados[0];
      
      var mes_aniversario = dados[1];
      
      var ano_aniversario = dados[2];
      
      function idade(ano_aniversario, mes_aniversario, dia_aniversario) {
        //var d = new Date,
        //ano_atual = d.getFullYear(),
        //mes_atual = d.getMonth() + 1,
        //dia_atual = d.getDate(),

        ano_atual = 2022 ,
        mes_atual = 11,
        dia_atual = 2,
        
        ano_aniversario = +ano_aniversario,
        mes_aniversario = +mes_aniversario,
        dia_aniversario = +dia_aniversario,
        
        quantos_anos = ano_atual - ano_aniversario;
        
        if (mes_atual < mes_aniversario || mes_atual == mes_aniversario && dia_atual < dia_aniversario) {
          quantos_anos--;
        }
        
        return quantos_anos < 0 ? 0 : quantos_anos;
      }
      
      var idade3 = idade(ano_aniversario, mes_aniversario, dia_aniversario);

      //alert(idade3);

      function checaidade3() {
        var valor3, valortotal3, soma3;

        valor3 = document.getElementById('valor3').value;

        valortotal3 = $("#valortotal").val();

        soma3 = parseInt(valor3) + parseInt(valortotal3);

        document.getElementById('valortotal').value = soma3;
      }

      if (idade3 >= 12) {
        document.getElementById("valor3").value = 3200;
        $("#datanascimento3").attr("readonly","true");
        checaidade3();
      } else if (idade3 < 12 && idade3 >= 4) {
        document.getElementById("valor3").value = 1600;
        $("#datanascimento3").attr("readonly","true");
        checaidade3();

      } else if (idade3 >= 0 && idade3 < 4) {
        document.getElementById("valor3").value = 0;
        $("#datanascimento3").attr("readonly","true");
        checaidade3();
      } else {
        document.getElementById("valor3").value = "";
      }

    } else {
      $('#titleCPF').text("Campo data de nascimento!");
      $('#msgCPF').text("Campo data de nascimento não pode ficar vázio!");
      $('#modalCPF').modal('show');
      document.getElementById('valor3').value = "";
    }
  }  

  function checanome1() {
    //document.getElementById("nomeparticipante1").value.toUpperCase();

    var x = document.getElementById("nomeparticipante1");
    x.value = x.value.toUpperCase();
  }

  function checanome2() {
    //nome1 = document.getElementById("nomeparticipante2").value.toUpperCase();

    var y = document.getElementById("nomeparticipante2");
    y.value = y.value.toUpperCase();
  }

  function checanome3() {
    //document.getElementById("nomeparticipante3").value.toUpperCase();

    var z = document.getElementById("nomeparticipante3");
    z.value = z.value.toUpperCase();
  }


</script>

</body>
</html>