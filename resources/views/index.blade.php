@extends('layouts.app')
@section('content')
<!--CONTENIDO-->
    <!--PASOS-->
    <div class="row justify-content-center">
        <div class="col-10 col-sm-6 my-5 mx-0 p-0 bg-light rounded shadow-lg">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="paso1-tab" data-toggle="tab" href="#paso1" role="tab" aria-controls="paso1" aria-selected="true">Datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" id="paso2-tab" data-toggle="tab" href="#paso2" role="tab" aria-controls="paso2" aria-selected="false">Cotización</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" id="paso3-tab" data-toggle="tab" href="#paso3" role="tab" aria-controls="paso3" aria-selected="false">Auto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" id="paso4-tab" data-toggle="tab" href="#paso4" role="tab" aria-controls="paso4" aria-selected="false">Pago</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                @include('pasos.paso1')
                @include('pasos.paso2')
                @include('pasos.paso3')
                @include('pasos.paso4')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<!--TRANSITIONS-->
    <script>

        //DAUTO
        var uso, tipo, marca, modelo;
        //PERSONA
        var cp, nombre, ap, am, celular, correo, sexo, nacimiento;

        function cambiarEdad(a){
            $('li.datos-modal#datosm_8').text("Nacimiento: "+$("#valorEdad").val());
        }

        /*$('#8_2').click(function(e){
            $('#modaldecel').modal('toggle');
            $('#v-pills-Tipo-Uso').click();
            console.log('Editar');
        });*/
        
        function mostrarD(){
            alert("1");
            $("#c-uso").text($("#c-uso").text()+" "+uso);
            $("#c-tipo").text($("#c-tipo").text()+" "+tipo);
            $("#c-marca").text($("#c-marca").text()+" "+marca);
            $("#c-modelo").text($("#c-modelo").text()+" "+modelo);
            $("#c-motor").text($("#c-motor").text()+" "+motor);
            $("#c-serie").text($("#c-serie").text()+" "+serie);
            $("#c-placas").text($("#c-placas").text()+" "+placas);
            $("#c-nombre").text($("#c-nombre").text()+" "+nombre+ " "+ap+" "+am);
            $("#c-sexo").text($("#c-sexo").text()+" "+sexo);
            $("#c-nacimiento").text($("#c-nacimiento").text()+" "+nacimiento);
            $("#c-rfc").text($("#c-rfc").text()+" "+rfc);
            $("#c-regimen").text($("#c-regimen").text()+" "+regimen);
            $("#c-correo").text($("#c-correo").text()+" "+correo);
            $("#c-uso").text($("#c-uso").text()+" "+uso);
        }

        $("#metododepago").on('change', function(){
            $(".metodo").hide();
            if(this.value == 1){
                $('#metodo1').show();
            }else if(this.value == 2){
                $('#metodo2').show();
            }else if(this.value ==3){
                $('#metodo3').show();
            }
        });

        $('#modalizador').click(function(e){
            $('#modaldecel').modal('toggle');
        });

        $(".sig3").click(function(){
            $("#paso3-tab").removeClass("disabled");
            $("#paso3-tab").click();
        });

        $("#marcasul").on('click','.seleccionador',function(e){
            $(".marca").removeClass("active");
            cambiarL("#v-pills-Marca-tab", "#v-pills-Modelo-tab", e);
            console.log(e)
        });
        $(".seleccionador").click(function(e) {
            console.log("click");
            var temp = e.target.id.slice(0,1);
            console.log(e.target);
            switch(temp){
                case "1":
                    $(this).siblings().removeClass("active");
                    cambiarL("#v-pills-Uso-tab", "#v-pills-Tipo-tab", e);
                    break;
                case "2":
                    $(this).siblings().removeClass("active");
                    cambiarL("#v-pills-Tipo-tab", "#v-pills-Marca-tab",e);
                    getMarcas()
                    break;
                case "3":
                   $(".marca").removeClass("active");
                    cambiarL("#v-pills-Marca-tab", "#v-pills-Modelo-tab", e);
                    console.log(e)
                    //$("#"+e.target.id+".carta-marca").addClass("border border-primary");
                    break;
                case "4":
                    cambiarL("#v-pills-Modelo-tab", "#v-pills-Descripcion-tab", e);
                    break;
                case "5":
                    cambiarL("#v-pills-Descripcion-tab", "#v-pills-CP-tab", e);
                    break;
                case "6":
                    cambiarL("#v-pills-CP-tab", "#v-pills-Nombre-tab", e);
                    break;
                case "7":
                    $(this).siblings().removeClass("active");
                    cambiarL("#v-pills-Sexo-tab", "#v-pills-Edad-tab", e);
                    break;
                case "8":
                    cambiarL("#v-pills-Edad-tab", "#paso2-tab", e);
                    alertmobile();
                    break;
                case "9":
                    $('#modal2').modal('hide');
                    cambiarL("algo", "#paso3-tab",e);
                    actualizarD();
                    break;
                case "e":
                    cambiarL("#v-pills-Nombre-tab", "#v-pills-Celular-tab", e);
                    break;
                case "f":
                    cambiarL("#v-pills-Celular-tab", "#v-pills-Correo-tab", e);
                    break;
                case "g":
                    cambiarL("#v-pills-Correo-tab", "#v-pills-Sexo-tab", e);
                    break;
                case "h":
                    cambiarL("#paso3-tab", "#paso4-tab", e);
                    $('#confirmar').modal('hide');
                    break;
                default: 
                    break;


            }
        });

        $('#miratiobox').change(function(){
            if($("input[name='eslamisma']:checked").val() == "si"){
                $("#segundaP").hide();
            }else{
                $("#segundaP").show();
            }
            
         });

         $("#f-rfc").focusout(function(){
             var a = ""+this.value;
             if(a.length == 12)
                $("#f-regimen").val("Moral");

            if(a.length == 13)
                $("#f-regimen").val("Física");
         });

         $("#f-rfc-2").focusout(function(){
             var a = ""+this.value;
             if(a.length == 12)
                $("#f-regimen-2").val("Moral");

            if(a.length == 13)
                $("#f-regimen-2").val("Física");
         });

        function actualizarD(){
            $("#f-uso").val(uso);
            $("#f-tipo").val(tipo);
            $("#f-marca").val(marca);
            $("#f-modelo").val(modelo.trim());
            $("#f-nombre").val(nombre);
            $("#f-ap").val(ap);
            $("#f-am").val(am);
            //$("#f-s").val();  SEXO
            $("#f-nacimiento").val(nacimiento);
            $("#f-correo").val(correo);
            $("#f-celular").val(celular);
            $("#f-cp").val(cp);
        }   

        function eso(){
            $('#modaldecel').modal('toggle');
        }
        function eso2(){
            $('#modaldecel').modal('toggle');
            $('#v-pills-Uso-tab').click();

        }

        function alertmobile(){
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            }
        }

        function cambiarL(from, to, e){
            if(from != "#v-pills-Descripcion-tab"){
                switch(from){
                    case '#v-pills-Uso-tab':
                        $(from).text("Uso: "+$("#"+e.target.id).text());
                        $('li.datos-modal#datosm_1').text("Uso: "+$("#"+e.target.id).text());
                        uso = $("#"+e.target.id).text();
                        break;
                    case '#v-pills-Tipo-tab':
                        $(from).text("Tipo: "+$("#"+e.target.id).text());
                        $('li.datos-modal#datosm_2').text("Tipo: "+$("#"+e.target.id).text());
                        tipo = $("#"+e.target.id).text();
                        break;

                    case '#v-pills-Marca-tab':
                        console.log(from);
                        $(from).text("Marca: "+$("#"+e.target.id).text());
                        $('li.datos-modal#datosm_3').text("Marca: "+$("#"+e.target.id).text());
                        marca = $("#"+e.target.id).text();
                        console.log(marca);
                        break;

                    case '#v-pills-Modelo-tab':
                        console.log($(from).text("Modelo: "+$("#marcasul#"+e.target.id).text()));
                        $('li.datos-modal#datosm_4').text("Modelo: "+$("#"+e.target.id).text());
                        modelo = $("#"+e.target.id).text();
                        break;

                    case '#v-pills-CP-tab':
                        $(from).text("CP: "+$("#valorCP").val());
                        $('li.datos-modal#datosm_6').text("CP: "+$("#valorCP").val());
                        cp = $("#valorCP").val();
                        break;

                    case '#v-pills-Sexo-tab':
                        $(from).text("Sexo: "+$("#"+e.target.id).text());
                        $('li.datos-modal#datosm_7').text("Sexo: "+$("#"+e.target.id).text());
                        sexo = $("#"+e.target.id).text()
                        break;

                    case '#v-pills-Edad-tab':
                            //$('#modaldecel').modal('toggle');
                        var fecha_nac=new Date($("#valorEdad").val());
                        var hoy= new Date();
                        var edad=Math.floor((hoy-fecha_nac) / (365.25 * 24 * 60 * 60 * 1000));
                        $(from).text("Edad: "+edad+' años');
                        $('li.datos-modal#datosm_8').text("Edad: "+edad+' años');
                          nacimiento = $("#valorEdad").val();
                        break;
                    case '#v-pills-Nombre-tab':
                        $(from).text("Nombre: "+$("#valorNombre").val());
                        $('li.datos-modal#datosm_e').text("Nombre: "+$("#valorNombre").val());
                        nombre = $("#valorNombre").val();
                        ap = $("#valorApellidoP").val();
                        am = $("#valorApellidoM").val();
                        break;
                    case '#v-pills-Celular-tab':
                        $(from).text("Celular: "+$("#valorCelular").val());
                        $('li.datos-modal#datosm_f').text("Celular: "+$("#valorCelular").val());
                        celular = $("#valorCelular").val()
                        break;
                    case '#v-pills-Correo-tab':
                        $(from).text("Correo: "+$("#valorCorreo").val());
                        $('li.datos-modal#datosm_g').text("Correo: "+$("#valorCorreo").val());
                        correo = $("#valorCorreo").val();
                        break;
                }
            }
            $(to).removeClass("disabled");
            $(to).click();
            $("#"+e.target.id).addClass("active");
        }

        // Api getMarcas
        function getMarcas(){
            $.ajax({
                url: "{{ url('/marcas') }}",
                type:"GET",
                success: function(res){
                    // console.log(res);
                    $('#marcasul').empty();
                    for (var i = 0; i < res.marcas.length; i++) {
                        // console.log(res.marcas[i]);
                        $('#marcasul').append(`<li id="3_${res.marcas[i]['cMarca']}" class="list-group-item text-center marca seleccionador" >${res.marcas[i]['cMarcaLarga']}</li>`)
                    }
                }
            });
        }
    </script>
@endsection