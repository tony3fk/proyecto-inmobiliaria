 $(function() {
        $('.btnEliminar').click(function(e) {
            e.preventDefault();
            if (window.confirm("¿Estás seguro?")) {
                location.href = this.href;
            }
        });
    });