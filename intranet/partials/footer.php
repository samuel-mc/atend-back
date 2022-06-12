    </body>
</html>

<script src='<?php echo __ROOT__; ?>/assets/js/jsPDF/dist/jspdf.min.js'></script>
<script src="https://unpkg.com/jspdf-autotable@3.5.22/dist/jspdf.plugin.autotable.js"></script>

<script> //Script para generar el pdf
    const generarPdf = () => {
        let pdf = new jsPDF();
        pdf.autoTable({
            html: '#tablaServicios'
        });
        pdf.save('Servicios.pdf');
    }
</script>


