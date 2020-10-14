<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{ asset('materialize/js/materialize.js') }}"></script>
<!-- Importando el jquery -->
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<!-- Importando mis metodos js personales -->
<script src="{{ asset('js/myscript.js') }}"></script>
<!-- Importando scripts para la inicializacion de componentes js -->
<script>
    /*
    * Inicializa todos los elementos cuando se carga la pagina por primera vez
    * */
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
        //selects
        //var elemsSelect = document.querySelectorAll('select');
        //var instancesSelect = M.FormSelect.init(elemsSelect, {});

        //datepickers
        var elemsDatePiker = document.querySelectorAll('.datepicker');
        var instancesDatePiker = M.Datepicker.init(elemsDatePiker, {
            format: 'yyyy-mm-dd'
        });

        //timepikers
        var elemsTimePiker = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elemsTimePiker, {
            twelveHour: false
        });

        var elems = document.querySelectorAll('.slider');
        var instances = M.Slider.init(elems, {
            'height' : 700,
            'duration' : 550,
            'indicators' : true
        });

        //sidenav
        //var elemsSideNav = document.querySelectorAll('.sidenav');
        //var instancesSideNav = M.Sidenav.init(elemsSideNav);
    });

    /**
     * este metodo es para cuando se generan selects dinamicamente
     */
    function inicializarselect() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    }

    function showProgress(){
        var elem = document.getElementById('modal-wait');
        M.Modal.init(elem, {
            'dismissible' : false,
            'opacity' : 0.2
        });
        var instance = M.Modal.getInstance(elem);
        instance.open();
    }
</script>
